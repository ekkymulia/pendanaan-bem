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
<li class="breadcrumb-item">Kalender</li>
<li class="breadcrumb-item">Daftar Kalender</li>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <!-- <div class="col-sm-6 col-lg-3 col-md-3">
         <div class="card h-100 small-widget mb-sm-0">
            <div class="card-body h-100 primary">
            <span class="f-light">Jumlah Proker</span>
            <div class="d-flex align-items-end gap-1">
                  <h4>2</h4>
                  <span class="badge badge-primary f-12 f-w-500">Item</span>
            </div>
            <div class="bg-gradient">
                  <svg class="stroke-icon svg-fill">
                     <use href="../assets/svg/icon-sprite.svg#new-order"></use>
                  </svg>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3 col-md-3">
         <div class="card h-100 small-widget mb-sm-0">
            <div class="card-body h-100 primary">
            <span class="f-light">Jumlah Karbohidrat</span>
            <div class="d-flex align-items-end gap-1">
                  <h4>1</h4>
                  <span class="badge badge-primary f-12 f-w-500">Item</span>
            </div>
            <div class="bg-gradient">
                  <svg class="stroke-icon svg-fill">
                     <use href="../assets/svg/icon-sprite.svg#new-order"></use>
                  </svg>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3 col-md-3">
         <div class="card h-100 small-widget mb-sm-0">
            <div class="card-body h-100 primary">
            <span class="f-light">Jumlah Protein</span>
            <div class="d-flex align-items-end gap-1">
                  <h4>0</h4>
                  <span class="badge badge-primary f-12 f-w-500">Item</span>
            </div>
            <div class="bg-gradient">
                  <svg class="stroke-icon svg-fill">
                     <use href="../assets/svg/icon-sprite.svg#new-order"></use>
                  </svg>
            </div>
            </div>
         </div>
      </div>
      <div class="col-sm-6 col-lg-3 col-md-3">
         <div class="card h-100 small-widget mb-sm-0">
            <div class="card-body h-100 primary">
            <span class="f-light">Jumlah Konsentrat</span>
            <div class="d-flex align-items-end gap-1">
                  <h4>1</h4>
                  <span class="badge badge-primary f-12 f-w-500">Item</span>
            </div>
            <div class="bg-gradient">
                  <svg class="stroke-icon svg-fill">
                     <use href="../assets/svg/icon-sprite.svg#new-order"></use>
                  </svg>
            </div>
            </div>
         </div>
      </div> -->
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>Daftar Kalender</h4>
               <a href="{{route('kalender.create')}}"><button class="btn btn-primary pull-right" type="button">Tambah Kalender</button></a>
            </div>
            <div class="card-body">
               <div class="table-responsive">
               <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kalenders as $kalender)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kalender->event_name }}</td>
                            <td>{{ $kalender->event_description }}</td>
                            <td>{{ $kalender->event_start_date }}</td>
                            <td>{{ $kalender->event_end_date }}</td>
                            <td>
                                <ul class="action align-items-center">
                                    <li class="edit"><a href="{{ route('kalender.edit', $kalender->id) }}"><i class="icon-pencil-alt"></i></a></li>
                                    <li class="delete">
                                        <form action="{{ route('kalender.destroy', $kalender->id) }}" method="post">
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