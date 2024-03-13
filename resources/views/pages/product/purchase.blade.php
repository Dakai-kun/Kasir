@extends('layout.index')
@section('content')
<!-- ======= Header ======= -->

<main id="main" class="main">

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

                                        <form class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputEmail5" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="inputEmail5">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword5" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="inputPassword5">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputEmail5" class="form-label">Nomor Telepon</label>
                                                <input type="number" class="form-control" id="inputEmail5">
                                            </div>
                                            <div id="productInputs">
                                                <div class="card">
                                                    <div class="card-body" style="background: transparent">

                                                        <div class="row product-input">
                                                            <div class="form-group col-md-6 col-sm-6 col-12">
                                                                <label>Nama Produk<span
                                                                        class="text-danger">*</span></label>
                                                                <input type="text" name="product_name"
                                                                    class="form-control total-input" required>
                                                                <div class="invalid-feedback">
                                                                    Silahkan isi Nama Produk
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6 col-sm-6 col-12">
                                                                <label>Kuantitas<span class="text-danger">*</span></label>
                                                                <input type="number" name="stock" id="discount"
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