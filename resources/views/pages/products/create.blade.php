@extends('layouts.app')

@section('title', 'New Product')

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
            <h1>Create New Product</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/product">Products</a></div>
                <div class="breadcrumb-item">Create Product</div>
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
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input id="" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label>Price</label>
                            <input id="harga" type="number" class="form-control @error('pricelist') is-invalid @enderror" name="pricelist" autofocus>
                            @error('pricelist')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Stock</label>
                            <input id="" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" autofocus>
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
                                    <input type="radio" name="category" value="food" class="selectgroup-input" checked="">
                                    <span class="selectgroup-button">Food</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="drink" class="selectgroup-input">
                                    <span class="selectgroup-button">Drink</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="category" value="snack" class="selectgroup-input">
                                    <span class="selectgroup-button">Snack</span>
                                </label>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Photo Product</label>
                            <div class="col-sm-9"> 
                                <input type="file" class="form-control" name="image"
                                @error ('image') is-invalid @enderror>
                            </div>
                            @error ('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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

<script>
// function formatRupiah(input) {
//     // Ambil nilai input
//     let value = input.value;

//     // Hapus semua karakter kecuali digit dan koma
//     value = value.replace(/[^\d,]/g, '');

//     // Pisahkan bagian ribuan dengan regex
//     let parts = value.split(',');

//     // Format bagian ribuan dengan titik
//     parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

//     // Gabungkan kembali bagian ribuan dan koma jika ada
//     let formattedValue = parts.join(',');

//     // Set nilai input dengan nilai yang sudah diformat
//     input.value = formattedValue;
// }

// document.querySelector('form').addEventListener('submit', function (e) {
//     const input = document.getElementById('harga');
//     // Hapus semua titik dalam nilai input
//     let value = input.value.replace(/\./g, ''); // Menggunakan regex global untuk menghapus semua titik
//     value = value.replace(/,/g, ''); // Menggunakan regex global untuk menghapus semua koma
//     input.value = value;


// });

function formatRupiah(input) {
    // Hapus semua karakter kecuali digit dan koma
    let value = input.value.replace(/[^\d,]/g, '');

    // Pisahkan bagian ribuan dengan regex
    let parts = value.split(',');

    // Format bagian ribuan dengan titik
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // Gabungkan kembali bagian ribuan dan koma jika ada
    let formattedValue = parts.join(',');

    // Set nilai input dengan nilai yang sudah diformat
    input.value = formattedValue;
}

document.querySelector('form').addEventListener('submit', function (e) {
    const input = document.getElementById('harga');
    // Hapus semua titik dan koma dalam nilai input
    let value = input.value.replace(/\./g, ''); // Menghapus semua titik
    value = value.replace(/,/g, ''); // Menghapus semua koma
    input.value = value;
});
</script>
{{-- <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script> --}}
@endpush