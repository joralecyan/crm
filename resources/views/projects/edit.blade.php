@extends('layouts.app')
@section('content')
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-briefcase mr-2"></i> <span class="font-weight-semibold">{{__('Edit Project')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>

    <div class="content pt-0">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Edit Project')}}</h5>
            </div>

            <div class="card-body">
                {!! Form::model($project, [
                             'method' => 'PATCH',
                             'files' => true,
                             'route' => [ 'projects.update', $project->id]
                          ]) !!}
                @include('projects._form')
                <div class="text-right">
                    <button type="submit" class="btn btn-primary legitRipple">{{__('Update')}}<i class="icon-floppy-disk ml-2"></i></button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
