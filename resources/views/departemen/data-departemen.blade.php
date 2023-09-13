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
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <div>
                  <h4>Daftar Akun Departemen</h4>
                  <h6>Ormawa : <span class="text-primary">{{ $departemens['data_ormw']->user->name }}</span></h6>
               </div>
               <a href="{{route('departemen.create')}}"><button class="btn btn-primary pull-right" type="button">Tambah Akun Departemen</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="display" id="basic-1">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Nama Departemen</th>
                           <th>Email</th>
                           <th>No.Telp</th>
                           <th>Ketua</th>
                           <th>Wakil</th>
                           <th>Proker</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                     @foreach ($departemens['data_dept'] as $department)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $department->user->name }}</td>
                            <td>{{ $department->user->email }}</td>
                            <td>{{ $department->no_tlp }}</td>
                            <td>{{ $department->ketua_departemen }}</td>
                            <td>{{ $department->wakil_ketua }}</td>
                            <td>
                              <a href="{{ route('proker.index', ['id' => $department->id]) }}" class="text-decoration-underline">
                                 Daftar Proker
                              </a>
                            </td>
                            <td>
                                <ul class="action align-items-center">
                                    <li class="edit"><a href="{{ route('departemen.edit', $department->id) }}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                    <form action="{{ route('departemen.destroy', $department->id) }}" method="post">
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