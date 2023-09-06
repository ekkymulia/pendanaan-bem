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
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Akun Ormawa
</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="edit-profile">
        <form class="card" method="POST" 
            @if ($pageContext === 'add')
                action="{{ route('kalender.store') }}"
            @elseif ($pageContext === 'edit')
                action="{{ route('kalender.update', ['kalender' => $kalender->id]) }}"
            @endif>
            @csrf
            @if ($pageContext === 'edit')
                @method('PUT')
            @endif
            <div class="card-body">
                <h4 class="mb-5">
                    @if ($pageContext === 'add')
                        Tambah Acara Kalender
                    @elseif ($pageContext === 'edit')
                        Edit Acara Kalender
                    @elseif ($pageContext === 'detail')
                        Detail Acara Kalender
                    @endif
                </h4>
                <div class="row">
                    <div class="col-xl-4">
                        <div class="mb-3">
                            <h6 class="form-label">Nama Acara</h6>
                            <input class="form-control" placeholder="Nama Acara" name="event_name" value="{{ old('event_name', isset($kalender) ? $kalender->event_name : '') }}">
                        </div>
                        <div class="mb-3">
                            <h6 class="form-label">Tanggal Mulai</h6>
                            <input class="form-control" type="date" name="event_start_date" value="{{ old('event_start_date', isset($kalender) ? $kalender->event_start_date : '') }}">
                        </div>
                        <div class="mb-3">
                            <h6 class="form-label">Tanggal Selesai</h6>
                            <input class="form-control" type="date" name="event_end_date" value="{{ old('event_end_date', isset($kalender) ? $kalender->event_end_date : '') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi Acara</label>
                            <textarea class="form-control" placeholder="Deskripsi Acara" name="event_description">{{ old('event_description', isset($kalender) ? $kalender->event_description : '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    @if ($pageContext === 'add')
                        <button class="btn btn-primary" type="submit">Tambah Acara</button>
                    @elseif ($pageContext === 'edit')
                        <button class="btn btn-primary" type="submit">Perbarui Acara</button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script lang="javascript">
    const selectInput = document.getElementById('asal-ternak');
    const inhouseSection = document.getElementById('inhouse-section');
    const importSection = document.getElementById('import-section');

    selectInput.addEventListener('change', function() {
        const selectedValue = selectInput.value;

        if (selectedValue === '1') {
            inhouseSection.style.display = 'block';
            importSection.style.display = 'none';
        } else if (selectedValue === '2') {
            inhouseSection.style.display = 'none';
            importSection.style.display = 'block';
        } else {
            inhouseSection.style.display = 'none';
            importSection.style.display = 'none';
        }
    });
</script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
