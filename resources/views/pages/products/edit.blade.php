@extends('layouts.app')

@section('title', 'Update Product')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Create New User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/product">Products</a></div>
                <div class="breadcrumb-item">Update Product</div>
            </div>
        </div>

        <div class="section-body">
            {{-- <h2 class="section-title">Advanced Forms</h2>
            <p class="section-lead">We provide advanced input fields, such as date picker, color picker, and so on.</p>
            --}}

            <div class="card">
                {{-- <div class="card-header">
                    <h4>Create New User</h4>
                </div> --}}
                <form action="{{ route('product.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input id="" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" autofocus value="{{ $product->name }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Stock</label>
                            <input id="" type="number" class="form-control @error('stock') is-invalid @enderror"
                                name="stock" autofocus value="{{ $product->stock }}">
                            @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="food" class="selectgroup-input" 
                                    @if ($product->category == 'food')
                                    checked
                                    @endif>
                                    <span class="selectgroup-button">Food</span>
                                </label>

                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="drink" class="selectgroup-input" 
                                    @if ($product->category == 'drink')
                                    checked
                                    @endif>
                                    <span class="selectgroup-button">Drink</span>
                                </label>

                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="snack" class="selectgroup-input" 
                                    @if ($product->category == 'snack')
                                    checked
                                    @endif>
                                    <span class="selectgroup-button">Snack</span>
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush