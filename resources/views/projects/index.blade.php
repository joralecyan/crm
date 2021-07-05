@extends('layouts.app')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-positions mr-2"></i> <span class="font-weight-semibold">{{__('Projects')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <a href="{{route('projects.create')}}" class="btn btn-labeled btn-labeled-right bg-primary">{{__('Add new')}} <b><i class="icon-plus2"></i></b></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content pt-0">
        <div class="row">

            @foreach($projects as $project)
            <div class="col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title font-weight-semibold"><a href="{{route('projects.show', $project->id)}}" class="text-body">{{$project->name}}</a></h5>
                    </div>

                    <div class="card-body">
                        <div class="card-img embed-responsive mb-3">
                            <img src="{{$project->thumb}}" alt="{{$project->name}}">
                        </div>
                        {{$project->description}}
                    </div>

                    <div class="card-footer bg-transparent d-sm-flex justify-content-sm-between align-items-sm-center border-top-0 pt-0 pb-3">
                        <ul class="list-inline list-inline-dotted text-muted mb-3 mb-sm-0">
                            <li class="list-inline-item">{{__('By')}} <a href="{{route('users.show', $project->user_id)}}" class="text-muted">{{$project->user->name}}</a></li>
                            <li class="list-inline-item">{{$project->created_at->format('d M Y')}}</li>
                        </ul>

                        <div>
                            <a href="{{route('projects.show', $project->id)}}" class="list-icons-item text-primary-600"><i class="icon-eye"></i></a>
                            <a href="{{route('projects.edit', $project->id)}}" class="list-icons-item text-success-600"><i class="icon-pencil7"></i></a>
                            <a href="#" class="list-icons-item text-danger-600" onclick="$(this).next().submit()"><i class="icon-trash"></i></a>
                            <form action="{{route('projects.destroy', $project->id)}}" method="POST" onsubmit="return confirm('{{__('Are You Sure?')}}')">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

        </div>

    </div>
    <!-- /content area -->
@endsection
