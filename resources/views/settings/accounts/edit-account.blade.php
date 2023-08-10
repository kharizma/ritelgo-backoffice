@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Ubah Akun</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-style settings-card-1 mb-30">
                        <div class="title mb-30 d-flex justify-content-between align-items-center">
                            <h6>Info Personal</h6>
                        </div>
                        <div class="profile-info">
                            <form action="" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="input-style-1">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{ $personal->name }}" required/>
                                </div>
                                <div class="input-style-1">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="admin@example.com" value="{{ $personal->email }}" required/>
                                </div>
                                <div class="input-style-1">
                                    <label>Telepon</label>
                                    <input type="text" name="mobile_phone" placeholder="62813478357" value="{{ $personal->mobile_phone }}" required/>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('settings.accounts.index') }}" class="main-btn ritelgo-secondary-btn btn-hover text-decoration-none me-2">
                                        Batal
                                    </a>
                                    <button type="submit" class="main-btn ritelgo-primary-btn btn-hover">
                                    Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end card -->


                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
@endsection