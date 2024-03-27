@extends('layout.index')
@section('content')
<!-- ======= Header ======= -->
<main id="main" class="main">

@if ($errors->any())
            @foreach ($errors->message as $errs)
                {{ dd($errs) }}
            @endforeach
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <b>Success:</b>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session('fail'))
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    <b>Fail:</b>
                    Produk dengan kode
                    @foreach (session('fail') as $code)
                        <b>{{ $code }}</b>,
                    @endforeach
                    tidak tersedia
                </div>
            </div>
        @endif
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Revenue Card -->
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <!-- Recent Sales -->
                            <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">

                                        <h5 class="card-title">Penjualan</h5>

                                        <form class="row g-3" action="{{ route('penjualan.store') }}" method="post">
                                        @csrf
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Nama</label>
                                                <input required type="text" class="form-control" id="name" name="customer_name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="address" class="form-label">Alamat</label>
                                                <input required type="text" class="form-control" id="address" name="address">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="telp" class="form-label">Nomor Telepon</label>
                                                <input required type="number" class="form-control" id="telp" name="phone_number">
                                            </div>
                                            <div id="productInputs">
                                                <div class="card">
                                                    <div class="card-body" style="background: transparent">

                                                        <div class="row product-input">
                                                            <div class="form-group col-md-6 col-sm-6 col-12">
                                                                <label>Nama Produk<span
                                                                        class="text-danger">*</span></label>
                                                                        <select id="inputState" class="form-select" name="products[]">
                                                                            @foreach ($products as $product)
                                                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                <div class="invalid-feedback">
                                                                    Silahkan isi Nama Produk
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 col-sm-6 col-12">
                                                                <label>Kuantitas<span class="text-danger">*</span></label>
                                                                <input required type="number" name="quantities[]" id="stock"
                                                                    value="0" class="form-control total-input">
                                                                <div class="invalid-feedback">
                                                                    Silahkan isi Kuantitas
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-12 mt-3">
                                                                <button type="button" class="btn btn-danger"
                                                                    onclick="removeProductInput(this)">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="mt-3">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="addProductInput()">Tambah Input
                                                        Produk</button>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                                </div>
                                        </form><!-- End Multi Columns Form -->


                                </div>
                            </div>
                        </div><!-- End Recent Sales -->

                    </div>
                </div><!-- End Left side columns -->
            </div>
    </section>

</main><!-- End #main -->
<script>
    function addProductInput() {
        var productInputs = document.getElementById('productInputs');
        var newProductInput = productInputs.children[0].cloneNode(true);
        var dicountInput = document.getElementById('discount');
        productInputs.appendChild(newProductInput);
        newProductInput.querySelectorAll('input').forEach(function (input) {
            input.value = '';
            discountInput.value = 0;
        });
    }

    function removeProductInput(button) {
        var cardBody = button.closest('.card-body');
        cardBody.parentElement.remove();
    }
</script>
@endsection