@extends('layouts.simple.master')
@section('title', 'Sample Page')
@section('css')
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
<style>
   table#info-proker {
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
<li class="breadcrumb-item active">Daftar Proker</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <div>
                  <h4>Daftar Data Proker</h4>
                  <table class="table" id="info-proker">
                     <tbody>
                       <tr>
                           <td>Ormawa</td>
                           <td>:</td>
                           <td><span class="text-primary">{{ $prokers['data_dept']->ormawa->user->name }}</span></td>
                       </tr>
                       <tr>
                           <td>Departemen</td>
                           <td>:</td>
                           <td>
                              <span class="text-primary">{{ $prokers['data_dept']->user->name }}</span>
                           </td>
                       </tr>
                     </tbody>
                  </table>
               </div>
               @if (session('u_data')->user_role == '3')
               <a href="{{route('proker.create')}}"><button class="btn btn-primary pull-right" type="button">Tambah Data Proker</button></a>
               @endif
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Proker</th>
                           <th>Ketua</th>
                           <th>Dana Diterima</th>
                           <th>Status</th>
                           <th>Print</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($prokers['data_prokers'] as $proker)
                        <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td><a href="{{ route('proker.edit', $proker->id) }}"><u>{{ $proker->nama }}</u></a></td>
                              <td>{{ $proker->ketua }}</td>
                              <td>Rp {{ $proker->dana }}</td>
                              <td>
                                 @if ($proker->status_id == '1')
                                 <h6 class="badge badge-success">Setuju</h6>
                                 @elseif($proker->status_id == '2')
                                 <h6 class="badge badge-danger">Tolak</h6>
                                 @else
                                 <h6 class="badge badge-warning">Menunggu</h6>
                                 @endif
                              </td>
                              <td><a href="{{ route('proker.show', $proker->id) }}"> <i class="fa fa-print"></i> </a></td>
                              <td>
                                 <ul class="action align-items-center">
                                    <li class="edit"><a href="{{route('proker.edit', $proker->id)}}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                       <form id="form-del-proker" action="{{ route('proker.destroy', $proker->id) }}" method="post">
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
   const formDelProker = document.querySelectorAll('#form-del-proker');
   formDelProker.forEach(elm => {
      elm.addEventListener('submit', function (e) {
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
   });
   document.getElementById('')
</script>
@endsection