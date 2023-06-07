<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ url('/dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" alt="" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" alt="" height="24">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ url('/dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" alt="" height="32">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/img/logo-satu.svg') }}" alt="" height="24">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">

            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('dashboard')) active @endif" href="/dashboard">
                        <i class="ri-home-3-line"></i> <span>@lang('translation.dashboard')</span>
                    </a>
                </li>
                @if (auth()->user()->role === 'partner')
                    <li class="nav-item">
                        <a class="nav-link @if (request()->is('dashboard/campaign*')) active @endif" href="/dashboard/campaign">
                            <i class="bx bxs-megaphone"></i> <span>@lang('translation.campaign')</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="#sidebarMarketplace" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMarketplace">
                        <i class=" ri-store-2-line"></i><span>@lang('translation.marketplace')</span>
                    </a>
                    <div class="menu-dropdown @if (!request()->is('dashboard/marketplace*')) collapse @endif"
                        id="sidebarMarketplace">
                        <ul class="nav nav-sm flex-column">
                            @if (auth()->user()->role === 'funder')
                                <li class="nav-item">
                                    <a href="/dashboard/marketplace/obligasi"
                                        class="nav-link @if (request()->is('dashboard/marketplace/obligasi*')) active @endif">@lang('translation.obligasi')</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a href="/dashboard/marketplace/mitra"
                                    class="nav-link @if (request()->is('dashboard/marketplace/mitra*')) active @endif">@lang('translation.mitra')</a>
                            </li>

                        </ul>
                    </div>
                </li>
                @if (auth()->user()->role === 'funder')
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/portofolio">
                            <i class="ri-file-chart-line"></i> <span>@lang('translation.portofolio')</span>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link @if (request()->is('dashboard/profile*')) active @endif"
                        href="{{ url('dashboard/profile/' . auth()->user()->id) }}">
                        <i class="  ri-account-circle-line"></i> <span>@lang('translation.profile')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (request()->is('dashboard/wallet*')) active @endif" href="/dashboard/wallet">
                        <i class="ri-wallet-line"></i> <span>@lang('translation.wallet')</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">
                        <i class="ri-logout-box-line"></i> <span>@lang('translation.logout')</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
