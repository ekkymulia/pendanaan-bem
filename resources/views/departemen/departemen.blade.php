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
        <form class="card" method="POST" 
            @if ($pageContext === 'add')
                action="{{ route('departemen.store') }}"
            @elseif ($pageContext === 'edit')
                action="{{ route('departemen.update', ['id' => $departemen->id]) }}" {{-- Replace 'id' with the actual parameter name --}}
            @endif>
            @csrf
            @if ($pageContext === 'edit')
                @method('PUT')
            @endif
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
                        <label class="form-label">Tahun Periode</label>
                        <input class="form-control" type="text" placeholder="Tahun Periode" name="tahun_periode">
                    </div>
                    <div class="mb-3">
                        <h6 class="form-label">Nama Departemen</h6>
                        <input class="form-control" placeholder="Nama Departemen" name="nama_departemen">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email-Address</label>
                        <input class="form-control" placeholder="your-email@domain.com" name="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">No.telp</label>
                        <input class="form-control" placeholder="012-345-678" name="no_tlp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" value="password" name="password">
                    </div>
                  </div>
                  <div class="col-xl-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Ketua Departemen</label>
                                <input class="form-control" type="text" placeholder="Ketua Departemen" name="ketua_departemen">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Wakil Ketua</label>
                                <input class="form-control" type="text" placeholder="Wakil Ketua" name="wakil_ketua">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Sekretaris</label>
                                <input class="form-control" type="text" placeholder="Sekretaris" name="sekretaris">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Bendahara</label>
                                <input class="form-control" type="text" placeholder="Bendahara" name="bendahara">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Departemen</label>
                                <textarea class="form-control" placeholder="Deskripsi Departemen" name="deskripsi_departemen"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input class="form-control" type="text" placeholder="Alamat Utama" name="alamat">
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