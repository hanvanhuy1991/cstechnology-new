@extends('admin.layouts.base')

@section('title', __('Login'))

@push('js')
    <script src="{{ mix('js/login.js') }}"></script>
@endpush
@section('content')
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center pt-0">

                <!-- Login card -->
                <form class="login-form" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">{{ __('Login to your account') }}</h5>
                                <span class="d-block text-muted">{{ __('Your credentials') }}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input value="{{ old('email') }}" id="email" name="email" type="email" class="form-control @error('email') border-danger @enderror" placeholder="{{ __('Email') }}" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
                                </div>
                                @error('email')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input id="password" name="password" type="password" class="form-control @error('password') border-danger @enderror" placeholder="{{ __('Password') }}" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
                                </div>
                                @error('password')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
							</div>

                            <div class="form-group d-flex align-items-center">
                                <div class="form-check mb-0">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-input-styled" data-fouc>
                                        {{ __('Remember') }}
                                    </label>
                                </div>

                                <a href="{{ route('password.request') }}" class="ml-auto">{{ __('Forgot password ?') }}</a>
                            </div>

                            <div class="form-group">
                                <button data-loading data-loading-text="{{ __('Loading...') }}" id="button-submit" type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }} <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">{{ __('Or sign in with') }}</span>
                            </div>

                            <div class="form-group text-center">
                                <button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
                                <button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
                                <button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
                                <button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">{{ __("Don't have an account?") }}</span>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('register') }}" class="btn btn-light btn-block">{{ __('Sign up') }}</a>
                            </div>

                            <span class="form-text text-center text-muted">
                                {!! __("By continuing, you're confirming that you've read our <a href=':term'>Terms &amp; Conditions</a> and <a href=':policy'>Cookie Policy</a>", ['term' => '#', 'policy' => '#']) !!}
                            </span>
                        </div>
                    </div>
                </form>
                <!-- /login card -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
@stop
