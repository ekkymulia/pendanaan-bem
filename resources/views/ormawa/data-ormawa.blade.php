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
<li class="breadcrumb-item">Ormawa</li>
<li class="breadcrumb-item">Daftar Ormawa</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>Daftar Akun Ormawa</h4>
               <a href="{{route('ormawa.create')}}"><button class="btn btn-primary pull-right" type="button">Tambah Akun Ormawa</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Ormawa</th>
                           <th>Email</th>
                           <th>No.Telp</th>
                           <th>Ketua</th>
                           <th>Wakil</th>
                           <th>Departemen</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach($ormawas as $key => $ormawa)
                        <tr>
                              <td>{{ $key + 1 }}</td>
                              <td><a href="{{ route('ormawa.show', $ormawa->id) }}"><u>{{ $ormawa->user->name }}</u></a></td>
                              <td>{{ $ormawa->user->email }}</td>
                              <td>{{ $ormawa->no_telp }}</td>
                              <td>{{ $ormawa->ketua ?? '-' }}</td>
                              <td>{{ $ormawa->wakil ?? '-' }}</td>
                              <td>
                                 <a href="{{ route('departemen.index', ['id' => $ormawa->id]) }}" class="text-decoration-underline">
                                    Daftar Departemen
                                 </a>
                              </td>
                              <td>
                                 <ul class="action align-items-center">
                                    <li class="edit"><a href="{{ route('ormawa.edit', $ormawa->id) }}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                       <form action="{{ route('ormawa.destroy', $ormawa->id) }}" method="post">
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
@endsection