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
<li class="breadcrumb-item active">Data Produk</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>Daftar Data Produk</h4>
               <!-- Adjust the route for creating new Produk -->
               <a href="{{ route('produk.create') }}"><button class="btn btn-primary pull-right" type="button">Tambah Data Produk</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Produk</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($produks as $produk)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $produk->nama_produk }}</td>
                              <td>
                                 <ul class="action align-items-center">
                                    <!-- Adjust the route for editing and deleting Produk -->
                                    <li class="edit"><a href="{{ route('produk.edit', $produk->id) }}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                       <form id="form-del-produk" action="{{ route('produk.destroy', $produk->id) }}" method="post">
                                          @csrf
                                          @method('delete')
                                          <button type="submit" class="btn btn-link">
                                                <i class="icon-trash"></i>
                                             </button>
                                          </form>
                                    </li>
                                 </ul>
                              </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
<script>
   document.getElementById('form-del-produk').addEventListener('submit', function (e) {
      e.preventDefault();

      Swal.fire({
         title: 'Apakah kamu yakin?',
         text: "Anda tidak akan dapat mengembalikan ini!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Ya, hapus saja!'
      }).then((result) => {
         if (result.isConfirmed) {
            e.target.submit();
         }
      });
   });
</script>
@endsection
