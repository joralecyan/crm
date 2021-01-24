@extends('auth.layouts.app')

@section('content')

    <form class="login-form" action="{{ route('password.email') }}" method="POST">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{__('Password recovery')}}</h5>
                    <span class="d-block text-muted">{{__("We'll send you instructions in email")}}</span>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="{{__('E-Mail Address')}}">
                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>
                    @error('email')
                    <span class="form-text text-danger"><i class="icon-cancel-circle2 mr-2"></i>{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn bg-blue btn-block legitRipple"><i class="icon-spinner11 mr-2"></i> {{__('Reset password')}}</button>
            </div>
        </div>
    </form>

@endsection
