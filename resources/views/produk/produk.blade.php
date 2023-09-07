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
<li class="breadcrumb-item">Produk</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Data Produk
</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="edit-profile">
      <form class="card" method="POST" enctype="multipart/form-data"
         @if ($pageContext === 'add')
            action="{{ route('produk.store') }}"
         @elseif ($pageContext === 'edit')
            action="{{ route('produk.update', ['produk' => $produk->id]) }}"
         @endif>
         @csrf
         @if ($pageContext === 'edit')
            @method('PUT')
         @endif
         <div class="card-body">
            <h4 class="mb-5">
               @if ($pageContext === 'add')
                  Tambah Data Produk
               @elseif ($pageContext === 'edit')
                  Edit Data Produk
               @elseif ($pageContext === 'detail')
                  Detail Data Produk
               @endif
            </h4>
            <div class="row">
               <div class="col-xl-12">
                  <div class="mb-3">
                     <h6 class="form-label">Nama Produk</h6>
                     <input class="form-control" placeholder="Nama Produk" name="nama_produk" value="{{ old('nama_produk', isset($produk) ? $produk->nama_produk : '') }}">
                  </div>
               </div>
            </div>
            <div class="card-footer text-end">
               @if ($pageContext === 'add')
                  <button class="btn btn-primary" type="submit">Tambah Data</button>
               @elseif ($pageContext === 'edit')
                  <button class="btn btn-primary" type="submit">Perbarui Data</button>
               @endif
            </div>
         </div>
      </form>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
