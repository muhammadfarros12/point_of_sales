<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(Request $request) {
        $products = DB::table('products')
        ->when($request->input('name'), function($query, $name){
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.products.index', compact('products'));
    }

    function create() {
        return view('pages.products.create');
    }

    function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:products',
            'pricelist' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'required|in:food,drink,snack',
            'image' => 'required|image'
        ]);

        $filename = time(). '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        $data = $request->all();

        $product = new Product;
        $product->name = $request->name;
        $product->pricelist = $request->pricelist;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->image = $filename;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product Successfully Created');
    }

    function edit($id) {
        $product = Product::findOrFail($id);
        return view('pages.products.edit', compact('product'));
    }

    function update(Request $request, $id) {
        $data = $request->all();
        $product = Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Successfully Updated');
    }

    function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Sucessfully Deleted');
    }
}
