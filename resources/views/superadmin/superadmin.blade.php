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
<li class="breadcrumb-item">Superadmin</li>
<li class="breadcrumb-item">Superadmin</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Akun Superadmin
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <form class="card" method="POST" enctype="multipart/form-data"
            @if ($pageContext === 'edit')
                action="{{ route('user.update', ['user' => $user->id]) }}"
            @endif>
            @csrf
            @if ($pageContext === 'edit')
                @method('PUT')
            @endif
            <div class="card-body">
                <h4 class="mb-5">
                    @if ($pageContext === 'add')
                        Tambah Akun Superadmin
                    @elseif ($pageContext === 'edit')
                        Edit Akun Superadmin
                    @elseif ($pageContext === 'detail')
                        Detail Akun Superadmin
                    @endif
                </h4>
                <div class="row">
                    <input type="hidden" name="mode" value="{{$mode}}">
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <h6 class="form-label">Nama Superadmin</h6>
                            <input class="form-control" placeholder="Nama Superadmin" name="nama_superadmin" value="{{ old('nama_superadmin', isset($user) ? $user->name : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email-Address</label>
                            <input class="form-control" placeholder="your-email@domain.com" name="email" value="{{ old('email', isset($user) ? $user->email : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="profile_img">Profile Image</label>
                            <input type="file" name="profile_img" accept="image/*">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        @if ($pageContext === 'add')
                            <button class="btn btn-primary" type="submit">Tambah Akun</button>
                        @elseif ($pageContext === 'edit')
                            <button class="btn btn-primary" type="submit">Perbarui Akun</button>
                        @endif
                    </div>
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
