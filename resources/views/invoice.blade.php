<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>
<body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-ritelgo-secondary text-white fw-bold" aria-current="page" href="{{ route('settings.billing.index') }}">Kembali</a>
                </li>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="p-5">
            <div class="row">
                <div class="col">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/images/logo.svg') }}" width="150px" alt="Logo"></a>
                </div>
                <div class="col">
                    <div class="text-end">
                        <div class="fw-bold">INVOICE</div>
                        <div class="text-ritelgo-primary fw-bold">{{ $subscription->id }}</div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <div class="fw-bold">UNTUK</div>
                    <table>
                        <tr>
                            <td width="50%">Pembeli</td>
                            <td width="5%">:</td>
                            <td width="45%">{{ $subscription->user_name }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Tanggal Pembelian</td>
                            <td width="5%">:</td>
                            <td width="45%">{{ date('d F Y',strtotime($subscription->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td width="50%">Nomor Telepon</td>
                            <td width="5%">:</td>
                            <td width="45%">{{ $subscription->user_mobile_phone }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="fw-bold">DITERBITKAN OLEH</div>
                    <div class="text-ritelgo-primary fw-bold">RITELGO</div>
                </div>
            </div>

            <table class="mt-5 table">
                <thead>
                    <tr>
                        <th scope="col" class="text-start">NAMA PRODUK</th>
                        <th scope="col" class="text-center">TIPE PEMBAYARAN</th>
                        <th scope="col" class="text-end">TOTAL HARGA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-start">{{ $subscription->package_subscription_name }}</td>
                        <td class="text-center">{{ ucwords($subscription->price_type) }}</td>
                        <td class="text-end">{{ 'Rp '.number_format($subscription->package_subscription_price) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-end fw-bold">TOTAL TAGIHAN</td>
                        <td class="text-end fw-bold">{{ 'Rp '.number_format($subscription->total_amount) }}</td>
                    </tr>
                </tbody>
            </table>
            
            <hr>

            <div class="row">
                <div class="col">
                    <div>Status Pembayaran</div>
                    <div class="fw-bold">
                        @if ($subscription->status == 'pending')
                            <span class="badge text-bg-warning">Menunggu Pembayaran</span>
                        @elseif ($subscription->status == 'paid')
                            <span class="badge text-bg-success">Lunas</span>
                        @elseif ($subscription->status == 'expired')
                            <span class="badge text-bg-danger">Kadaluarsa</span>
                        @elseif ($subscription->status == 'checkout')
                            <span class="badge text-bg-secondary">Belum Diproses</span>
                        @endif
                    </div>
                </div>
                @if ($subscription->status == 'paid')
                    <div class="col">
                        <div>Metode Pembayaran</div>
                        <div class="fw-bold">
                            {{ $subscription->bank_code }}
                        </div>
                    </div>
                @endif
            </div>

            <p class="mt-5 text-sm">
                Invoice ini sah dan diproses oleh komputer <br>
                Silahkan hubungi <span class="text-ritelgo-primary fw-bold">cs@ritelgo.id</span> apabila kamu membutuhkan bantuan.
            </p>
        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>