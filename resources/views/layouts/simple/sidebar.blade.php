<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('landing-page') }}" class="d-block">
                <img class="for-light logo-custom" src="{{ asset('assets/images/logo/akabeko.png') }}" alt="logo">
                <img class="for-dark logo-custom" src="{{ asset('assets/images/logo/akabeko.png') }}" alt="logo">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper">
            <a href="{{ route('landing-page') }}" class="d-block">
                <img class="logo-custom" src="{{ asset('assets/images/logo/akabeko.png') }}" alt="">
            </a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('landing-page') }}">
                            <img class="logo-custom" src="{{ asset('assets/images/logo/akabeko.png') }}" alt="logo">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="pin-title sidebar-main-title">
                        <div>
                            <h6>Pinned</h6>
                        </div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="">Dashboard</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard.index') }}">
                        <i data-feather="home"></i><span>Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                        class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard.show', 'ormawa') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                        </svg><span>Dashboard Ormawa</span></a></li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a
                        class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard.show', 'superadmin') }}">
                        <svg class="stroke-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                        </svg><span>Dashboard Superadmin</span></a></li> -->
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="">Menu</h6>
                        </div>
                    </li>
                    @if (session('u_data')->user_role == '1')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('kalender.index') }}">
                        <i data-feather="calendar"></i><span>Kalender</span>
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('proker.index') }}">
                        <i data-feather="clipboard"></i><span>Proker</span>
                        </a>
                    </li>
                    @if (session('u_data')->user_role == '1')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('ormawa.index') }}">
                        <i data-feather="users"></i><span>Ormawa</span>
                        </a>
                    </li>
                    @endif
                    @if (session('u_data')->user_role == '1' || session('u_data')->user_role == '2')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('departemen.index') }}">
                        <i data-feather="users"></i><span>Departemen</span>
                        </a>
                    </li>
                    @endif
                    @if (session('u_data')->user_role == '1')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('produk.index') }}">
                        <i data-feather="shopping-bag"></i><span>Produk</span>
                        </a>
                    </li>
                    @endif
                    @if (session('u_data')->user_role == '1')
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('supplier.index') }}">
                        <i data-feather="box"></i><span>Supplier</span>
                        </a>
                    </li>
                    @endif
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="">Pengaturan Akun</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                    @if (session('u_data')->user_role != '1')
                        <a class="sidebar-link sidebar-title link-n  av" href="{{route('profile')}}">
                        <i data-feather="users"></i><span>Profil {{session('u_data')->role_name}} Saya</span>
                        </a>
                    @endif
                    @if (session('u_data')->user_role == '1')
                        <a class="sidebar-link sidebar-title link-n  av" href="{{route('profile')}}">
                        <i data-feather="users"></i><span>Profil {{session('u_data')->role_name}} Saya</span>
                        </a>
                    @endif
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}">
                        <i data-feather="log-out"></i><span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
