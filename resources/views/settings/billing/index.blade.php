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
                @if (!isset(Auth::user()->last_payment_date))
                    <div class="text-center">
                        Belum Ada Riwayat
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection