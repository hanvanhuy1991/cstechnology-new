@extends('admin.layouts.base')

@section('navbar')
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="{{ route('dashboard') }}" class="d-inline-block">
                <img src="/images/logo_light.png" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-component-toggle" type="button">
                <i class="icon-unfold"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-secondary-toggle d-none d-md-block">
                        <i class="icon-transmission"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-git-compare"></i>
                        <span class="d-md-none ml-2">Git updates</span>
                        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">9</span>
                    </a>

                    <div class="dropdown-menu dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Git updates</span>
                            <a href="#" class="text-default"><i class="icon-sync"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-blue-300 text-blue-300 rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
                                    </div>

                                    <div class="media-body">
                                        Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                        <div class="text-muted font-size-sm">4 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-orange-300 text-orange-300 rounded-round border-2 btn-icon"><i class="icon-git-commit"></i></a>
                                    </div>

                                    <div class="media-body">
                                        Add full font overrides for popovers and tooltips
                                        <div class="text-muted font-size-sm">36 minutes ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-green text-green rounded-round border-2 btn-icon"><i class="icon-git-branch"></i></a>
                                    </div>

                                    <div class="media-body">
                                        <a href="#">Chris Arney</a> created a new <span class="font-weight-semibold">Design</span> branch
                                        <div class="text-muted font-size-sm">2 hours ago</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-pink-300 text-pink-300 rounded-round border-2 btn-icon"><i class="icon-git-merge"></i></a>
                                    </div>

                                    <div class="media-body">
                                        <a href="#">Eugene Kopyov</a> merged <span class="font-weight-semibold">Master</span> and <span class="font-weight-semibold">Dev</span> branches
                                        <div class="text-muted font-size-sm">Dec 18, 18:36</div>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <a href="#" class="btn bg-transparent border-blue-300 text-blue-300 rounded-round border-2 btn-icon"><i class="icon-git-pull-request"></i></a>
                                    </div>

                                    <div class="media-body">
                                        Have Carousel ignore keyboard events
                                        <div class="text-muted font-size-sm">Dec 12, 05:46</div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer">
                            <a href="#" class="text-white mr-auto">All updates</a>
                            <div>
                                <a href="#" class="text-white" data-popup="tooltip" title="Mark all as read"><i class="icon-radio-unchecked"></i></a>
                                <a href="#" class="text-white ml-2" data-popup="tooltip" title="Bug tracker"><i class="icon-bug2"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <span class="badge bg-success my-3 my-md-0 ml-md-3 mr-md-auto">Online</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-people"></i>
                        <span class="d-md-none ml-2">Users</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-300">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Users online</span>
                            <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title text-white font-weight-semibold">Jordana Ansley</a>
                                        <span class="d-block text-muted font-size-sm">Lead web developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title text-white font-weight-semibold">Will Brason</a>
                                        <span class="d-block text-muted font-size-sm">Marketing admin</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-danger"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title text-white font-weight-semibold">Hanna Walden</a>
                                        <span class="d-block text-muted font-size-sm">Project admin</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title text-white font-weight-semibold">Dori Laperriere</a>
                                        <span class="d-block text-muted font-size-sm">Business developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-warning-300"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title text-white font-weight-semibold">Vanessa Aurelius</a>
                                        <span class="d-block text-muted font-size-sm">UX expert</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span class="badge badge-mark border-grey-400"></span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer">
                            <a href="#" class="text-white mr-auto">All users</a>
                            <a href="#" class="text-white"><i class="icon-gear"></i></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="d-md-none ml-2">Messages</span>
                        <span class="badge badge-pill bg-warning-400 ml-auto ml-md-0">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Messages</span>
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold text-white">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold text-white">Margo Baker</span>
                                                <span class="text-muted float-right font-size-sm">12:16</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">That was something he was unable to do because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold text-white">Jeremy Victorino</span>
                                                <span class="text-muted float-right font-size-sm">22:48</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold text-white">Beatrix Diaz</span>
                                                <span class="text-muted float-right font-size-sm">Tue</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="/images/placeholders/placeholder.jpg" width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold text-white">Richard Vango</span>
                                                <span class="text-muted float-right font-size-sm">Mon</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer justify-content-center p-0">
                            <a href="#" class="text-muted w-100 py-2" data-popup="tooltip" title="Load more"><i class="icon-menu7 d-block top-0"></i></a>
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                        <img src="/images/placeholders/placeholder.jpg" class="rounded-circle mr-2" height="34" alt="">
                        <span>{{ $currentUser->fullName() }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="#" class="dropdown-item" onclick="$('#logout-form').submit();"><i class="icon-switch2" ></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content">
        <!-- Main sidebar -->
        <x-admin-sidebar />
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            @yield('page-header')
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
                @include('admin.layouts.partials.alert')
                @yield('page-content')
                <div id="notification-toast"></div>
            </div>
            <!-- /content area -->


            <!-- Footer -->
            @include('admin.layouts.partials.footer')
            <!-- /footer -->

        </div>
        <!-- /main content -->

        <!-- modal -->
        <div id="modal-ajax" class="modal fade in" tabindex="-1" role="dialog"
             aria-labelledby="gridSystemModalLabel">
        </div>

        <div id="modal-confirm" class="modal fade in" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Confirmation') }}</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <p>{{ __('Are you sure want to delete') }}</p>

                    </div>

                    <div class="modal-footer">
                        <form method="POST" id="confirmation-form">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                <i class="icon-close2 mr-2"></i>
                                {{ __('No') }}
                            </button>
                            <button type="submit" class="btn bg-danger" data-loading>
                                <i class="icon-check2 mr-2"></i>{{ __('Yes') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
