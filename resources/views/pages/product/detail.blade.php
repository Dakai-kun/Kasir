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
                                        <h5 class="card-title">Goods</h5>

                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Subtotal</th>
                                                    <th>Action</th>
                                                </tr>
                                            @foreach ($detail as $detailSale)
                                            <tbody>
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $detailSale->barang->product_name }}</td>
                                                <td>{{ $detailSale->total_products }}</td>
                                                <td>{{ $detailSale->subtotal }}</td>
                                                <td>
                                        <form action="{{ route('detail.delete', $detailSale->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i>Delete</button>
                                    </td>
                            @endforeach
                            </tr>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div><!-- End Recent Sales -->

                        </div>
                    </div><!-- End Left side columns -->

                </div>
    </section>
</main><!-- End #main -->
@endsection