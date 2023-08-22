@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Checkout</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="invoice-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="invoice-card card-style mb-30">
                            <div class="invoice-header">
                                <div class="invoice-for">
                                    <h2 class="mb-10">Invoice</h2>
                                    <p class="text-sm">
                                        Upgrade Paket
                                    </p>
                                </div>
                                <div class="invoice-logo">
                                    <img src="assets/images/invoice/uideck-logo.svg" alt="" />
                                </div>
                                <div class="invoice-date">
                                    <p><span>Order ID:</span> {{ $invoice->id }}</p>
                                    <p><span>Tanggal :</span> {{ date('d F Y') }}</p>
                                </div>
                            </div>
                            <div class="invoice-address">
                                <div class="address-item">
                                    <h5 class="text-bold">Pemesan</h5>
                                    <h1>{{ Auth::user()->name }}</h1>
                                    <p class="text-sm">
                                        <span class="text-medium">Email:</span>
                                        {{ Auth::user()->email }}
                                    </p>
                                    <p class="text-sm">
                                        <span class="text-medium">Telepon:</span>
                                        {{ Auth::user()->mobile_phone }}
                                    </p>
                                </div>
                                <div class="address-item">
                                    <h5 class="text-bold">Penerima</h5>
                                    <h1>Ritelgo</h1>
                                    <p class="text-sm">
                                        Yogyakarta
                                    </p>
                                    <p class="text-sm">
                                        <span class="text-medium">Email:</span>
                                        cs@ritelgo.com
                                    </p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="invoice-table table">
                                    <thead>
                                        <tr>
                                            <th class="service">
                                                <h6 class="text-sm text-medium">Paket</h6>
                                            </th>
                                            <th colspan="2"></th>
                                            <th class="desc">
                                                <h6 class="text-sm text-medium">Tipe</h6>
                                            </th>
                                            <th class="qty">
                                                <h6 class="text-sm text-medium">Qty</h6>
                                            </th>
                                            <th class="amount">
                                                <h6 class="text-sm text-medium text-center">Harga</h6>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <p class="text-sm">{{ $invoice->package_subscription_name }}</p>
                                            </td>
                                            <td></td>
                                            <td>
                                                <p class="text-sm">{{ ucwords($invoice->price_type) }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">1</p>
                                            </td>
                                            <td>
                                                <p class="text-sm text-end">{{ 'Rp '.number_format($invoice->package_subscription_price) }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h6 class="text-sm text-medium">Subtotal</h6>
                                            </td>
                                            <td>
                                                <h6 class="text-sm text-bold text-end">{{ 'Rp '.number_format($invoice->total_amount) }}</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <h4>Total</h4>
                                            </td>
                                            <td>
                                                <h4 class="text-end">{{ 'Rp '.number_format($invoice->package_subscription_price) }}</h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="note-wrapper warning-alert py-4 px-sm-3 px-lg-5">
                                <div class="alert">
                                    <h5 class="text-bold mb-15">Catatan:</h5>
                                    <p class="text-sm text-gray">
                                        Jika Anda tidak melanjutkan transaksi ini selama maksimal 24 jam sejak pemesanan, 
                                        maka dianggap batal.
                                    </p>
                                </div>
                            </div>
                            <div class="invoice-action">
                                <ul class="d-flex flex-wrap align-items-center justify-content-center">
                                    <li class="m-2">
                                        <form action="{{ route('settings.billing.payment') }}" method="POST">
                                            @csrf

                                            <input type="text" name="invoice_id" value="{{ $invoice->id }}" hidden>
                                            <input type="text" name="package_subscription_name" value="{{ $invoice->package_subscription_name }}" hidden>
                                            <input type="text" name="price_type" value="{{ $invoice->price_type }}" hidden>
                                            <input type="number" name="total_amount" value="{{ $invoice->total_amount }}" hidden>

                                            <button type="submit" class="main-btn ritelgo-primary-btn btn-hover text-decoration-none">
                                                Bayar Sekarang
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div>
                  <!-- ENd Col -->
                </div>
                <!-- End Row -->
            </div>
        </div>
    </section>
@endsection