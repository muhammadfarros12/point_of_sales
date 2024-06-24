<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index(Request $request) {

        // $users = User::paginate(10);
        $users = DB::table('users')
        ->when($request->input('name'), function($query, $name){
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.users.index', compact('users'));
    }

    function create() {
        return view('pages.users.create');
    }

    function store(Request $request) {
        $request->validate([
            'name' => 'required|max:100|min:3',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'roles' => 'required|in:ADMIN,STAFF,USER',
            'password' => 'required|min:8'
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->route('user.index')->with('success', 'User Successfully Created');
    }

    function edit($id) {
        $user = User::findOrFail($id);
        return view('pages.users.edit', compact('user'));
    }

    function update(Request $request, User $user) {
        $data2 = $request->validate([
            'name' => 'required|max:100|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'roles' => 'required|in:ADMIN,STAFF,USER'
        ]);

        // $data = $request->all();
        $user->update($data2);
        return redirect()->route('user.index')->with('success', 'User Successfully Updated');

    }

    function destroy(User $user) {
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Successfully Deleted');
    }
}
