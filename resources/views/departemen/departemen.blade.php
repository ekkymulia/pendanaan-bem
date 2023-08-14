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
<li class="breadcrumb-item">Departemen</li>
<li class="breadcrumb-item">Daftar Departemen</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Akun Departemen</li>

@endsection
@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <form class="card">
            <div class="card-body">
                <h4 class="mb-5">
                    @if ($pageContext === 'add')
                        Tambah Akun Departemen
                    @elseif ($pageContext === 'edit')
                        Edit Akun Departemen
                    @elseif ($pageContext === 'detail')
                        Detail Akun Departemen
                    @endif
               </h4>
                <div class="row">
                  <div class="col-xl-4">
                    <div class="mb-3">
                        <h6 class="form-label">Nama Departemen</h6>
                        <input class="form-control" placeholder="Nama Departemen">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email-Address</label>
                        <input class="form-control" placeholder="your-email@domain.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No.telp</label>
                        <input class="form-control" placeholder="012-345-678">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" value="password">
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Ketua Departemen</label>
                                <input class="form-control" type="text" placeholder="Ketua Departemen">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Wakil Ketua</label>
                                <input class="form-control" type="text" placeholder="Wakil Ketua">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sekretaris</label>
                                <input class="form-control" type="text" placeholder="Sekretaris">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bendahara</label>
                                <input class="form-control" type="text" placeholder="Bendahara">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Komite atau Divisi Kegiatan</label>
                                <input class="form-control" type="text" placeholder="Komite atau Divisi Kegiatan">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" placeholder="Alamat Utama">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mb-3">
                            <label class="form-label">Kota</label>
                            <input class="form-control" type="text" placeholder="Kota">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="mb-3">
                            <label class="form-label">Kode Pos</label>
                            <input class="form-control" type="number" placeholder="Kode Pos">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                            <label class="form-label">Negara</label>
                            <select class="form-control btn-square">
                                <option value="0">--Pilih--</option>
                                <option value="1">Indonesia</option>
                                <option value="2">Indonesia</option>
                                <option value="3">Indonesia</option>
                                <option value="4">Indonesia</option>
                            </select>
                            </div>
                        </div>
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