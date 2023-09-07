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
<li class="breadcrumb-item active">Data Supplier</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>Daftar Data Supplier</h4>
               <!-- Adjust the route for creating new Supplier -->
               <a href="{{ route('supplier.create') }}"><button class="btn btn-primary pull-right" type="button">Tambah Data Supplier</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Supplier</th>
                           <th>Nama Produk</th>
                           <!-- Add more columns if needed -->
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $supplier->nama_supplier }}</td>
                              <td>{{ $supplier->produk->nama_produk }}</td>
                              <!-- Add more columns if needed -->
                              <td>
                                 <ul class="action align-items-center">
                                    <!-- Adjust the route for editing and deleting Supplier -->
                                    <li class="edit"><a href="{{ route('supplier.edit', $supplier->id) }}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                       <form id="form-del-supplier" action="{{ route('supplier.destroy', $supplier->id) }}" method="post">
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
   document.getElementById('form-del-supplier').addEventListener('submit', function (e) {
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
