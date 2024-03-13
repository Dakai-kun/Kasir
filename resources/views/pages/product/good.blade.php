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

                                    <div class="filter">
                                        <button type="button" class="btn btn-transparent icon" data-bs-toggle="modal"
                                            data-bs-target="#productModal">
                                            Add Product
                                        </button>
                                    </div>
                                    <div class="modal fade" id="productModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="row g-3" action="{{ route('goods.store') }}" method="POST">
                                                    @csrf
                                                        <div class="col-12">
                                                            <label for="product_name" class="form-label">Product
                                                                Name</label>
                                                            <input type="text" class="form-control" name="product_name"
                                                                id="product_name">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="price" class="form-label">Price</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                                                <input type="number" name="price" class="form-control" id="price">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="stock" class="form-label">Stock</label>
                                                            <input type="number" name="stock" class="form-control"
                                                                id="stock">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form><!-- Vertical Form -->
                                            </div>
                                        </div>
                                    </div><!-- End Basic Modal-->
                                    <div class="card-body">
                                        <h5 class="card-title">Goods</h5>

                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            @foreach ($products as $product)
                                            <tbody>
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</a></th>
                                                    <td>{{$product->product_name}}</td>
                                                    <td>{{$product->price}}</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>
                                                        <form action="{{ route('goods.delete', $product->id) }}" method="get">
                                                        @csrf
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-primary">Edit</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateStockModal">Tambah Stock</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->

                        </div>
                    </div><!-- End Left side columns -->

                </div>
    </section>
    <div class="modal fade" id="editModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($products as $product)
                                                    <form class="row g-3" action="{{ route('goods.update', $product->id) }}" method="POST">
                                                    @csrf
                                                        <div class="col-12">
                                                            <label for="product_name" class="form-label">Product
                                                                Name</label>
                                                            <input type="text" class="form-control" name="product_name"
                                                                id="product_name" value="{{$product->product_name}}">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="price" class="form-label">Price</label>
                                                            <div class="input-group has-validation">
                                                                <span class="input-group-text" id="inputGroupPrepend">Rp</span>
                                                                <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form><!-- Vertical Form -->
                                            </div>
                                        </div>
                                    </div>
</main><!-- End #main -->

<div class="modal fade" id="updateStockModal" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($products as $product)
                                                    <form class="row g-3" action="{{ route('stock', $product->id) }}" method="POST">
                                                    @csrf
                                                        <div class="col-12">
                                                            <label for="product_name" class="form-label">Stock</label>
                                                            <input type="text" class="form-control" name="stock"
                                                                id="product_name" value="{{$product->stock}}">
                                                        </div>
                                                    @endforeach
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form><!-- Vertical Form -->
                                            </div>
                                        </div>
                                    </div>
</main><!-- End #main -->
@endsection