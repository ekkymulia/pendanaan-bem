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
<li class="breadcrumb-item">Supplier</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Data Supplier
</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="edit-profile">
      <form class="card" method="POST" enctype="multipart/form-data"
         @if ($pageContext === 'add')
            action="{{ route('supplier.store') }}"
         @elseif ($pageContext === 'edit')
            action="{{ route('supplier.update', ['supplier' => $supplier->id]) }}"
         @endif>
         @csrf
         @if ($pageContext === 'edit')
            @method('PUT')
         @endif
         <div class="card-body">
            <h4 class="mb-5">
               @if ($pageContext === 'add')
                  Tambah Data Supplier
               @elseif ($pageContext === 'edit')
                  Edit Data Supplier
               @elseif ($pageContext === 'detail')
                  Detail Data Supplier
               @endif
            </h4>
            <div class="row">
               <div class="col-xl-6">
                  <div class="mb-3">
                     <h6 class="form-label">Nama Supplier</h6>
                     <input class="form-control" placeholder="Nama Supplier" name="nama_supplier" value="{{ old('nama_supplier', isset($supplier) ? $supplier->nama_supplier : '') }}">
                  </div>
               </div>
               <div class="col-xl-6">
                  <div class="mb-3">
                     <label class="form-label">Produk</label>
                     <select class="form-control" name="produk_id">
                        <option value="">Pilih Produk</option>
                        @foreach ($produks as $produk)
                           <option value="{{ $produk->id }}" {{ old('produk_id', isset($produk) ? $produk->produk_id : '') == $supplier->produk->produk_id ? 'selected' : '' }}>
                              {{ $produk->nama_produk }}
                           </option>
                        @endforeach
                     </select>
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
