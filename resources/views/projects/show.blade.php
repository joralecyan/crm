@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-briefcase mr-2"></i> <span class="font-weight-semibold">{{__('Show Project')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

        </div>
    </div>

    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Show Project')}}</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><b>{{__('ID')}}:</b> {{$project->id}}</p>
                        <p><b>{{__('Name')}}:</b> {{$project->name}}</p>
                        <p><b>{{__('Description')}}:</b> {{$project->description}}</p>
                        <p><b>{{__('Created At')}}:</b> {{$project->created_at}}</p>
                        <p><b>{{__('Updated At')}}:</b> {{$project->updated_at}}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="{{$project->thumb}}" alt="{{$project->name}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
