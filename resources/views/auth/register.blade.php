@extends('auth.layouts.app')

@section('content')

    <!-- Registration form -->
    <form class="login-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{__('Create main account')}}</h5>
                    <span class="d-block text-muted">{{__('All fields are required')}}</span>
                </div>

                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">{{__('Your credentials')}}</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="{{__('Full Name')}}">
                    <div class="form-control-feedback">
                        <i class="icon-user-check text-muted"></i>
                    </div>
                    @error('name')
                        <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="{{__('E-Mail Address')}}">
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @error('email')
                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" name="password" id="password" class="form-control" placeholder="{{__('Password')}}">
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                    @error('password')
                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{'Confirm Password'}}">
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                </div>
                <button type="submit" class="btn bg-teal-400 btn-block">{{__('Register')}} <i class="icon-circle-right2 ml-2"></i></button>
            </div>
        </div>
    </form>
    <!-- /registration form -->

@endsection




