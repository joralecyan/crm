@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-briefcase mr-2"></i> <span class="font-weight-semibold">{{__('Show Position')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>
    </div>

    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Show Position')}}</h5>
            </div>

            <div class="card-body">
                <p><b>{{__('ID')}}:</b> {{$position->id}}</p>
                <p><b>{{__('Name')}}:</b> {{$position->name}}</p>
                <p><b>{{__('Description')}}:</b> {{$position->description}}</p>
                <p><b>{{__('Employees count')}}:</b> {{$position->users()->count()}}</p>
                <p><b>{{__('Created At')}}:</b> {{$position->created_at}}</p>
                <p><b>{{__('Updated At')}}:</b> {{$position->updated_at}}</p>
            </div>
        </div>
    </div>
@endsection
