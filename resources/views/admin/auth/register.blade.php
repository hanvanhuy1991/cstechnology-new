@extends('admin.layouts.base')

@section('title', __('Create account'))

@push('js')
    <script src="{{ mix('js/register.js') }}"></script>
@endpush

@section('content')
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center pt-0">

                <!-- Login card -->
                <form class="login-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">{{ __('Create account') }}</h5>
                                <span class="d-block text-muted">{{ __('All fields are required') }}</span>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">{{ __('Your credentials') }}</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input value="{{ old('first_name') }}" id="first_name" name="first_name" type="text" class="form-control @error('first_name') border-danger @enderror" placeholder="{{ __('First name') }}" required>
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
                                </div>
                                @error('first_name')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input value="{{ old('last_name') }}" id="last_name" name="last_name" type="text" class="form-control @error('last_name') border-danger @enderror" placeholder="{{ __('Last name') }}" required>
								<div class="form-control-feedback">
									<i class="icon-user-check text-muted"></i>
                                </div>
                                @error('last_name')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input value="{{ old('email') }}" id="email" name="email" type="text" class="form-control @error('email') border-danger @enderror" placeholder="{{ __('Email') }}" required>
								<div class="form-control-feedback">
									<i class="icon-mention text-muted"></i>
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
									<i class="icon-user-lock text-muted"></i>
                                </div>
                                @error('password')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
								<input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') border-danger @enderror" placeholder="{{ __('Repeat your password') }}" required>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
                                </div>
                                @error('password_confirmation')
                                <span class="form-text text-danger">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="accept" class="form-input-styled" data-fouc>
                                        {!! __('Accept <a href=":term">terms of service</a>', ['term' => '#']) !!}
                                    </label>
                                </div>
                                @error('accept')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button data-loading data-loading-text="{{ __('Loading') }}..." id="button-submit" type="submit" class="btn bg-teal-400 btn-block">{{ __('Register') }} <i class="icon-circle-right2 ml-2"></i></button>
                            </div>

                            <div class="form-group text-center text-muted content-divider">
                                <span class="px-2">{{ __('Already have account ?') }}</span>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('login') }}" class="btn btn-light btn-block">{{ __('Sign in') }}</a>
                            </div>


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
