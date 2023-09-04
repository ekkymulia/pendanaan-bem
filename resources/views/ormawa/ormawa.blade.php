@extends('layouts.simple.master')
@section('title', 'Sample Page')
@section('css')
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection
@section('breadcrumb-title')
<!-- <h3>Sample Page</h3> -->
@endsection
@section('breadcrumb-items')
<li class="breadcrumb-item">Ormawa</li>
<li class="breadcrumb-item">Daftar Ormawa</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Akun Ormawa
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <form class="card" method="POST" 
            @if ($pageContext === 'add')
                action="{{ route('ormawa.store') }}"
            @elseif ($pageContext === 'edit')
                action="{{ route('ormawa.update', ['ormawa' => $ormawa->id]) }}"
            @endif>
            @csrf
            @if ($pageContext === 'edit')
                @method('PUT')
            @endif
            <div class="card-body">
                <h4 class="mb-5">
                    @if ($pageContext === 'add')
                        Tambah Akun Ormawa
                    @elseif ($pageContext === 'edit')
                        Edit Akun Ormawa
                    @elseif ($pageContext === 'detail')
                        Detail Akun Ormawa
                    @endif
                </h4>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <h6 class="form-label">Tahun Periode</h6>
                            <input class="form-control" placeholder="Tahun Periode" name="tahun_periode" value="{{ old('tahun_periode', isset($ormawa) ? $ormawa->tahun_periode : '') }}">
                        </div>
                        <div class="mb-3">
                            <h6 class="form-label">Nama Ormawa</h6>
                            <input class="form-control" placeholder="Nama Ormawa" name="nama_ormawa" value="{{ old('nama_ormawa', isset($ormawa) ? $ormawa->user->name : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email-Address</label>
                            <input class="form-control" placeholder="your-email@domain.com" name="email" value="{{ old('email', isset($ormawa) ? $ormawa->user->email : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fakultas</label>
                            <input class="form-control" placeholder="Fakultas" name="fakultas" value="{{ old('fakultas', isset($ormawa) ? $ormawa->fakultas : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No.telp</label>
                            <input class="form-control" placeholder="012-345-678" name="no_telp" value="{{ old('no_telp', isset($ormawa) ? $ormawa->no_telp : '') }}">
                        </div>
                    </div>
                    <div class="col-xl-8">

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Ketua Ormawa</label>
                                    <input class="form-control" type="text" placeholder="Ketua Ormawa" name="ketua_ormawa" value="{{ old('ketua', isset($ormawa) ? $ormawa->ketua : '') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Wakil Ketua</label>
                                    <input class="form-control" type="text" placeholder="Wakil Ketua" name="wakil_ketua" value="{{ old('wakil', isset($ormawa) ? $ormawa->wakil : '') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Sekretaris</label>
                                    <input class="form-control" type="text" placeholder="Sekretaris" name="sekretaris" value="{{ old('sekretaris', isset($ormawa) ? $ormawa->sekretaris : '') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Bendahara</label>
                                    <input class="form-control" type="text" placeholder="Bendahara" name="bendahara" value="{{ old('bendahara', isset($ormawa) ? $ormawa->bendahara : '') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Ketua Pengawas</label>
                                    <input class="form-control" type="text" placeholder="Ketua Pengawas" name="ketua_pengawas" value="{{ old('ketua_pengawas', isset($ormawa) ? $ormawa->ketua_pengawas : '') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control" type="text" placeholder="Alamat Utama" name="alamat" value="{{ old('alamat', isset($ormawa) ? $ormawa->alamat : '') }}">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Kota</label>
                                    <input class="form-control" type="text" placeholder="Kota" name="kota" value="{{ old('kota', isset($ormawa) ? $ormawa->kota : '') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mb-3">
                                    <label class="form-label">Kode Pos</label>
                                    <input class="form-control" type="number" placeholder="Kode Pos" name="kode_pos" value="{{ old('kode_pos', isset($ormawa) ? $ormawa->kode_pos : '') }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label">Negara</label>
                                    <select class="form-control btn-square" name="negara">
                                        <option value="0">--Pilih--</option>
                                        <option value="1" {{ old('negara', isset($ormawa) ? $ormawa->negara : '') == 1 ? 'selected' : '' }}>Indonesia</option>
                                        <option value="2" {{ old('negara', isset($ormawa) ? $ormawa->negara : '') == 2 ? 'selected' : '' }}>Indonesia</option>
                                        <option value="3" {{ old('negara', isset($ormawa) ? $ormawa->negara : '') == 3 ? 'selected' : '' }}>Indonesia</option>
                                        <option value="4" {{ old('negara', isset($ormawa) ? $ormawa->negara : '') == 4 ? 'selected' : '' }}>Indonesia</option>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="card-footer text-end">
                            @if ($pageContext === 'add')
                                <button class="btn btn-primary" type="submit">Tambah Akun</button>
                            @elseif ($pageContext === 'edit')
                                <button class="btn btn-primary" type="submit">Perbarui Akun</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script lang="javascript">
    const selectInput = document.getElementById('asal-ternak');
    const inhouseSection = document.getElementById('inhouse-section');
    const importSection = document.getElementById('import-section');

    selectInput.addEventListener('change', function() {
        const selectedValue = selectInput.value;

        if (selectedValue === '1') {
            inhouseSection.style.display = 'block';
            importSection.style.display = 'none';
        } else if (selectedValue === '2') {
            inhouseSection.style.display = 'none';
            importSection.style.display = 'block';
        } else {
            inhouseSection.style.display = 'none';
            importSection.style.display = 'none';
        }
    });
</script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
