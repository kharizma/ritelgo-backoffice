@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Billing</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                <div class="col-6">
                    <h5>Paket Saat Ini</h5>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>Kamu berlangganan paket</td>
                                    <td class="text-success fw-bold">{{ Auth::user()->package_subscription_name }}</td>
                                </tr>
                                <tr>
                                    <td>Masa Berlaku</td>
                                    <td class="text-success fw-bold">{{ date('d F Y',strtotime(Auth::user()->valid_until)) }}</td>
                                </tr>
                                <tr>
                                    <td>Pembayaran Terakhir</td>
                                    @if (isset(Auth::user()->last_payment_date))
                                        <td class="text-success fw-bold">{{ date('d F Y',strtotime(Auth::user()->last_payment_date)) }}</td>
                                    @else
                                        <td class="text-danger fw-bold">Tidak Ditemukan</td>
                                    @endif
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h5>Pilihan Paket</h5>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            <div class="text-end">
                                <a href="{{ route('settings.billing.upgrade') }}" class="btn btn-ritelgo-primary text-white">Upgrade Paket</a>
                            </div>
                            <table class="table">
                                @foreach ($packages as $package)
                                    <tr>
                                        <td>{{ $package->name }}</td>
                                        <td class="text-end">{{ 'Rp '.number_format($package->price) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5>Riwayat Pembayaran</h5>
                <hr>
                @if (count($invoices) > 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-30">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <h6>Invoice ID</h6>
                                                </th>
                                                <th scope="col">
                                                    <h6>Nama Paket</h6>
                                                </th>
                                                <th scope="col">
                                                    <h6>Tipe Paket</h6>
                                                </th>
                                                <th scope="col">
                                                    <h6>Total Bayar</h6>
                                                </th>
                                                <th scope="col">
                                                    <h6>Status</h6>
                                                </th>
                                                <th scope="col">
                                                    <h6>Aksi</h6>
                                                </th>
                                            </tr>
                                        <!-- end table row-->
                                        </thead>
                                        <tbody>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('invoice',$invoice->id) }}" class="text-decoration-none text-ritelgo-primary">{{ $invoice->id }}</a>
                                                    </td>
                                                    <td>
                                                        {{ $invoice->package_subscription_name }}
                                                    </td>
                                                    <td>
                                                        {{ ucwords($invoice->price_type) }}
                                                    </td>
                                                    <td>
                                                        {{ 'Rp '.number_format($invoice->total_amount) }}
                                                    </td>
                                                    <td>
                                                        @if ($invoice->status == 'pending')
                                                            <span class="badge text-bg-warning">Menunggu Pembayaran</span>
                                                        @elseif ($invoice->status == 'paid')
                                                            <span class="badge text-bg-success">Sukses</span>
                                                        @elseif ($invoice->status == 'expired')
                                                            <span class="badge text-bg-danger">Kadaluarsa</span>
                                                        @elseif ($invoice->status == 'checkout')
                                                            <span class="badge text-bg-secondary">Belum Diproses</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($invoice->status == 'checkout')
                                                            <a href="{{ route('settings.billing.checkout',$invoice->id) }}" class="btn btn-sm btn-secondary">
                                                                Proses Invoice
                                                            </a>
                                                        @elseif ($invoice->status == 'pending')
                                                            <a href="{{ $invoice->xendit_invoice_url }}" class="btn btn-sm btn-warning">
                                                                Bayar Sekarang
                                                            </a>
                                                        @elseif ($invoice->status == 'expired')
                                                            <a href="{{ route('invoice',$invoice->id) }}" class="btn btn-sm btn-danger">
                                                                Lihat Invoice
                                                            </a>
                                                        @elseif ($invoice->status == 'paid')
                                                            <a href="{{ route('invoice',$invoice->id) }}" class="btn btn-sm btn-success">
                                                                Lihat Invoice
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        <!-- end table row -->
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                @else
                    <div class="text-center">
                        Belum Ada Riwayat
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection