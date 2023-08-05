<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name').' | Login' }}</title>

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

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
        <div class="container-fluid">
            <div class="row g-0 auth-row">
                <div class="col-lg-6">
                    <div class="auth-cover-wrapper bg-primary-100">
                        <div class="auth-cover">
                            <div class="title text-center">
                                <h1 class="text-ritelgo-primary mb-10">Selamat Datang Kembali</h1>
                                <p class="text-medium">
                                    Silahkan Login dengan akun Anda
                                </p>
                            </div>
                            <div class="cover-image">
                                <img src="{{ asset('assets/images/images-1.jpg') }}" alt="" />
                            </div>
                            <div class="shape-image">
                                <img src="{{ asset('assets/images/shape.svg') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="signin-wrapper">
                        <div class="form-wrapper">
                            <img src="{{ asset('assets/images/logo.svg') }}" width="150px" alt="Logo">
                            <p class="text-sm mb-25">
                                Selamat Datang Kembali, Silahkan Login dengan akun Anda
                            </p>
                            <form action="#" method="POST">
                                @csrf
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Email</label>
                                            <input type="email" name="email" placeholder="Email" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="input-style-1">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password" required/>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xxl-6 col-lg-6 col-md-6">
                                        <div class="form-check checkbox-style mb-30">
                                            <input class="form-check-input" type="checkbox" name="remember" value="1" id="checkbox-remember"/>
                                            <label class="ms-2 form-check-label" for="checkbox-remember">
                                                Ingat Saya
                                            </label>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-xxl-6 col-lg-6 col-md-6">
                                        <div class="text-start text-md-end text-lg-end text-xxl-end mb-30">
                                            <a href="#" class="hover-underline text-ritelgo-primary">
                                                Lupa Password ?
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button type="submit" class="main-btn ritelgo-primary-btn btn-hover w-100 text-center">
                                                Masuk Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </form>
                            <div class="singin-option pt-40">
                                <p class="text-sm text-medium text-dark text-center">
                                    Belum punya akun ?
                                    <a href="{{ route('register') }}" class="text-ritelgo-primary">Buat Akun</a>
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
    <!-- ========== signin-section end ========== -->

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>