<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        {{__('Navigation')}}
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="/images/image.png" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="user">
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark">{{auth()->user()->name}}</h6>
                    <span class="font-size-sm text-white text-shadow-dark">{{auth()->user()->position->name ?? ''}}</span>
                </div>

                <div class="sidebar-user-material-footer">
                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>{{__('Navigation')}}</span></a>
                </div>
            </div>

            <div class="collapse" id="user-nav">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-user-plus"></i>
                            <span>{{__('My profile')}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-comment-discussion"></i>
                            <span>{{__('Messages')}}</span>
                            <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>{{__('Account settings')}}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>
                            <span>{{__('Logout')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{__('Main')}}</div>
                    <i class="icon-menu" title="{{__('Main')}}"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link @if(request()->is('/')) active @endif">
                        <i class="icon-home4"></i>
                        <span>{{__('Dashboard')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link @if(request()->is('users*')) active @endif">
                        <i class="icon-users"></i>
                        <span>{{__('Employees')}}</span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-cog"></i> <span>{{__('Settings')}}</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="{{__('Settings')}}">
                        <li class="nav-item"><a href="#" class="nav-link">{{__('Main settings')}}</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">{{__('Permissions')}}</a></li>
                    </ul>
                </li>
                <!-- /main -->
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>
