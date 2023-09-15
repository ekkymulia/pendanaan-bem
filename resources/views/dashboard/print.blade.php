@extends('layouts.simple.master')

@section('title', 'Default')

@section('css')
    
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
<style>
	.sidebar-wrapper, .header-wrapper{
        display: none;
    }
    .page-body{
        margin:0 !important;
    }
    .page-body.container-fluid{
        display: none !important;
    }
    /* .page-title{
        display: none !important;
    } */
    .footer{
        display: none;
    }
    table#info-dana {
      width: auto;
      table-layout: auto;
    }
    * {
        font-size: 0.9rem;
    }
</style>
@endsection

@section('breadcrumb-title')
    <h3>Dashboard {{ $user->role_name }}</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">
    Print Settings:  Print:  <button id="printToggle" class="btn btn-primary btn-sm">Print</button>
</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row widget-grid">
	  <div class="col-xxl-4 col-sm-6 col-md-12 box-col-6">
	  <div class="greeting-user">
		<h4 class="f-w-600">Selamat Datang, <br>{{ $user->user_name }}</h4>
		<p>
		@if ($dari_ormawa)
		Ormawa {{$dari_ormawa}} <br>
		@endif	
		Berikut Ringkasan @if ($role == '3') Proker @else Akun @endif Anda Hari Ini</p>
		@if ($role != '1')
		<div class="whatsnew-btn"><a class="btn btn-outline-white" href="{{route('dashboard.print')}}">Print Ringkasan</a></div>
		@endif
	</div>
	  </div>
	  <div class="col-xxl-auto col-xl-4 col-md-4 col-sm-6 box-col-6"> 
		<div class="row"> 
		  <div class="col-xl-12"> 
			<div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <svg class="svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#cart') }}"> </use>
					  </svg>
					  <svg class="half-circle svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
					  </svg>
					</div>
				  </div>
				  <div> 
					@if ($role == '3')
					<h4>{{ $widget_val->w1 }}</h4><span class="f-light">Jumlah Proker RKAT</span>
					@endif
					@if ($role == '2')
					<h4>{{ $widget_val->w1 }}</h4><span class="f-light">Jumlah Departemen</span>
					@endif
					@if ($role == '1')
					<h4>{{ $widget_val->w1 }}</h4><span class="f-light">Total Ormawa</span>
					@endif
				  </div>
				</div>
				<!-- <div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+50%</span></div> -->
			  </div>
			</div>
			@if ($role != 'superadmin')
			<div class="col-xl-12"> 
			  <div class="card widget-1">
				<div class="card-body"> 
				  <div class="widget-content">
					<div class="widget-round primary">
					  <div class="bg-round">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#tag') }}"> </use>
						</svg>
						<svg class="half-circle svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
						</svg>
					  </div>
					</div>
					<div> 
					@if ($role == '3')
					<h4>{{ $widget_val->w2 }}</h4><span class="f-light">Jumlah Proker BPTN</span>
					@endif
					@if ($role == '2')
					<h4>{{ $widget_val->w2 }}</h4><span class="f-light">Jumlah Proker</span>
					@endif
					@if ($role == '1')
					<h4>{{ $widget_val->w2 }}</h4><span class="f-light">Total Proker RKAT</span>
					@endif
					</div>
				  </div>
				  <!-- <div class="font-primary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div> -->
				</div>
			  </div>
			</div>
			@endif
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-auto col-xl-4 col-md-4 col-sm-6 box-col-6"> 
		<div class="row"> 
		  <div class="col-xl-12"> 
			<div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round warning">
					<div class="bg-round">
					  <svg class="svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#return-box') }}"> </use>
					  </svg>
					  <svg class="half-circle svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
					  </svg>
					</div>
				  </div>
				  <div> 
				 	 @if ($role == '3')
					<h4>{{ $widget_val->w3 }}</h4><span class="f-light">Proker Disetujui</span>
					@endif
					@if ($role == '2')
					<h4>{{ $widget_val->w3 }}</h4><span class="f-light">Proker Menunggu Approval</span>
					@endif
					@if ($role == '1')
					<h4>{{ $widget_val->w3 }}</h4><span class="f-light">Total Proker BPTN</span>
					@endif
				  </div>
				</div>
				<!-- <div class="font-warning f-w-500"><i class="icon-arrow-down icon-rotate me-1"></i><span>-20%</span></div> -->
			  </div>
			</div>
			@if ($role != 'superadmin')
			<div class="col-xl-12"> 
			  <div class="card widget-1">
				<div class="card-body"> 
				  <div class="widget-content">
					<div class="widget-round success">
					  <div class="bg-round">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#rate') }}"> </use>
						</svg>
						<svg class="half-circle svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
						</svg>
					  </div>
					</div>
					<div> 
					@if ($role == '3')
					<h4>Rp {{ $widget_val->w4 }}</h4><span class="f-light">Total Dana Diterima</span>
					@endif
					@if ($role == '2')
					<h4>Rp {{ $widget_val->w4 }}</h4><span class="f-light">Total Dana Diberikan</span>
					@endif
					@if ($role == '1')
					<h4>Rp {{ $widget_val->w4 }}</h4><span class="f-light">Total Dana BPTN</span>
					@endif
					</div>
				  </div>
				  <!-- <div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div> -->
				</div>
			  </div>
			</div>
			@endif
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-auto col-xl-4 col-md-4 col-sm-6 box-col-6"> 
		<div class="row"> 
		  <div class="col-xl-12"> 
			<div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round warning">
					<div class="bg-round">
					  <svg class="svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#return-box') }}"> </use>
					  </svg>
					  <svg class="half-circle svg-fill">
						<use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
					  </svg>
					</div>
				  </div>
				  <div> 
				 	 @if ($role == '3')
					<h4>Rp {{ $widget_val->w5 }}</h4><span class="f-light">Total Dana Menunggu</span>
					@endif
					@if ($role == '2')
					<h4>{{ $widget_val->w5 }}</h4><span class="f-light">Proker Di Tolak</span>
					@endif
					@if ($role == '1')
					<h4>Rp {{ $widget_val->w5 }}</h4><span class="f-light">Total Dana RKAT</span>
					@endif
				  </div>
				</div>
				<!-- <div class="font-warning f-w-500"><i class="icon-arrow-down icon-rotate me-1"></i><span>-20%</span></div> -->
			  </div>
			</div>
			@if ($role != 'superadmin')
			<div class="col-xl-12"> 
			  <div class="card widget-1">
				<div class="card-body"> 
				  <div class="widget-content">
					<div class="widget-round success">
					  <div class="bg-round">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#rate') }}"> </use>
						</svg>
						<svg class="half-circle svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#halfcircle') }}"></use>
						</svg>
					  </div>
					</div>
					<div> 
					@if ($role == '3')
					<h4>{{ $widget_val->w6 }}</h4><span class="f-light">Proposal Menunggu Approval</span>
					@endif
					@if ($role == '2')
					<h4>{{ $widget_val->w6 }}</h4><span class="f-light">Proker Disetujui</span>
					@endif
					@if ($role == '1')
					<h4>Rp {{ $widget_val->w6 }}</h4><span class="f-light">Total Dana Diberikan</span>
					@endif
					</div>
				  </div>
				  <!-- <div class="font-success f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+70%</span></div> -->
				</div>
			  </div>
			</div>
			@endif
		  </div>
		</div>
	  </div>
	  @if ($role != 'superadmin')
	  <div class="col-xxl-8 col-lg-12 box-col-12">
		<div class="card">
		  <div class="card-header card-no-border"> 
			<h5>@if ($role == '1' || $role == '3') Pemakaian Dana - {{ $chartDatas->currentYear }} @endif @if ($role == '2') Pengelolaan Proker - {{ $chartDatas->currentYear }} @endif </h5>
		  </div>
		  <div class="card-body pt-0">
			<div class="row m-0 overall-card">
			  <div class="col-xl-9 col-md-12 col-sm-7 p-0">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
				<div class="chart-right">
				  <div class="row">
					<div class="col-xl-12">
					  <div class="card-body p-0">
						<!-- <ul class="balance-data"> 
						  <li><span class="circle bg-warning"> </span><span class="f-light ms-1" id="data-name-1-label"></span></li>
						  <li><span class="circle bg-primary"> </span><span class="f-light ms-1" id="data-name-2-label"></span></li>
						</ul> -->
						<div class="current-sale-container">
						<div id="chart-currently"
							data-name-1="{{ $chartDatas->chartName1 }}"
							data-name-2="{{ $chartDatas->chartName2 }}"
							data-chart-data='@json($chartDatas->chartDataVal)'
							data-chart-data-2='@json($chartDatas->chartDataVal2)'
							data-categories='@json($chartDatas->chartCategories)'
							data-chart-color="#7064F5">
						</div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="col-xl-3 col-md-12 col-sm-5 p-0">
				<div class="row g-sm-4 g-2">
				  <div class="col-xl-12 col-md-4">
					<div class="light-card balance-card widget-hover">
					  <div class="svg-box">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#income') }}"></use>
						</svg>
					  </div>
						@if ($role == '3')
						<div> <span class="f-light">Total Proker</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc1 }}</h6>
						</div>
						@endif
						@if ($role == '2')
						<div> <span class="f-light">Total Departemen</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc1 }}</h6>
						</div>
						@endif
						@if ($role == '1')
						<div> <span class="f-light">Total Dana Yang Belum dipakai</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc1 }}</h6>
						</div>
						@endif
					  
					  <!-- <div class="ms-auto text-end">
						<div class="dropdown icon-dropdown">
						  <button class="btn dropdown-toggle" id="incomedropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
						  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="incomedropdown"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday </a></div>
						</div><span class="font-success">+$456</span>
					  </div> -->
					</div>
				  </div>
				  <div class="col-xl-12 col-md-4">
					<div class="light-card balance-card widget-hover">
					  <div class="svg-box">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#expense') }}"></use>
						</svg>
					  </div>
					  	@if ($role == '3')
						<div> <span class="f-light">Total Dana Diminta</span>
							<h6 class="mt-1 mb-0">Rp {{ $chartDatas->wc2 }}</h6>
						</div>
						@endif
						@if ($role == '2')
						<div> <span class="f-light">Proker Terlaksana</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc2 }}</h6>
						</div>
						@endif
						@if ($role == '1')
						<div> <span class="f-light">Total Dana Riil</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc2 }}</h6>
						</div>
						@endif
					</div>
				  </div>
				  <div class="col-xl-12 col-md-4">
					<div class="light-card balance-card widget-hover">
					  <div class="svg-box">
						<svg class="svg-fill">
						  <use href="{{ asset('assets/svg/icon-sprite.svg#doller-return') }}"></use>
						</svg>
					  </div>
					  	@if ($role == '3')
						<div> <span class="f-light">Total Dana Sudah Diterima</span>
							<h6 class="mt-1 mb-0">Rp {{ $chartDatas->wc3 }}</h6>
						</div>
						@endif
						@if ($role == '2')
						<div> <span class="f-light">Proker Mendatang</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc3 }}</h6>
						</div>
						@endif
						@if ($role == '1')
						<div> <span class="f-light">Total Dana RAB</span>
							<h6 class="mt-1 mb-0">{{ $chartDatas->wc3 }}</h6>
						</div>
						@endif
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-4 col-xl-7 col-md-6 col-sm-5 box-col-6">
		<div class="card height-equal"> 
		  <div class="card-header card-no-border"> 
			<div class="header-top">
			  <h5>Pengajuan Proker</h5>
			  <!-- <div class="card-header-right-icon">
				<div class="dropdown icon-dropdown">
				  <button class="btn dropdown-toggle" id="recentdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
				  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
				</div>
			  </div> -->
			</div>
		  </div>
		  <div class="card-body pt-0">
			<div class="row recent-wrapper">
			  <div class="col-xl-6">
				<div class="recent-chart"> 
				  <div id="recentchart" data-series="{{$chartDatas->cd2}}"></div>
				</div>
			  </div>
			  <div class="col-xl-6"> 
				<!-- <ul class="order-content">
				  <li> <span class="recent-circle bg-primary"> </span>
					<div> <span class="f-light f-w-500">Proker yang di Approve </span>
					  <h4 class="mt-1 mb-0">10</h4>
					</div>
				  </li>
				  <li> <span class="recent-circle bg-info"></span>
					<div> <span class="f-light f-w-500">Proker yang di Ajukan</span>
					  <h4 class="mt-1 mb-0">90</h4>
					</div>
				  </li>
				</ul> -->
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <!-- <div class="col-xxl-4 col-xl-5 col-md-6 col-sm-7 notification box-col-6">
		<div class="card height-equal"> 
		  <div class="card-header card-no-border">
			<div class="header-top">
			  <h5 class="m-0">Activity</h5>
			  <div class="card-header-right-icon">
				<div class="dropdown">
				  <button class="btn dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
				  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday  </a></div>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card-body pt-0">
			<ul> 
			  <li class="d-flex">
				<div class="activity-dot-primary"></div>
				<div class="w-100 ms-3">
				  <p class="d-flex justify-content-between mb-2"><span class="date-content light-background">8th March, 2022 </span><span>1 day ago</span></p>
				  <h6>Updated Product<span class="dot-notification"></span></h6>
				  <p class="f-light">Quisque a consequat ante sit amet magna...</p>
				</div>
			  </li>
			  <li class="d-flex">
				<div class="activity-dot-warning"></div>
				<div class="w-100 ms-3">
				  <p class="d-flex justify-content-between mb-2"><span class="date-content light-background">15th Oct, 2022 </span><span>Today</span></p>
				  <h6>Tello just like your product<span class="dot-notification"></span></h6>
				  <p>Quisque a consequat ante sit amet magna... </p>
				</div>
			  </li>
			  <li class="d-flex">
				<div class="activity-dot-secondary"></div>
				<div class="w-100 ms-3">
				  <p class="d-flex justify-content-between mb-2"><span class="date-content light-background">20th Sep, 2022 </span><span>12:00 PM</span></p>
				  <h6>Tello just like your product<span class="dot-notification"></span></h6>
				  <p>Quisque a consequat ante sit amet magna... </p>
				</div>
			  </li>
			</ul>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-4 col-md-6 appointment-sec box-col-6">
		<div class="appointment">
		  <div class="card">
			<div class="card-header card-no-border">
			  <div class="header-top">
				<h5 class="m-0">Recent Sales</h5>
				<div class="card-header-right-icon">
				  <div class="dropdown">
					<button class="btn dropdown-toggle" id="recentButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="recentButton"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="card-body pt-0">
			  <div class="appointment-table table-responsive">
				<table class="table table-bordernone">
				  <tbody>
					<tr>
					  <td><img class="img-fluid img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/1.jpg') }}" alt="user"></td>
					  <td class="img-content-box"><a class="d-block f-w-500" href="{{ route('user-profile')}}">Jane Cooper</a><span class="f-light">10 minutes ago</span></td>
					  <td class="text-end">
						<p class="m-0 font-success">$200.00</p>
					  </td>
					</tr>
					<tr>
					  <td><img class="img-fluid img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/2.jpg') }}" alt="user"></td>
					  <td class="img-content-box"><a class="d-block f-w-500" href="{{ route('user-profile')}}">Brooklyn Simmons</a><span class="f-light">19 minutes ago</span></td>
					  <td class="text-end">
						<p class="m-0 font-success">$970.00</p>
					  </td>
					</tr>
					<tr>
					  <td><img class="img-fluid img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/3.jpg') }}" alt="user"></td>
					  <td class="img-content-box"><a class="d-block f-w-500" href="{{ route('user-profile')}}">Leslie Alexander</a><span class="f-light">2 hours ago</span></td>
					  <td class="text-end">
						<p class="m-0 font-success">$300.00</p>
					  </td>
					</tr>
					<tr>
					  <td><img class="img-fluid img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/4.jpg') }}" alt="user"></td>
					  <td class="img-content-box"><a class="d-block f-w-500" href="{{ route('user-profile')}}">Travis Wright</a><span class="f-light">8 hours ago</span></td>
					  <td class="text-end">
						<p class="m-0 font-success">$450.00</p>
					  </td>
					</tr>
					<tr>
					  <td><img class="img-fluid img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/5.jpg') }}" alt="user"></td>
					  <td class="img-content-box"><a class="d-block f-w-500" href="{{ route('user-profile')}}">Mark Green</a><span class="f-light">1 day ago</span></td>
					  <td class="text-end">
						<p class="m-0 font-success">$768.00</p>
					  </td>
					</tr>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-4 col-md-6 box-col-6">
		<div class="card">
		  <div class="card-header card-no-border">
			<div class="header-top">
			  <h5 class="m-0">Timeline</h5>
			  <div class="card-header-right-icon">
				<div class="dropdown">
				  <button class="btn dropdown-toggle" id="dropdownschedules" type="button" data-bs-toggle="dropdown" aria-expanded="false">Today</button>
				  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownschedules"><a class="dropdown-item" href="#">Today</a><a class="dropdown-item" href="#">Tomorrow</a><a class="dropdown-item" href="#">Yesterday</a></div>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card-body pt-0">
			<div class="schedule-container"> 
			  <div id="schedulechart"></div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-3 col-md-6 box-col-6 col-ed-none wow zoomIn">
		<div class="card purchase-card"><img class="img-fluid" src="{{ asset('assets/images/dashboard/purchase.png') }}" alt="vector mens with leptop">
		  <div class="card-body pt-3"> 
			<h6 class="mb-3">Buy <a href="#">Pro Account </a>to Explore Primium Features</h6><a class="purchase-btn btn btn-primary btn-hover-effect f-w-500" href="https://1.envato.market/3GVzd" target="_blank">Purchase Now</a>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-4 col-md-6 box-col-6 col-ed-6"> 
		<div class="row"> 
		  <div class="col-xl-12"> 
			<div class="card">
			  <div class="card-header card-no-border">
				<div class="header-top">
				  <h5>Total Users</h5>
				  <div class="dropdown icon-dropdown">
					<button class="btn dropdown-toggle" id="userdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
				  </div>
				</div>
			  </div>
			  <div class="card-body pt-0">
				<ul class="user-list">
				  <li> 
					<div class="user-icon primary">
					  <div class="user-box"><i class="font-primary" data-feather="user-plus"></i></div>
					</div>
					<div> 
					  <h5 class="mb-1">178,098</h5><span class="font-primary d-flex align-items-center"><i class="icon-arrow-up icon-rotate me-1"> </i><span class="f-w-500">+30.89</span></span>
					</div>
				  </li>
				  <li> 
					<div class="user-icon success">
					  <div class="user-box"><i class="font-success" data-feather="user-minus"></i></div>
					</div>
					<div> 
					  <h5 class="mb-1">178,098</h5><span class="font-danger d-flex align-items-center"><i class="icon-arrow-down icon-rotate me-1"></i><span class="f-w-500">-08.89</span></span>
					</div>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		  <div class="col-xl-12"> 
			<div class="card growth-wrap">
			  <div class="card-header card-no-border">
				<div class="header-top">
				  <h5>Followers Growth</h5>
				  <div class="dropdown icon-dropdown">
					<button class="btn dropdown-toggle" id="growthdropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="icon-more-alt"></i></button>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthdropdown"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly</a></div>
				  </div>
				</div>
			  </div>
			  <div class="card-body pt-0">
				<div class="growth-wrapper">
				  <div id="growthchart"></div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="col-xxl-5 col-lg-8 col-md-11 box-col-8 col-ed-6"> 
		<div class="card papernote-wrap">
		  <div class="card-header card-no-border">
			<div class="header-top"> 
			  <h5>PaperNote</h5><a class="f-light d-flex align-items-center" href="#">View project <i class="f-w-700 icon-arrow-top-right"></i></a>
			</div>
		  </div>
		  <div class="card-body pt-0"> <img class="banner-img img-fluid" src="{{ asset('assets/images/dashboard/papernote.jpg') }}" alt="multicolor background">
			<div class="note-content mt-sm-4 mt-2">
			  <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
			  <div class="note-labels">
				<ul>
				  <li> <span class="badge badge-light-primary">SAAS</span></li>
				  <li> <span class="badge badge-light-success">E-Commerce</span></li>
				  <li> <span class="badge badge-light-warning">Crypto</span></li>
				  <li> <span class="badge badge-light-info">Project</span></li>
				  <li> <span class="badge badge-light-secondary">NFT</span></li>
				  <li> <span class="badge badge-light-light">+9</span></li>
				</ul>
				<div class="last-label"> <span class="badge badge-light-success">Inprogress</span></div>
			  </div>
			  <div class="mt-sm-4 mt-2 user-details">
				<div class="customers">
				  <ul> 
					<li class="d-inline-block"><img class="img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/1.jpg') }}" alt="user"></li>
					<li class="d-inline-block"><img class="img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/6.jpg') }}" alt="user"></li>
					<li class="d-inline-block"><img class="img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/7.jpg') }}" alt="user"></li>
					<li class="d-inline-block"><img class="img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/3.jpg') }}" alt="user"></li>
					<li class="d-inline-block"><img class="img-40 rounded-circle" src="{{ asset('assets/images/dashboard/user/8.jpg') }}" alt="user"></li>
					<li class="d-inline-block">
					  <div class="light-card"><span class="f-w-500">+5</span></div>
					</li>
				  </ul>
				</div>
				<div class="d-flex align-items-center"> 
				  <h5 class="mb-0 font-primary f-18 me-1">$239,098</h5><span class="f-light f-w-500">(Budget)</span>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div> -->
	  @endif
	</div>
  </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
