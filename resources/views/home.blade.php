@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Dashboard</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Pesanan</h6>
                            <h3 class="text-bold mb-10">{{ number_format(34567) }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->

                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="lni lni-dollar"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Pendapatan</h6>
                            <h3 class="text-bold mb-10">{{ 'Rp '.number_format(74567) }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->

                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Pengeluaran</h6>
                            <h3 class="text-bold mb-10">{{ 'Rp '.number_format(24567) }}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->

            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total Karyawan</h6>
                            <h3 class="text-bold mb-10">34567</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-lg-9">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">Penjualan Terlaris</h6>
                            </div>
                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">Outlet</h6>
                                        </th>
                                        <th>
                                            <h6 class="text-sm text-medium">Produk</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Kategori</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Harga</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Terjual</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><p class="text-sm">Outlet 1</p></td>
                                        <td>
                                        <div class="product">
                                            <div class="image">
                                            <img src="assets/images/products/product-mini-1.jpg" alt="" />
                                            </div>
                                            <p class="text-sm">Es Viral</p>
                                        </div>
                                        </td>
                                        <td>
                                        <p class="text-sm">Minuman</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">{{ number_format(8000) }}</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">43</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-sm">Outlet 1</p></td>
                                        <td>
                                        <div class="product">
                                            <div class="image">
                                            <img src="assets/images/products/product-mini-2.jpg" alt="" />
                                            </div>
                                            <p class="text-sm">Cah Kangkung</p>
                                        </div>
                                        </td>
                                        <td>
                                        <p class="text-sm">Makanan</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">{{ number_format(10000) }}</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">13</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-sm">Outlet 1</p></td>
                                        <td>
                                        <div class="product">
                                            <div class="image">
                                            <img src="assets/images/products/product-mini-3.jpg" alt="" />
                                            </div>
                                            <p class="text-sm">Ayam Geprek</p>
                                        </div>
                                        </td>
                                        <td>
                                        <p class="text-sm">Makanan</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">{{ number_format(18000) }}</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">32</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p class="text-sm">Outlet 1</p></td>
                                        <td>
                                        <div class="product">
                                            <div class="image">
                                            <img src="assets/images/products/product-mini-4.jpg" alt="" />
                                            </div>
                                            <p class="text-sm">Es Teh Manis</p>
                                        </div>
                                        </td>
                                        <td>
                                        <p class="text-sm">Minuman</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">{{ number_format(12000) }}</p>
                                        </td>
                                        <td>
                                        <p class="text-sm">23</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
        <!-- end container -->
    </section>
@endsection