@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>Outlet</h2>
                        </div>
                    </div>
                <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <div class="table-wrapper table-responsive">
                <button class="btn btn-ritelgo-primary text-white mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Tambah Outlet</button>
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                <h6>#</h6>
                            </th>
                            <th>
                                <h6>Nama Outlet</h6>
                            </th>
                            <th>
                                <h6>Alamat</h6>
                            </th>
                            <th>
                                <h6>Provinsi</h6>
                            </th>
                            <th>
                                <h6>Kab/Kota</h6>
                            </th>
                            <th>
                                <h6>Kecamatan</h6>
                            </th>
                            <th>
                                <h6>Kelurahan</h6>
                            </th>
                            <th>
                                <h6>Status</h6>
                            </th>
                        </tr>
                        <!-- end table row-->
                    </thead>
                    <tbody>
                        @foreach ($outlets as $outlet)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td><a href="#" class="text-ritelgo-primary text-decoration-none" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $outlet->id }}" data-name="{{ $outlet->name }}" data-address="{{ $outlet->address }}" data-province_id="{{ $outlet->province_id }}" data-regency_id="{{ $outlet->regency_id }}" data-district_id="{{ $outlet->district_id }}" data-village_id="{{ $outlet->village_id }}" data-zip_code="{{ $outlet->zip_code }}">{{ $outlet->name }}</a></td>
                                <td>{{ $outlet->address }}</td>
                                <td>{{ $outlet->province_name }}</td>
                                <td>{{ $outlet->regency_name }}</td>
                                <td>{{ $outlet->district_name }}</td>
                                <td>{{ $outlet->village_name }} <br>{{ $outlet->zip_code }}</td>
                                @if ($outlet->status == 'active')
                                    <td><span class="badge text-bg-success">Aktif</span></td>  
                                @else
                                    <td><span class="badge text-bg-secondary">Tidak Aktif</span></td>  
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Outlet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('settings.outlets.store') }}" method="POST">
                    @csrf
                    <input type="text" name="business_id" value="{{ $business->id }}" hidden>

                    <div class="modal-body">
                        <div class="input-style-1">
                            <label>Nama</label>
                            <input type="text" name="name" required/>
                        </div>
                        <div class="input-style-1">
                            <label>Alamat</label>
                            <input type="text" name="address" required/>
                        </div>
                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Provinsi</label>
                                <div class="select-position">
                                    <select name="province_id" id="province_id">
                                        <option value="">Silahkan Pilih</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
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
                                <input type="text" name="zip_code" id="zip_code"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-ritelgo-primary text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Outlet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" id="editForm">
                    @method('PUT')
                    @csrf

                    <div class="modal-body">
                        <div class="input-style-1">
                            <label>Nama</label>
                            <input type="text" name="name" id="editName" required/>
                        </div>
                        <div class="input-style-1">
                            <label>Alamat</label>
                            <input type="text" name="address" id="editAddress" required/>
                        </div>
                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Provinsi</label>
                                <div class="select-position">
                                    <select name="province_id" id="edit_province_id">
                                        <option value="">Silahkan Pilih</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Kabupaten / Kota</label>
                                <div class="select-position">
                                    <select name="regency_id" id="edit_regency_id">
                                        <option value="">Silahkan Pilih</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Kecamatan</label>
                                <div class="select-position">
                                    <select name="district_id" id="edit_district_id">
                                        <option value="">Silahkan Pilih</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="select-style-1">
                                <label>Kelurahan</label>
                                <div class="select-position">
                                    <select name="village_id" id="edit_village_id">
                                        <option value="">Silahkan Pilih</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="input-style-1">
                                <label>Kode Pos</label>
                                <input type="text" name="zip_code" id="edit_zip_code"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-ritelgo-primary text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#editModal').on('show.bs.modal', async function(event) {
            var src = $(event.relatedTarget)

            let bsn_province_id  = src.data('province_id');
            let bsn_regency_id   = src.data('regency_id');
            let bsn_district_id  = src.data('district_id');
            let bsn_village_id   = src.data('village_id');

            $('#editName').val(src.data('name'));
            $('#editAddress').val(src.data('address'));
            $('#edit_province_id').val(src.data('province_id'));
            if (bsn_province_id != '') await getEditRegency(bsn_province_id,bsn_regency_id, true);
            if (bsn_regency_id != '') await getEditDistrict(bsn_regency_id,bsn_district_id, true);
            if (bsn_district_id != '') await getEditVillage(bsn_district_id,bsn_village_id, true);
            $('#edit_zip_code').val(src.data('zip_code'));

            var url = "{{ route('settings.outlets.update',["outlet" => ":outlet"]) }}";
            url = url.replace(':outlet', src.data('id'));

            $('#editForm').attr('action', url);
        })

        $('#editModal').on('hidden.bs.modal', function(event) {
            location.reload()
        })

        async function getRegency(province_id, regency_id, isSet = false) {
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
                    $('#regency_id').val(isSet ? regency_id : '');
                },
                complete: function() {
                    $('#processing-regency').html('');
                },
                error: function() {
                    $('#processing-regency').html('');
                }
            });
        }

        async function getDistrict(regency_id, district_id, isSet) {
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
                    $('#district_id').val(isSet ? district_id : '');
                },
                complete: function() {
                    $('#processing-district').html('');
                },
                error: function() {
                    $('#processing-district').html('');
                }
            });
        }

        async function getVillage(district_id, village_id, isSet) {
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
                    $('#village_id').val(isSet ? village_id : '');

                },
                complete: function() {
                    $('#processing-village').html('');
                },
                error: function() {
                    $('#processing-village').html('');
                }
            });
        }

        async function getEditRegency(province_id, regency_id, isSet = false) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.regencies') }}" + '/' + province_id,
                beforeSend: function() {
                    $('#processing-regency').html('Processing...');
                },
                success: function(data) {
                    $('#edit_regency_id').empty();
                    $("#edit_regency_id").append('<option value="">Silahkan Pilih</option>');
                    $('#edit_district_id').empty();
                    $("#edit_district_id").append('<option value="">Silahkan Pilih</option>');
                    $('#edit_village_id').empty();
                    $("#edit_village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#edit_regency_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#edit_regency_id').val(isSet ? regency_id : '');
                },
                complete: function() {
                    $('#processing-regency').html('');
                },
                error: function() {
                    $('#processing-regency').html('');
                }
            });
        }

        async function getEditDistrict(regency_id, district_id, isSet) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.districts') }}" + '/' + regency_id,
                beforeSend: function() {
                    $('#processing-district').html('Processing...');
                },
                success: function(data) {
                    $('#edit_district_id').empty();
                    $("#edit_district_id").append('<option value="">Silahkan Pilih</option>');
                    $('#edit_village_id').empty();
                    $("#edit_village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#edit_district_id").append('<option value="' + value.id + '">' + value.name + '</option>');
                    })
                    $('#edit_district_id').val(isSet ? district_id : '');
                },
                complete: function() {
                    $('#processing-district').html('');
                },
                error: function() {
                    $('#processing-district').html('');
                }
            });
        }

        async function getEditVillage(district_id, village_id, isSet) {
            await $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.villages') }}" + '/' + district_id,
                beforeSend: function() {
                    $('#processing-village').html('Processing...');
                },
                success: function(data) {
                    $('#edit_village_id').empty();
                    $("#edit_village_id").append('<option value="">Silahkan Pilih</option>');
                    $.each(data, function(key, value) {
                        $("#edit_village_id").append('<option value="' + value.id + '">' + value.name +'</option>');
                    });
                    $('#edit_village_id').val(isSet ? village_id : '');

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

        $("#edit_province_id").change(async function() {
            await getEditRegency($('#edit_province_id').val());
        });

        $("#edit_regency_id").change(async function() {
            await getEditDistrict($('#edit_regency_id').val());
        });

        $("#edit_district_id").change(async function() {
            await getEditVillage($('#edit_district_id').val());
        });

        $("#edit_village_id").change(function() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ route('helper.zip_code') }}" + '/' + $("#edit_village_id").val(),
                success: function(data) {
                    $('#edit_zip_code').val(data.zip_code);
                }
            });
        });
    </script>
@endpush