<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
                <div class="header-left d-flex align-items-center">
                    <div class="menu-toggle-btn mr-15">
                        <button id="menu-toggle" class="main-btn ritelgo-secondary-btn btn-hover">
                            <i class="lni lni-menu me-2"></i> Menu
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
                <div class="header-right">
                    <!-- profile start -->
                    <div class="profile-box ml-15">
                        <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info">
                                <div class="info">
                                    <div class="image">
                                        <img src="{{ asset('assets/images/avatar-2.png') }}" alt="" />
                                      </div>
                                    <div>
                                        <h6 class="fw-500">{{ Auth::user()->name }}</h6>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                            <li>
                                <div class="author-info flex items-center !p-1">
                                    <div class="content">
                                        <h4 class="text-sm">{{ Auth::user()->name }}</h4>
                                        <a class="text-xs nav-link" href="#">{{ ucwords(Auth::user()->role) }}</a>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('settings.accounts.index') }}" class="nav-link">
                                    <i class="lni lni-user"></i> Profil Saya
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#0" class="nav-link"> <i class="lni lni-cog"></i> Pengaturan </a>
                            </li> --}}
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-danger nav-link"> <i class="lni lni-exit text-danger"></i> Keluar </a>
                            </li>
                        </ul>
                    </div>
                    <!-- profile end -->
                </div>
            </div>
        </div>
    </div>
</header>