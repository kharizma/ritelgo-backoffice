<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name').' | Business Info' }}</title>

    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>
<body class="bg-light">
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('business-info.index') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" width="100px" alt="Logo">
            </a>
            <span class="navbar-text">
                Selamat Datang, <span class="fw-bold">{{ Auth::user()->name }}</span>
            </span>
        </div>
    </nav>

    <div class="d-flex flex-row">
        <div class="card mx-auto w-25 shadow mt-5">
            <form action="{{ route('business-info.store') }}" method="POST">
                @csrf

                <div class="card-header">
                    <h5>Informasi Bisnis</h3>
                </div>
                <div class="card-body">
                    <div class="mb-5">
                        <label class="form-label">Apa tipe bisnismu ?</label>
                        <select class="form-select" name="business_type_id" required>
                            <option value="">Pilih Tipe Bisnis</option>
                            @foreach ($businesses as $business)
                                <option value="{{ $business->id }}">{{ $business->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Dimana lokasi bisnismu ?</label>
                        <select class="form-select" name="province_id" required>
                            <option value="">Pilih Lokasi Bisnis</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-ritelgo-primary text-white">Selanjutnya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>