<script src="{{ asset('assets/js/clock.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script lang="javascript">

	const printToggle = document.getElementById('printToggle');
        const pageTitleElement = document.querySelector('.page-title');

        function togglePageTitleVisibility() {
            pageTitleElement.style.display = pageTitleElement.style.display === 'none' ? 'block' : 'none';
        }
        printToggle.addEventListener('click', () => {
            togglePageTitleVisibility();

            window.print();

            window.onafterprint = () => {
                togglePageTitleVisibility();
		};
	});

	document.addEventListener("DOMContentLoaded", function () {
  // currently sale
  var chartName2 = document.getElementById('chart-currently').getAttribute("data-name-1");
  var chartName1 = document.getElementById('chart-currently').getAttribute("data-name-2");
  var chartData2 = JSON.parse(document.getElementById('chart-currently').getAttribute("data-chart-data"));
  var chartData = JSON.parse(document.getElementById('chart-currently').getAttribute("data-chart-data-2"));
  var chartCategories = JSON.parse(document.getElementById('chart-currently').getAttribute('data-categories'));
  console.log(chartData);
  var options = {
      series: [
        {
          name: chartName1,
          data: chartData
        },
        {
          name: chartName2,
          data: chartData2
        }
      ],
      chart:{
        type:'bar',
        height:300,
		stacked: false,
  		stackType: "100%",
        toolbar:{
          show:false,
        },
        dropShadow: {
          enabled: true,
          top: 8,
          left: 0,
          blur: 10,
          color: '#7064F5',
          opacity: 0.1
        }
      }, 
      plotOptions: {
        bar:{       
          horizontal: false,
          columnWidth: '25px',
          borderRadius: 0,
        },
      }, 
      grid: {
        show:true,   
        borderColor: 'var(--chart-border)',               
      },
      dataLabels:{
        enabled: false,
      },
      stroke: {
        width: 2,
        dashArray: 0,
        lineCap: 'butt',
        colors: "#fff",     
      },
      fill: {
        opacity: 1
      },
      legend: {
        show:true
      },    
      states: {          
        hover: {
          filter: {
            type: 'darken',
            value: 1,
          }
        }           
      },
      colors:[CubaAdminConfig.primary,'#AAAFCB'],
      yaxis: {
        tickAmount: 3,   
        labels: {
          show: true,
          style: {
            fontFamily: 'Rubik, sans-serif',
          },
        },  
        axisBorder:{
        show:false,
      },
        axisTicks:{
          show: false,
        },
      },
      xaxis:{     
        categories: chartCategories,
        labels: {
          style: {
            fontFamily: 'Rubik, sans-serif',
          },
        },
        axisBorder:{
        show:true,
      },
      axisTicks:{
          show: false,
        },
      },
      states: {          
        hover: {
          filter: {
            type: 'darken',
            value: 1,
          }
        }           
      },    
      responsive: [
          {
            breakpoint: 1661,
            options:{
              chart: {
                  height: 290,
              }
            }
          },
          {
            breakpoint: 767,
            options:{
              plotOptions: {
                bar:{       
                  columnWidth: '35px',
                },
              }, 
              yaxis: {
                    labels: {
                      show: false,
                    }
                  }
            }
          },
          {
            breakpoint: 481,
            options:{
              chart: {
                  height: 200,
              }
            }
          },
          {
            breakpoint: 420,
            options:{
              chart: {
                  height: 170,
              },
              plotOptions: {
                bar:{       
                  columnWidth: '40px',
                },
              }, 
            }
          },
        ]    
    };

  var chart = new ApexCharts(document.querySelector("#chart-currently"), options);
  chart.render();

  document.querySelector("#data-name-1-label").textContent = chartName1;
  document.querySelector("#data-name-2-label").textContent = chartName2;
});
</script>
<script lang="javascript">
	document.addEventListener("DOMContentLoaded", function () {

		var seriesValue = document.getElementById('recentchart').getAttribute("data-series");
		// recent chart
		var recentoptions = {
			series: [parseInt(seriesValue)],
			chart: {
			height: 290,
			type: 'radialBar',
			toolbar: {
			show: false
			}
		},
		plotOptions: {
			radialBar: {
				hollow: {
				margin: 0,
				size: '60%',
				background: 'var(--recent-chart-bg)',
				image: undefined,
				imageOffsetX: 0,
				imageOffsetY: 0,
				position: 'front',
				dropShadow: {
				enabled: true,
				top: 3,
				left: 0,
				blur: 4,
				opacity: 0.05
				}
			},
			track: {
				background: '#F4F4F4',
				strokeWidth: '67%',
				margin: 0,
				dropShadow: {
				enabled: true,
				top: 0,
				left: 0,
				blur: 10,
				color: '#ddd',
				opacity: 1
				}
			},
		
			dataLabels: {
				show: true,
				name: {
				offsetY: 30,
				show: true,
				color: '#888',
				fontSize: '17px',
				fontWeight: '500',
				fontFamily: 'Rubik, sans-serif',
				},
				value: {
				formatter: function(val) {
					return parseInt(val);
				},
				offsetY: -8,
				color: '#111',
				fontSize: '36px',
				show: true,
				}
			}
			}
		},
		fill: {
			type: 'gradient',
			gradient: {
			shade: 'dark',
			type: 'horizontal',
			shadeIntensity: 0.5,
			opacityFrom: 1,
			opacityTo: 1,
			colorStops: [
				{
				offset: 0,
				color: "#7366FF",
				opacity: 1
				},
				{
				offset: 20,
				color: "#3EA4F1",
				opacity: 1
				},
				{
				offset: 100,
				color: "#FFFFFF",
				opacity: 1
				},
			]
			}
		},
		stroke: {
			lineCap: 'round'
		},
		labels: ['Persen disetujui'],
		responsive: [
				{
				breakpoint: 1840,
				options:{
					chart: {
						height: 260,
					}
				}
				},
				{
				breakpoint: 1700,
				options:{
					chart: {
						height: 250,
					}
				}
				},
				{
				breakpoint: 1660,
				options:{
					chart: {
						height: 230,
						dataLabels: {
						name: {
							fontSize: '15px',
						}
						}
					},
				},
				},
				{
				breakpoint: 1561,
				options:{
					chart: {
						height: 275,
					},
				},
				},
				{
				breakpoint: 1400,
				options:{
					chart: {
						height: 360,
					},
				},
				},
				{
				breakpoint: 1361,
				options:{
					chart: {
						height: 300,
					},
				},
				},
				{
				breakpoint: 1200,
				options:{
					chart: {
						height: 230,
					},
				},
				},
				{
				breakpoint: 1007,
				options:{
					chart: {
						height: 240,
					},
				},
				},
				{
				breakpoint: 600,
				options:{
					chart: {
						height: 230,
					},
				},
				},
			]  
		};

		var recentchart = new ApexCharts(document.querySelector("#recentchart"), recentoptions);
		recentchart.render();
	});
</script>
<script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('assets/js/notify/index.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('assets/js/height-equal.js') }}"></script>
<script src="{{ asset('assets/js/animation/wow/wow.min.js') }}"></script>
@endsection
