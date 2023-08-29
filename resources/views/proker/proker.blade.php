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
<li class="breadcrumb-item">Proker</li>
<li class="breadcrumb-item active">
    @if ($pageContext === 'add')
        Tambah
    @elseif ($pageContext === 'edit')
        Edit
    @elseif ($pageContext === 'detail')
        Detail
    @endif
    Data Proker</li>

@endsection
@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12 mt-3">
         <div class="card">
            <div class="card-header pb-0 card-no-border">
               <h4>
                    @if ($pageContext === 'add')
                        Tambah Proker
                    @elseif ($pageContext === 'edit')
                        Edit Proker
                    @elseif ($pageContext === 'detail')
                        Detail Proker
                    @endif
               </h4>

               @if ($errors->any)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                @endforeach
               @endif
            </div>
            <div class="card-body">
                <form class="form-bookmark needs-validation form-proker" id="bookmark-form" novalidate="" 
                    method="POST" 
                    enctype="multipart/form-data"
                    action="{{
                        (($pageContext === 'add') && (session('u_data')->user_role == '3')) ? route('proker.store') : ''
                    }}"
                >
                    @csrf

                    <div class="row g-2 col-12">
                        <div class="mt-0 mb-3 col-md-12">
                            <h6 class="mb-3">Detail Proker</h6>
                            <div class="row">
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="con-kandang">Status Proker</label>
                                        </div>
                                        <div class="col-6">
                                            @if ($pageContext === 'add')
                                            <h6 class="badge badge-primary">Proker Baru</h6>
                                            @elseif ($pageContext === 'edit')
                                            <h6 class="badge badge-success">Proker Disetujui</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                            @elseif ($pageContext === 'detail')
                                            <h6 class="badge badge-success">Proker Disetujui</h6><a class="btn-sm btn-link " style="cursor:pointer;">Klik untuk Print Laporan</a>
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-nama">Nama Proker</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-nama" name="nama_proker" type="text" required placeholder="Nama Proker" autocomplete="off" value="{{ old('nama_proker') }}">
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-ketua">Ketua Proker</label>

                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-ketua" name="ketua_proker" type="text" required placeholder="Ketua Proker" autocomplete="off" value="{{ old('ketua_proker') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-bendahara">Bendahara Proker</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-bendahara" name="bendahara_proker" type="text" required placeholder="Bendahara Proker" autocomplete="off" value="{{ old('bendahara_proker') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-jenis-bptn">Dana RKAT (Rp)</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control no-arrow" type="number" name="dana_rkat" id="proker-jenis-rkat" placeholder="Dana RKAT (Rp)" min="0" value="0" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6 d-flex align-items-center">
                                            <label for="proker-jenis-bptn">Dana BPTN (Rp)</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control no-arrow" type="number" name="dana_bptn" id="proker-jenis-bptn" placeholder="Dana BPTN (Rp)" min="0" value="0" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-11">
                                    <div class="mb-3 row">
                                        <div class="col-6">
                                            <label for="proker-berkas">Upload Proposal</label>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" id="proker-berkas" type="file" name="rab_proposal" accept=".pdf, .doc, .docx" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-11 mt-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="proker-ket">Keterangan</label>
                                        </div>
                                        <div class="col-6">
                                            <textarea id="proker-ket" class="form-control" required name="keterangan" id="con-inhouse-keterangan" placeholder="Keterangan" rows="6" value="{{ old('keterangan') }}"></textarea>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="my-3">Tabel Budgeting</h6>
                            <div class="tab-tbl-budget">
                                <ul class="nav nav-tabs nav-primary" id="pills-warningtab" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" id="pills-rab-tab" data-bs-toggle="pill" href="#pills-rab" role="tab" aria-controls="pills-rab" aria-selected="true" data-bs-original-title="" title="">Dana RAB</a></li>
                                    @if ($pageContext != 'add')
                                    <li class="nav-item"><a class="nav-link" id="pills-rill-tab" data-bs-toggle="pill" href="#pills-rill" role="tab" aria-controls="pills-rill" aria-selected="false" data-bs-original-title="" title="">Dana Riil</a></li>
                                    @endif
                                </ul>
                                <div class="tab-content" id="pills-warningtabContent">
                                    <div class="tab-pane fade active show" id="pills-rab" role="tabpanel" aria-labelledby="pills-rab-tab">
                                        <div class="col-12">
                                            <div class="row">
                                                <h6 class="my-3">Tabel Dana RAB</h6>
                                                <h6 class="mb-3">Sisa Dana: <span class="badge badge-success">Rp 3.980.000</span></h6>
                                                <div class="table-responsive">
                                                    <table class="display tbl-rab calc-price" id="basic-1">
                                                        <thead>
                                                            <tr>
                                                                <th class="">No.</th>
                                                                <th class="">Nama</th>
                                                                <th class="">Harga Satuan</th>
                                                                <th class="">Qty</th>
                                                                <th class="">Total Harga</th>
                                                                <th class="">Tempat Beli</th>
                                                                <th class="">Status</th>
                                                                <th class="">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-number="1">1</td>
                                                                <td>
                                                                    <input class="form-control" id="" type="text" required placeholder="Nama" autocomplete="off" name="rab_nama[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="hargaSatuan" type="number" required placeholder="Harga Satuan" autocomplete="off" name="rab_hargasatuan[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required placeholder="Qty" autocomplete="off" min="0" name="rab_qty[]">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required placeholder="Otomatis Terhitung" autocomplete="off" name="rab_totalharga[]" disabled>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="" type="text" required placeholder="Tempat Pembelian" autocomplete="off" name="rab_tmptbeli[]">
                                                                </td>
                                                                <td>
                                                                    @if (
                                                                        ($pageContext === 'add' || $pageContext === 'edit') && 
                                                                        (session('u_data')->user_role == '3')
                                                                    )
                                                                        <span class="badge badge-warning">Pending</span>
                                                                    @else
                                                                    <div class="m-checkbox-inline custom-radio-ml">
                                                                        <div class="form-check form-check-inline radio radio-primary">
                                                                          <input class="form-check-input" id="radioinline1" type="radio" name="rab_status[]" value="1">
                                                                          <label class="form-check-label mb-0" for="radioinline1">
                                                                            <small>Approved</small>
                                                                          </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline radio radio-primary">
                                                                          <input class="form-check-input" id="radioinline2" type="radio" name="rab_status[]" value="2">
                                                                          <label class="form-check-label mb-0" for="radioinline2">
                                                                            <small>Rejected</small>
                                                                          </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline radio radio-primary">
                                                                          <input class="form-check-input" id="radioinline2" type="radio" name="rab_status[]" value="3" checked>
                                                                          <label class="form-check-label mb-0" for="radioinline2">
                                                                            <small>Pending</small>
                                                                          </label>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <ul class="action align-items-center">
                                                                        <li class="delete">
                                                                            <button type="button" class="btn btn-link">
                                                                            <i class="icon-trash"></i>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row g-2 justify-content-end">
                                                    <div class="col-auto">
                                                        <button class="btn btn-success" type="button" id="add-row-table" data-target-table="tbl-rab">
                                                            <i class="icon-plus"></i>
                                                            Tambahkan Baris Lagi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($pageContext != 'add')
                                    <div class="tab-pane fade" id="pills-rill" role="tabpanel" aria-labelledby="pills-rill-tab">
                                        <div class="col-12">
                                            <div class="row">
                                                <h6 class="my-3">Tabel Dana Riil</h6>
                                                <h6 class="mb-3">Sisa Dana: <span class="badge badge-success">Rp 3.980.000</span></h6>
                                                <div class="table-responsive">
                                                    <table class="display tbl-riil calc-price" id="basic-1-2">
                                                        <thead>
                                                            <tr>
                                                                <th class="">No.</th>
                                                                <th class="">Nama</th>
                                                                <th class="">Harga Satuan</th>
                                                                <th class="">Qty</th>
                                                                <th class="">Total Harga</th>
                                                                <th class="">Tempat Beli</th>
                                                                <th class="">Bukti</th>
                                                                <th class="">Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-number="1">1</td>
                                                                <td>
                                                                    <input class="form-control" id="" type="text" required="" placeholder="Nama" autocomplete="off" name="riil_nama">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="hargaSatuan" type="text" required="" placeholder="Harga Satuan" autocomplete="off" name="riil_hargasatuan">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control no-arrow" id="quantity" type="number" required="" placeholder="Qty" autocomplete="off" min="0" name="riil_qty">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="calcTotal" type="number" required="" placeholder="Otomatis Terhitung" disabled autocomplete="off">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="" type="text" required="" placeholder="Tempat Pembelian" autocomplete="off" name="riil_tmptbeli">
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" id="" type="file" required="" accept=".pdf, .doc, .docx" name="riil_bukti">
                                                                </td>
                                                                <td>
                                                                    <ul class="action align-items-center">
                                                                        <li class="delete">
                                                                            <button type="button" class="btn btn-link">
                                                                            <i class="icon-trash"></i>
                                                                            </button>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row g-2 justify-content-end">
                                                    <div class="col-auto">
                                                        <button class="btn btn-success" type="button" id="add-row-table" data-target-table="tbl-riil">
                                                            <i class="icon-plus"></i>
                                                            Tambahkan Baris Lagi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 justify-content-end">
                            <div class="col-auto">
                            @if ($pageContext == 'add' || $pageContext == 'edit')
                                <a href="">
                                        @if ($pageContext == 'add')
                                    <button class="btn btn-primary" type="button">
                                            Cancel
                                        @elseif ($pageContext == 'edit')
                                    <button class="btn btn-danger" type="button">
                                            Reject
                                        @endif
                                    </button>
                                </a>
                            @else
                                <a href="{{ route('proker.index') }}">
                                    <button class="btn btn-primary" type="button">Back</button>
                                </a>
                            @endif
                            </div>
                            <div class="col-auto">
                                @if ($pageContext == 'edit')
                                <a href="">
                                    <button class="btn btn-secondary" type="submit">Approve</button>
                                </a>
                                @endif
                                @if ($pageContext == 'add')
                                <a href="{{ route('proker.store') }}">
                                    <button class="btn btn-secondary" type="submit">Save</button>
                                </a>
                                @endif
                            </div>

                        </div>
                    </div>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script lang="javascript">
    const btnAddRowTable = document.querySelectorAll("button#add-row-table");

    btnAddRowTable.forEach(elm => {
        elm.addEventListener("click", () => {
            const targetTbl = elm.getAttribute("data-target-table");
            const tbody = document.querySelector(`table.${targetTbl} tbody`);
            const lastRow = tbody.querySelector("tr:last-child");

            if (lastRow) {
                const newRow = lastRow.cloneNode(true); // Salin elemen terakhir
                const inputs = newRow.querySelectorAll("input, select, textarea");
                
                // Reset nilai input pada baris baru
                inputs.forEach(input => {
                    if (input.type !== "radio" && input.type !== "checkbox") {
                        input.value = "";
                    }
                });

                const lastNumber = parseInt(lastRow.querySelector("td:first-child").getAttribute("data-number"));
                const newNumber = lastNumber + 1;
                newRow.querySelector("td:first-child").setAttribute("data-number", newNumber);
                newRow.querySelector("td:first-child").innerHTML = newNumber;

                tbody.appendChild(newRow);
            }
            calcPrice();
        });
    });

    function calcPrice(){
        const table = document.querySelectorAll("table.calc-price");
        table.forEach(elm => {
            const tr = elm.querySelectorAll("tbody tr");
            tr.forEach(row => {
                const hargaSatuan = row.querySelector("input#hargaSatuan");
                const quantity = row.querySelector("input#quantity");
                const calcTotal = row.querySelector("input#calcTotal");
                hargaSatuan.addEventListener("input", ()=>{
                    if((quantity.value != "") && (hargaSatuan.value != "")){
                        calcTotal.value = parseInt(hargaSatuan.value) * parseInt(quantity.value);
                    }else{
                        calcTotal.value = "";
                    }
                });
                quantity.addEventListener("input", ()=>{
                    if((quantity.value != "") && (hargaSatuan.value != "")){
                        calcTotal.value = parseInt(hargaSatuan.value) * parseInt(quantity.value);
                    }else{
                        calcTotal.value = "";
                    }
                });
            });
        });
    }
    calcPrice();

    const formProker = document.querySelector('form.form-proker');
    formProker.addEventListener("submit", e => {
        e.preventDefault();
        const disabledInputs = formProker.querySelectorAll("input[disabled]");
        disabledInputs.forEach(input => {
            input.removeAttribute("disabled");
        });
        formProker.submit();
    });
</script>
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection