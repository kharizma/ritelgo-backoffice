<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name').' | Register' }}</title>

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

    <section class="signin-section">
        <div class="container-fluid">
            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-ritelgo-primary mb-10">Get Started</h1>
                                <p class="text-medium">
                                Saatnya UMKM Naik Kelas
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="{{ asset('assets/images/images-2.jpg') }}" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="{{ asset('assets/images/shape.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-6">
                    <div class="signup-wrapper">
                        <div class="form-wrapper">
                            <h6 class="mb-15">Daftar Akun <img src="{{ asset('assets/images/logo.svg') }}" width="100px" alt="Logo"></h6>
                            <p class="text-sm mb-25">
                                Gunakan Ritelgo gratis selama 14 hari
                            </p>
                            <form action="#" method="POST">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger d-flex alert-dismissible fade show" role="alert">
                                        <div>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Nama</label>
                                            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>No Handphone</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">+62</span>
                                                <input type="text" name="mobile_phone" class="form-control" placeholder="8134353453" value="{{ old('mobile_phone') }}"  required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="********" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password Confirmation</label>
                                            <input type="password" name="password_confirmation" placeholder="********" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="form-check checkbox-style mb-30">
                                            <input class="form-check-input" type="checkbox" name="is_agreement" required/>
                                            <label class="form-check-label">
                                            Saya menyetujui <a href="#" target="_blank" class="text-ritelgo-primary">Syarat dan Ketentuan</a>, serta <a href="#" target="_blank" class="text-ritelgo-primary">Kebijakan Privasi</a> Ritelgo.
                                            </label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button type="submit" class="main-btn ritelgo-primary-btn btn-hover w-100 text-center">
                                                Daftar Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="singup-option pt-40">
                                <p class="text-sm text-medium text-dark text-center">
                                    Sudah punya akun ? <a href="{{ route('login') }}" class="text-ritelgo-primary">Masuk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </section>


    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>