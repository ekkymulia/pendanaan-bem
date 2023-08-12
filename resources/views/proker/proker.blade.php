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
<li class="breadcrumb-item">Stok</li>
<li class="breadcrumb-item">Master</li>
<li class="breadcrumb-item">Proker</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Data Proker</li>

@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>
                    @if ($pageContext === 'add')
                        Tambah Proker
                    @elseif ($pageContext === 'edit')
                        Edit Proker
                    @elseif ($pageContext === 'detail')
                        Detail Proker
                    @endif
               </h4>
            </div>
            <div class="card-body">
            <form class="form-bookmark needs-validation" id="bookmark-form" novalidate="" 
                method="POST">
                @csrf

                <div class="row g-2 col-12">
                    <div class="mt-0 mb-3 col-md-12">
                        <h6 class="mb-3">Detail Proker</h6>
                        <div class="row">
                            <div class="col-md-11">
                                <div class="mb-3 row">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="con-kandang">Status Proker</label>
                                    </div>
                                    <div class="col-6">
                                        @if ($pageContext === 'add')
                                        <h6 class="badge badge-primary">Proker Baru</h6>
                                        @elseif ($pageContext === 'edit')
                                        <h6 class="badge badge-success">Proker Disetujui</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                        @elseif ($pageContext === 'detail')
                                        <h6 class="badge badge-success">Proker Disetujui</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="mb-3 row">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="con-kandang">Nama Proker</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" id="con-kandang" name="nama_Proker" type="text" required="" placeholder="Nama Proker" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-11 mt-0">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <label for="con-jenis-ternak">Jenis Proker</label>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="jenis_Proker[]" id="rkat" value="RKAT">
                                            <label class="form-check-label" for="rkat">RKAT</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="jenis_Proker[]" id="non-rkat" value="Non-RKAT">
                                            <label class="form-check-label" for="non-rkat">Non-RKAT</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="mb-3 row">
                                    <div class="col-6 ">
                                        <label for="con-paddock">Permintaan Pendanaan (Rp)</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" id="con-paddock" type="text" name="harga" required="" placeholder="Permintaan Pendanaan (Rp)" autocomplete="off" value="{{ $proker->harga ?? '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="mb-3 row">
                                    <div class="col-6">
                                        <label for="file-upload">Upload Berkas Pendukung</label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-control" id="file-upload" type="file" name="uploaded_file" accept=".pdf, .doc, .docx">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-11 mt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="con-inhouse-keterangan">Keterangan</label>
                                    </div>
                                    <div class="col-6">
                                        <textarea class="form-control" required name="deskripsi" id="con-inhouse-keterangan" placeholder="Keterangan" >{{ $proker->deskripsi ?? '' }}</textarea>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="mb-3">Tabel Budgeting</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <h6 class="">Tabel Dana RAB</h6>
                                    <h6 class="mb-3">Sisa Dana: <span class="badge badge-success">Rp 3.980.000</span></h6>
                                    <div class="table-responsive">
                                        <table class="display" id="basic-1-2">
                                            <thead>
                                                <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Fotokopi</td>
                                                    <td>2000</td>
                                                    <td>10</td>
                                                    <td>Rp 20.000</td>
                                                    <td>
                                                        <ul class="action align-items-center">
                                                            <li class="delete">
                                                                <button type="button" class="btn btn-link">
                                                                <i class="icon-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Nama" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Harga Satuan" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Qty" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Otomatis Terhitung" disabled autocomplete="off"></td>
                                                    <td>
                                                        <ul class="action align-items-center">
                                                            <li class="delete">
                                                                <button type="button" class="btn btn-link">
                                                                <i class="icon-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row g-2 justify-content-end">
                                        <div class="col-auto">
                                            <button class="btn btn-success" type="button"><i class="icon-plus"></i>Tambahkan Baris Lagi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-4 mt-md-0">
                                <div class="row">
                                    <h6 class="mb-3">Tabel Dana Riil</h6>
                                    <h6 class="mb-3">Sisa Dana: <span class="badge badge-success">Rp 3.980.000</span></h6>
                                    <div class="table-responsive">
                                        <table class="display" id="basic-1">
                                            <thead>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Harga Satuan</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Fotokopi</td>
                                                    <td>2000</td>
                                                    <td>10</td>
                                                    <td>Rp 20.000</td>
                                                    <td>
                                                        <ul class="action align-items-center">
                                                            <li class="delete">
                                                                <button type="button" class="btn btn-link">
                                                                <i class="icon-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Nama" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Harga Satuan" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Qty" autocomplete="off"></td>
                                                    <td> <input class="form-control" id="con-import-harga-beli" type="text" required="" placeholder="Otomatis Terhitung" disabled autocomplete="off"></td>
                                                    <td>
                                                        <ul class="action align-items-center">
                                                            <li class="delete">
                                                                <button type="button" class="btn btn-link">
                                                                <i class="icon-trash"></i>
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row g-2 justify-content-end">
                                        <div class="col-auto">
                                            <button class="btn btn-success" type="button"><i class="icon-plus"></i>Tambahkan Baris Lagi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 justify-content-end">
                        <div class="col-auto">
                        @if ($pageContext == 'add' || $pageContext == 'edit')
                            <a href="{{ route('proker.index') }}">
                                    @if ($pageContext == 'add')
                                <button class="btn btn-primary" type="button">
                                        Cancel
                                    @elseif ($pageContext == 'edit')
                                <button class="btn btn-danger" type="button">
                                        Reject
                                    @endif
                                </button>
                            </a>
                        @else
                            <a href="{{ route('proker.index') }}">
                                <button class="btn btn-primary" type="button">Back</button>
                            </a>
                        @endif
                        </div>
                        <div class="col-auto">
                            @if ($pageContext == 'edit')
                            <a href="">
                                <button class="btn btn-secondary" type="submit">Approve</button>
                            </a>
                            @endif
                            @if ($pageContext == 'add')
                            <a href="{{ route('proker.store') }}">
                                <button class="btn btn-secondary" type="submit">Save</button>
                            </a>
                            @endif
                        </div>

                    </div>
                </div>
            </form>
            </div>
         </div>
      </div>
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