@extends('auth.layouts.app')

@section('content')

    <!-- Login form -->
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{__('Login to your account')}}</h5>
                    <span class="d-block text-muted">{{__('Enter your credentials below')}}</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" id="email" name="email" class="form-control" placeholder="{{ __('E-Mail Address') }}">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @error('email')
                        <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                    @error('password')
                        <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">{{__('Sign in')}} <i class="icon-circle-right2 ml-2"></i></button>
                </div>
                @if (Route::has('password.request'))
                    <div class="text-center">
                        <a href="{{ route('password.request') }}">{{__('Forgot password?')}}</a>
                    </div>
                @endif
            </div>
        </div>
    </form>
    <!-- /login form -->
@endsection




