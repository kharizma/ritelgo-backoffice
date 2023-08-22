@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Upgrade Billing</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="card-style-3 mb-30">
                            <div class="card-content">
                                <h4>{{ $package->name }}</h4>
                                <h5 class="text-ritelgo-primary fw-bold">{{ 'Rp '.number_format($package->price).'/bulan' }}</h5>
                                <p class="mt-3">
                                    Fitur Tersedia
                                    <ul class="list-group list-group-item-success">
                                        @foreach ($package->details as $detail)
                                            <li class="list-group-item"><span class="mdi mdi-check-bold text-ritelgo-primary me-2"></span>{{ $detail->custom_name ? $detail->custom_name : $detail->default_name.' '.$detail->value }}</li>
                                        @endforeach
                                    </ul>
                                </p>

                                @if ($package->price > 0)
                                    Lebih Hemat Bayar Per Tahun
                                    <h5 class="text-ritelgo-primary fw-bold">{{ 'Rp '.number_format($package->price_annual).'/tahun' }}</h5>
                                    <div class="mt-3 row">
                                        <div class="col">
                                            <form action="{{ route('settings.billing.store') }}" method="POST">
                                                @csrf
        
                                                <input type="text" name="package_subscription_id" value="{{ $package->id }}" hidden>
                                                <input type="text" name="price_type" value="monthly" hidden>
                                                <button type="submit" class="btn btn-ritelgo-secondary text-white">Pilih Paket Bulanan</button>
                                            </form>
                                        </div>

                                        <div class="col">
                                            <form action="{{ route('settings.billing.store') }}" method="POST">
                                                @csrf
        
                                                <input type="text" name="package_subscription_id" value="{{ $package->id }}" hidden>
                                                <input type="text" name="price_type" value="annually" hidden>
                                                <button type="submit" class="btn btn-ritelgo-primary text-white">Pilih Paket Tahunan</button>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                @endforeach
              </div>
        </div>
    </section>
@endsection