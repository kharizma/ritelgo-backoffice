@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Akun</h2>
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
                            <a href="{{ route('settings.accounts.edit') }}" class="border-0 bg-transparent">
                                <i class="lni lni-pencil-alt"></i>
                            </a>
                        </div>
                        <div class="profile-info">
                            <div class="d-flex align-items-center mb-30">
                                <div class="profile-image">
                                    <img src="{{ asset('assets/images/avatar-2.png') }}" alt="" />
                                    <div class="update-image">
                                        <input type="file" />
                                        <label for=""><i class="lni lni-cloud-upload"></i></label>
                                    </div>
                                </div>
                                <div class="profile-meta">
                                    <h5 class="text-bold text-dark mb-10">{{ $personal->name }}</h5>
                                    <p class="text-sm text-gray">{{ ucwords($personal->role) }}</p>
                                </div>
                            </div>
                            <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" placeholder="admin@example.com" value="{{ $personal->email }}" disabled/>
                            </div>
                            <div class="input-style-1">
                                <label>Telepon</label>
                                <input type="text" placeholder="62813478357" value="{{ $personal->mobile_phone }}" disabled/>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->


                </div>

                <div class="col-lg-6">
                    <div class="card-style settings-card-2 mb-30">
                        <div class="title mb-30">
                            <h6>Info Bisnis</h6>
                        </div>
                        <form action="{{ route('business-info.update') }}" method="POST">
                            @csrf
                            @method('PUT')

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
                                        <label>ID Bisnis</label>
                                        <input type="text" name="id" placeholder="ID Bisnis" value="{{ $business->id }}" class="deactive-bg" readonly/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Tipe Bisnis</label>
                                        <input type="text" placeholder="Tipe Bisnis" value="{{ $business->business_type_id }}" class="deactive-bg" disabled/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Nama Bisnis</label>
                                        <input type="text" name="name" value="{{ $business->name }}" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Alamat Bisnis</label>
                                        <input type="text" name="address" value="{{ $business->address }}"/>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="select-style-1">
                                        <label>Provinsi</label>
                                        <div class="select-position">
                                            <select name="province_id" id="province_id">
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}" @if($province->id == $business->province_id) selected @endif>{{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="select-style-1">
                                        <label>Kabupaten / Kota</label>
                                        <div class="select-position">
                                            <select name="regency_id" id="regency_id">
                                                <option value="">Silahkan Pilih</option>
                                            </select>
                                            <div id="processing-regency" style="font-style: italic; font-size: 12px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="select-style-1">
                                        <label>Kecamatan</label>
                                        <div class="select-position">
                                            <select name="district_id" id="district_id">
                                                <option value="">Silahkan Pilih</option>
                                            </select>
                                            <div id="processing-district" style="font-style: italic; font-size: 12px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="select-style-1">
                                        <label>Kelurahan</label>
                                        <div class="select-position">
                                            <select name="village_id" id="village_id">
                                                <option value="">Silahkan Pilih</option>
                                            </select>
                                            <div id="processing-village" style="font-style: italic; font-size: 12px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-4">
                                    <div class="input-style-1">
                                        <label>Kode Pos</label>
                                        <input type="text" name="zip_code" id="zip_code" value="{{ $business->zip_code }}"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="main-btn ritelgo-primary-btn btn-hover">
                                    Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let bsn_province_id  = "{{ $business->province_id }}";
        let bsn_regency_id   = "{{ $business->regency_id }}";
        let bsn_district_id  = "{{ $business->district_id }}";
        let bsn_village_id   = "{{ $business->village_id }}";

        $(document).ready(async function () {
            if (bsn_province_id != '') await getRegency(bsn_province_id, true);
            if (bsn_regency_id != '') await getDistrict(bsn_regency_id, true);
            if (bsn_district_id != '') await getVillage(bsn_district_id, true);
        })

        async function getRegency(province_id, isSet = false) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.regencies') }}" + '/' + province_id,
                beforeSend: function() {
                    $('#processing-regency').html('Processing...');
                },
                success: function(data) {
                    $('#regency_id').empty();
                    $("#regency_id").append('<option value="">Silahkan Pilih</option>');
                    $('#district_id').empty();
                    $("#district_id").append('<option value="">Silahkan Pilih</option>');
                    $('#village_id').empty();
                    $("#village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#regency_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#regency_id').val(isSet ? bsn_regency_id : '');
                },
                complete: function() {
                    $('#processing-regency').html('');
                },
                error: function() {
                    $('#processing-regency').html('');
                }
            });
        }

        async function getDistrict(regency_id, isSet) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.districts') }}" + '/' + regency_id,
                beforeSend: function() {
                    $('#processing-district').html('Processing...');
                },
                success: function(data) {
                    $('#district_id').empty();
                    $("#district_id").append('<option value="">Silahkan Pilih</option>');
                    $('#village_id').empty();
                    $("#village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#district_id').val(isSet ? bsn_district_id : '');
                },
                complete: function() {
                    $('#processing-district').html('');
                },
                error: function() {
                    $('#processing-district').html('');
                }
            });
        }

        async function getVillage(district_id, isSet) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.villages') }}" + '/' + district_id,
                beforeSend: function() {
                    $('#processing-village').html('Processing...');
                },
                success: function(data) {
                    $('#village_id').empty();
                    $("#village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#village_id").append('<option value="' + value.id + '">' + value.name +'</option>');
                    });
                    $('#village_id').val(isSet ? bsn_village_id : '');

                },
                complete: function() {
                    $('#processing-village').html('');
                },
                error: function() {
                    $('#processing-village').html('');
                }
            });
        }

        $("#province_id").change(async function() {
            await getRegency($('#province_id').val());
        });

        $("#regency_id").change(async function() {
            await getDistrict($('#regency_id').val());
        });

        $("#district_id").change(async function() {
            await getVillage($('#district_id').val());
        });

        $("#village_id").change(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.zip_code') }}" + '/' + $("#village_id").val(),
                success: function(data) {
                    $('#zip_code').val(data.zip_code);
                }
            });
        });
    </script>
@endpush