@extends('auth.layouts.app')

@section('content')
    <form class="login-form" action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{__('Reset password')}}</h5>
                    <span class="d-block text-muted">{{__("Your new password")}}</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $email ?? old('email') }}" placeholder="{{__('E-Mail Address')}}">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                    @error('email')
                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input type="password" class="form-control" name="password" id="password" placeholder="{{__('Password')}}">
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                    @error('password')
                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{__('Confirm Password')}}">
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                </div>

                <button type="submit" class="btn bg-blue btn-block legitRipple"><i class="icon-spinner11 mr-2"></i> {{__('Reset password')}}</button>
            </div>
        </div>
    </form>
@endsection
