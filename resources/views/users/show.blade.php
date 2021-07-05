@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-users mr-2"></i> <span class="font-weight-semibold">{{__('Show Employee')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>
    </div>

    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Show Employee')}}</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><b>{{__('ID')}}:</b> {{$user->id}}</p>
                        <p><b>{{__('Name')}}:</b> {{$user->name}}</p>
                        <p><b>{{__('Email')}}:</b> {{$user->email}}</p>
                        <p><b>{{__('Phone')}}:</b> {{$user->phone}}</p>
                        <p><b>{{__('Position')}}:</b> {{$user->position->name ?? ''}}</p>
                        <p><b>{{__('Status')}}:</b> {{$user->status}}</p>
                        <p><b>{{__('Role')}}:</b> {{$user->role}}</p>
                        <p><b>{{__('Created At')}}:</b> {{$user->created_at}}</p>
                        <p><b>{{__('Updated At')}}:</b> {{$user->updated_at}}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{$user->thumb}}" alt="{{$user->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
