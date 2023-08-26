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
<li class="breadcrumb-item active">Data Proker</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>Daftar Data Proker</h4>
               <a href="{{route('proker.create')}}"><button class="btn btn-primary pull-right" type="button">Tambah Data Proker</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Proker</th>
                           <th>Ketua</th>
                           <th>departemen</th>
                           <th>Dana Diberikan</th>
                           <th>Status</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>

                        <tr>
                              <td>1</td>
                              <td><a href="{{ route('proker.show', 1) }}"><u>IT Fest</u></a></td>
                              <td>John</td>
                              <td>abc</td>
                              <td>Rp 4.000.000</td>
                              <td><span class="badge badge-success">Proker Disetujui</span></td>
                              <td>
                                 <ul class="action align-items-center">
                                    <li class="edit"><a href="{{route('proker.edit', 1)}}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                       <form id="form-del-proker" action="{{ route('proker.destroy', 1) }}" method="post">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
   document.getElementById('form-del-proker').addEventListener('submit', function (e) {
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