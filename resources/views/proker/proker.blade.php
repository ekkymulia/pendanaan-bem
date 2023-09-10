@extends('layouts.simple.master')
@section('title', 'Sample Page')
@section('css')
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<style>
    table#info-dana {
      width: auto;
      table-layout: auto;
    }
  </style>
@endsection
@section('breadcrumb-title')
<!-- <h3>Sample Page</h3> -->
@endsection
@section('breadcrumb-items')
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

               @if ($errors->any)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                @endforeach
               @endif
            </div>
            <div class="card-body">
                @if (session('u_data')->user_role == '3')
                    @if ($pageContext == 'add')
                    <form class="form-bookmark needs-validation form-proker" id="bookmark-form" novalidate="" method="POST" enctype="multipart/form-data"
                    action="{{ route('proker.store') }}"> @csrf @method('POST')
                    @endif
                @endif
                @if($pageContext == 'edit')
                <form class="form-bookmark needs-validation form-proker" id="bookmark-form" novalidate="" method="POST" enctype="multipart/form-data"
                action="{{ route('proker.update', $proker->id) }}"> @csrf @method('PUT')
                @endif

                    <div class="row g-2 col-12">
                        <div class="mt-0 mb-3 col-md-12">
                            <h6 class="mb-3">Detail Proker</h6>
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-nama">Status Proker</label>
                                        </div>
                                        @if (session('u_data')->user_role == '1')
                                        <div class="col-6">
                                            <select class="form-select" aria-label="Default select example" name="status_proker">
                                                <option value="1" {{$proker->status_id == '1' ? 'selected' : ''}}>Setujui</option>
                                                <option value="2" {{$proker->status_id == '2' ? 'selected' : ''}}>Tolak</option>
                                                <option value="3" {{$proker->status_id == '3' ? 'selected' : ''}}>Menunggu</option>
                                            </select>
                                        </div>
                                        @else
                                        <div class="col-6">
                                            @if ($pageContext === 'add')
                                            <h6 class="badge badge-primary">Proker Baru</h6>
                                            @elseif ($pageContext === 'edit')
                                                @if ($proker->status_id == '1')
                                                <h6 class="badge badge-success">Proker Disetujui</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                                @elseif($proker->status_id == '2')
                                                <h6 class="badge badge-danger">Proker Ditolak</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                                @else
                                                <h6 class="badge badge-warning">Proker Menunggu</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                                @endif
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-bendahara">Tipe Dana</label>
                                        </div>
                                        @if (session('u_data')->user_role == '1')
                                        <div class="col-6">
                                            <select class="form-select" aria-label="Default select example" name="tipe_dana" required>
                                                <option disabled {{ !$proker->tipe_dana_id || ($proker->tipe_dana_id == null) ? 'selected' : '' }}>Pilih Tipe Dana</option>
                                                <option value="1" {{ $proker->tipe_dana_id && ($proker->tipe_dana_id == '1') ? 'selected' : '' }}>RKAT</option>
                                                <option value="2" {{ $proker->tipe_dana_id && ($proker->tipe_dana_id == '2') ? 'selected' : '' }}>BPPTN</option>
                                            </select>
                                        </div>
                                        @else
                                        <div class="col-6">
                                            @if ($pageContext === 'add')
                                            <h6 class="badge badge-primary">—</h6>
                                            @elseif ($pageContext === 'edit')
                                                @if ($proker->tipe_dana_id)
                                                    @if ($proker->tipe_dana_id == '1')
                                                    <h6 class="badge badge-success">RKAT</h6>
                                                    @else
                                                    <h6 class="badge badge-success">BPPTN</h6>
                                                    @endif
                                                @else
                                                <h6 class="badge badge-warning">Menunggu</h6>
                                                @endif
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-jenis-bptn">{{ session('u_data')->user_role == '1' ? 'Berikan dana' : 'Dana yang diterima' }} (Rp)</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control no-arrow" type="number" name="dana" id="proker-jenis-bptn" 
                                                placeholder="{{ session('u_data')->user_role == '1' ? 'Berikan dana' : 'Dana yang diterima' }} (Rp)" min="0" 
                                                value="{{ $proker->dana ?? old('bendahara_proker') }}" 
                                                {{ session('u_data')->user_role != '1' ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-nama">Nama Proker</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-nama" name="nama_proker" type="text" required placeholder="Nama Proker" autocomplete="off" value="{{ $proker->nama ?? old('nama_proker') }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-ketua">Ketua Proker</label>

                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-ketua" name="ketua_proker" type="text" required placeholder="Ketua Proker" autocomplete="off" value="{{ $proker->ketua ?? old('ketua_proker') }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-bendahara">Bendahara Proker</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-bendahara" name="bendahara_proker" type="text" required placeholder="Bendahara Proker" autocomplete="off" value="{{ $proker->bendahara ?? old('bendahara_proker') }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="file-proposal">Upload Proposal</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="file-proposal" type="file" name="file_proposal" accept=".pdf, .doc, .docx" required {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                            @if ($proker)
                                                <a href="/storage/{{ $proker->file_proposal }}" class="text-decoration-underline mt-2 d-inline-block {{ !$proker->file_proposal ? 'disabled' : '' }}" target="_blank">
                                                    File proposal Sebelumnya
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="file-lpj">Upload LPJ</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="file-lpj" type="file" name="file_lpj" accept=".pdf, .doc, .docx" {{ (session('u_data')->user_role != '3') ? 'disabled' : '' }}>
                                            @if ($proker)
                                                <a href="/storage/{{ $proker->file_lpj }}" class="text-decoration-underline mt-2 d-inline-block {{ !$proker->file_lpj ? 'disabled' : '' }}" target="_blank">
                                                    File LPJ Sebelumnya
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-11 mt-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="proker-ket">Keterangan</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea id="proker-ket" class="form-control" required name="keterangan" id="con-inhouse-keterangan" placeholder="Keterangan" rows="6" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>{{ $proker->keterangan ?? old('keterangan') }}</textarea>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="my-3">Tabel Budgeting</h6>
                            <div class="tab-tbl-budget">
                                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="pills-rab-tab" data-bs-toggle="pill" href="#pills-rab" role="tab" aria-controls="pills-rab" aria-selected="true" data-bs-original-title="" title="">Dana RAB</a></li>
                                    <li class="nav-item"><a class="nav-link {{ (($pageContext != 'add') && ($proker->status_id == '1')) ? '' : 'disabled'; }}" id="pills-rill-tab" data-bs-toggle="pill" href="#pills-rill" role="tab" aria-controls="pills-rill" aria-selected="false" data-bs-original-title="" title="">Dana Riil</a></li>
                                </ul>
                                <div class="tab-content" id="pills-warningtabContent">
                                    <div class="tab-pane fade active show" id="pills-rab" role="tabpanel" aria-labelledby="pills-rab-tab">
                                        <div class="col-12">
                                            <div class="row">
                                                <h6 class="my-3">Tabel Dana RAB</h6>
                                                @if (($pageContext == 'edit') && ($proker->dana > '0'))
                                                <div class="table-responsive mb-3">
                                                    <table class="table" id="info-dana">
                                                      <tbody>
                                                        <tr>
                                                            <td>Dana yang diterima</td>
                                                            <td>:</td>
                                                            <td><span class="badge badge-primary">Rp <span>{{ $proker->dana ?? 0 }}</span></span></td>
                                                        </tr>
                                                        @if (intval($proker->dana ?? 0) > intval($danaDipakaiRab))
                                                        <tr>
                                                            <td>Dana Rencana Pakai</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <span class="badge badge-success">Rp <span>{{ $danaDipakaiRab }}</span></span>
                                                                    <i class="fa fa-check"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Dana</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span class="badge badge-success">Aman</span>
                                                            </td>
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <td>Dana Rencana Pakai</td>
                                                            <td>:</td>
                                                            <td>
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <span class="badge badge-danger">Rp <span>{{ $danaDipakaiRab }}</span></span>
                                                                    <i class="fa fa-exclamation-triangle"></i>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Status Dana</td>
                                                            <td>:</td>
                                                            <td>
                                                                <span class="badge badge-danger">Kurangi dana rab</span>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                      </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="table-responsive">
                                                    <table class="display tbl-rab calc-price" id="basic-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="">No.</th>
                                                                <th class="">Nama</th>
                                                                <th class="">Harga Satuan</th>
                                                                <th class="">Qty</th>
                                                                <th class="">Total Harga</th>
                                                                <th class="">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($danaRabs as $danaRab)
                                                            <tr>
                                                                <td data-number="{{ $loop->iteration; }}">{{ $loop->iteration; }}</td>
                                                                <td>
                                                                    <input type="hidden" name="id_rab[]" value="{{ $danaRab->id }}">
                                                                    <input class="form-control" id="" type="text" required placeholder="Nama" autocomplete="off" name="rab_nama[]" value="{{ $danaRab->nama }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="hargaSatuan" type="number" required placeholder="Harga Satuan" autocomplete="off" name="rab_hargasatuan[]" value="{{ $danaRab->harga_satuan }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required placeholder="Qty" autocomplete="off" min="0" name="rab_qty[]" value="{{ $danaRab->quantity }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required placeholder="Otomatis Terhitung" autocomplete="off" name="rab_totalharga[]" disabled value="{{ $danaRab->total_harga }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <ul class="action align-items-center">
                                                                        <li class="delete">
                                                                            <a href="{{route('proker.destroyDanaRab', $danaRab->id)}}" class="{{ session('u_data')->user_role != '3' ? 'disabled' : '' }}">
                                                                                <i class="icon-trash"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td data-number="1">1</td>
                                                                <td>
                                                                    <input class="form-control" id="" type="text" required placeholder="Nama" autocomplete="off" name="rab_nama[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="hargaSatuan" type="number" required placeholder="Harga Satuan" autocomplete="off" name="rab_hargasatuan[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required placeholder="Qty" autocomplete="off" min="0" name="rab_qty[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required placeholder="Otomatis Terhitung" autocomplete="off" name="rab_totalharga[]" disabled>
                                                                </td>
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
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row g-2 justify-content-end">
                                                    <div class="col-auto">
                                                        <button class="btn btn-success {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}" type="button" id="add-row-table" data-target-table="tbl-rab">
                                                            <i class="icon-plus"></i>
                                                            Tambahkan Baris Lagi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($pageContext != 'add')
                                    <div class="tab-pane fade" id="pills-rill" role="tabpanel" aria-labelledby="pills-rill-tab">
                                        <div class="col-12">
                                            <div class="row">
                                                <h6 class="my-3">Tabel Dana Riil</h6>
                                                @if (($pageContext == 'edit') && ($proker->dana > '0'))
                                                <div class="table-responsive mb-3">
                                                    <table class="table" id="info-dana">
                                                      <tbody>
                                                        <tr>
                                                            <td>Dana yang diterima</td>
                                                            <td>:</td>
                                                            <td><span class="badge badge-primary">Rp <span>{{ $proker->dana }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Dana dipakai</p></td>
                                                            <td>:</td>
                                                            <td><span class="badge badge-primary">Rp <span>{{ $danaDipakaiRiil }}</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sisa Dana</p></td>
                                                            <td>:</td>
                                                            <td><span class="badge badge-primary">Rp <span>{{ $sisaDanaRiil }}</span></span></td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                                <div class="table-responsive">
                                                    <table class="display tbl-riil calc-price" id="basic-1-2">
                                                        <thead>
                                                            <tr>
                                                                <th class="">No.</th>
                                                                <th class="">Nama</th>
                                                                <th class="">Harga Satuan</th>
                                                                <th class="">Qty</th>
                                                                <th class="">Total Harga</th>
                                                                <th class="">Bukti</th>
                                                                <th class="">Status</th>
                                                                <th class="">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($danaRiils as $danaRiil)
                                                            <tr>
                                                                <td data-number="{{ $loop->iteration; }}">{{ $loop->iteration; }}</td>
                                                                <td>
                                                                    <input type="hidden" name="riil_id[]" value="{{ $danaRiil->id }}">
                                                                    <select class="form-control" required name="riil_nama[]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                        <option value="">Pilih Nama</option>
                                                                        @foreach ($suppliers as $supplier)
                                                                            <option 
                                                                                value="{{ $supplier->id }}" 
                                                                                {{$danaRiil->supplier_id == $supplier->id ? 'selected' : ''}}
                                                                            >{{ $supplier->nama_supplier }} - {{ $supplier->produk->nama_produk }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td class="d-flex align-items-center gap-2 flex-column">
                                                                    <input class="form-control col-12" id="hargaSatuan" type="text" required="" placeholder="Harga Satuan" autocomplete="off" name="riil_hargasatuan[]" value="{{ $danaRiil->harga_satuan }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                    @if($danaRiil->warning && session('u_data')->user_role == 1)
                                                                    <div class="col-12 d-flex align-items-center gap-2">
                                                                        <i class="fa fa-warning text-warning "></i> over mean (mean: {{ $danaRiil->mean_price ?? '-' }})
                                                                    </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required="" placeholder="Qty" autocomplete="off" min="0" name="riil_qty[]" value="{{ $danaRiil->quantity }}" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required="" placeholder="Otomatis Terhitung" disabled autocomplete="off" name="total_harga[]" value="{{ $danaRiil->total_harga }}">
                                                                </td>
                                                                <td>
                                                                    <input type="hidden" name="riil_bukti[]" value="{{ $danaRiil->bukti }}">
                                                                    <input class="form-control" id="" type="file" required="" accept=".png, .jpg, .jpeg" name="riil_bukti_changes[{{$loop->iteration-1}}]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                    <a href="/storage/{{ $danaRiil->bukti }}" class="text-decoration-underline mt-2 d-inline-block" target="_blank">
                                                                        <small>Bukti <i class="fa fa-external-link"></i></small>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    @if (session('u_data')->user_role == '1')
                                                                    <select class="form-select" aria-label="Default select example" name="status_riil[]" required>
                                                                        <option value="1" {{ ($danaRiil->status_id == '1') ? 'selected' : '' }}>Setujui</option>
                                                                        <option value="2" {{ ($danaRiil->status_id == '2') ? 'selected' : '' }}>Tolak</option>
                                                                        <option value="3" {{ ($danaRiil->status_id == '3') ? 'selected' : '' }}>Menunggu</option>
                                                                    </select>
                                                                    @else
                                                                        <input type="hidden" name="status_riil[]" value="{{$danaRiil->status_id}}">
                                                                        @if ($danaRiil->status_id == '1')
                                                                        <h6 class="badge badge-success">Setuju</h6>
                                                                        @elseif($danaRiil->status_id == '2')
                                                                        <h6 class="badge badge-danger">Tolak</h6>
                                                                        @else
                                                                        <h6 class="badge badge-warning">Menunggu</h6>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <ul class="action align-items-center">
                                                                        <li class="delete">
                                                                            <a href="{{route('proker.destroyDanaRiil', $danaRiil->id)}}" class="{{ session('u_data')->user_role != '3' ? 'disabled' : '' }}">
                                                                                <i class="icon-trash"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td data-number="1">1</td>
                                                                <td>
                                                                    <select class="form-control" required name="riil_nama[]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                        <option value="">Pilih Nama</option>
                                                                        @foreach ($suppliers as $supplier)
                                                                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }} - {{ $supplier->produk->nama_produk }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="hargaSatuan" type="text" required="" placeholder="Harga Satuan" autocomplete="off" name="riil_hargasatuan[]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required="" placeholder="Qty" autocomplete="off" min="0" name="riil_qty[]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required="" placeholder="Otomatis Terhitung" disabled autocomplete="off" name="total_harga[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="" type="file" required="" accept=".png, .jpg, .jpeg" name="riil_bukti_changes[0]" {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                </td>
                                                                <td>
                                                                    @if (session('u_data')->user_role == '1')
                                                                    <select class="form-select" aria-label="Default select example" name="status_riil[]" required {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}>
                                                                        <option disabled selected>Pilih Status</option>
                                                                        <option value="1">Setujui</option>
                                                                        <option value="2">Tolak</option>
                                                                        <option value="3">Menunggu</option>
                                                                    </select>
                                                                    @else
                                                                    <h6 class="badge badge-warning">Menunggu</h6>
                                                                    @endif
                                                                </td>
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
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row g-2 justify-content-end">
                                                    <div class="col-auto">
                                                        <button class="btn btn-success {{ session('u_data')->user_role != '3' ? 'disabled' : '' }}" type="button" id="add-row-table" data-target-table="tbl-riil">
                                                            <i class="icon-plus"></i>
                                                            Tambahkan Baris Lagi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @if (session('u_data')->user_role != '2')
                        <div class="row g-2 justify-content-end">
                            <div class="col-auto">
                                <a href="{{route('proker.index')}}" class="d-inline-block">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                </a>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-secondary" type="submit">Save</button>
                            </div>
                        </div>
                        @endif
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
    const btnAddRowTable = document.querySelectorAll("button#add-row-table");

    btnAddRowTable.forEach(elm => {
        elm.addEventListener("click", () => {
            const targetTbl = elm.getAttribute("data-target-table");
            const tbody = document.querySelector(`table.${targetTbl} tbody`);
            const lastRow = tbody.querySelector("tr:last-child");

            if (lastRow) {
                const newRow = lastRow.cloneNode(true); // Salin elemen terakhir
                const inputs = newRow.querySelectorAll("input, select, textarea");
                
                // Reset nilai input pada baris baru
                inputs.forEach(input => {
                    if (input.type !== "radio" && input.type !== "checkbox") {
                        input.value = "";
                    }
                });

                if( targetTbl == 'tbl-riil' ){
                    const lastIndex = parseInt(lastRow.querySelector("input[name^='riil_bukti_changes']").name.match(/\d+/)[0]);
                    const nextIndex = lastIndex + 1;
    
                    inputs.forEach(input => {
                        if (input.name.startsWith("riil_bukti_changes[")) {
                            input.name = input.name.replace(/\[\d+\]/, `[${nextIndex}]`);
                        }
                    });
                }

                const lastNumber = parseInt(lastRow.querySelector("td:first-child").getAttribute("data-number"));
                const newNumber = lastNumber + 1;
                newRow.querySelector("td:first-child").setAttribute("data-number", newNumber);
                newRow.querySelector("td:first-child").innerHTML = newNumber;

                tbody.appendChild(newRow);
            }
            calcPrice();
        });
    });

    function calcPrice(){
        const table = document.querySelectorAll("table.calc-price");
        table.forEach(elm => {
            const tr = elm.querySelectorAll("tbody tr");
            tr.forEach(row => {
                const hargaSatuan = row.querySelector("input#hargaSatuan");
                const quantity = row.querySelector("input#quantity");
                const calcTotal = row.querySelector("input#calcTotal");
                hargaSatuan.addEventListener("input", ()=>{
                    if((quantity.value != "") && (hargaSatuan.value != "")){
                        calcTotal.value = parseInt(hargaSatuan.value) * parseInt(quantity.value);
                    }else{
                        calcTotal.value = "";
                    }
                });
                quantity.addEventListener("input", ()=>{
                    if((quantity.value != "") && (hargaSatuan.value != "")){
                        calcTotal.value = parseInt(hargaSatuan.value) * parseInt(quantity.value);
                    }else{
                        calcTotal.value = "";
                    }
                });
            });
        });
    }
    calcPrice();

    const formProker = document.querySelector('form.form-proker');
    formProker.addEventListener("submit", e => {
        e.preventDefault();
        const disabledInputs = formProker.querySelectorAll("input[disabled]");
        disabledInputs.forEach(input => {
            input.removeAttribute("disabled");
        });
        formProker.submit();
    });
</script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection