<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="/images/placeholders/placeholder.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ $currentUser->fullName() }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="icon-home4"></i>
                        <span>
                            {{ __('Dashboard') }}
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu {{ request()->is('admin/products*') || request()->is('admin/option-types*') || request()->is('admin/prototypes*') || request()->is('admin/taxonomies*') ? 'nav-item-expanded nav-item-open' : null }}">
                    <a href="#" class="nav-link"><i class="icon-cube"></i> <span>{{ __('Products') }}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="{{ __('Products') }}">
                        <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link @if(request()->is('admin/products*'))active @endif">{{ __('Catalogs') }}</a></li>
                        <li class="nav-item"><a href="{{ route('option-types.index') }}" class="nav-link @if(request()->is('admin/option-types*'))active @endif">{{ __('Option Types') }}</a></li>
                        <li class="nav-item"><a href="{{ route('prototypes.index') }}" class="nav-link @if(request()->is('admin/prototypes*'))active @endif">{{ __('Prototypes') }}</a></li>
                        <li class="nav-item"><a href="{{ route('taxonomies.index') }}" class="nav-link @if(request()->is('admin/taxonomies*'))active @endif">{{ __('Taxonomies') }}</a></li>
                    </ul>
                </li>

                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">{{ __('System') }}</div> <i class="icon-menu" title="{{ __('System') }}"></i></li>
                <li class="nav-item nav-item-submenu {{ request()->is('admin/users*') ||  request()->is('admin/roles*') ? 'nav-item-expanded nav-item-open' : null }}">
                    <a href="#" class="nav-link"><i class="icon-people"></i> <span>{{ __('Users') }}</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="{{ __('Users') }}">
                        <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link @if(request()->is('admin/users*'))active @endif">{{ __('Users') }}</a></li>
                        <li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link @if(request()->is('admin/roles*'))active @endif">{{ __('Roles') }}</a></li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
