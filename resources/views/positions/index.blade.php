@extends('layouts.app')
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-positions mr-2"></i> <span class="font-weight-semibold">{{__('Positions')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                <a href="{{route('positions.create')}}" class="btn btn-labeled btn-labeled-right bg-primary">{{__('Add new')}} <b><i class="icon-plus2"></i></b></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content pt-0">

        <!-- Basic card -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Positions')}}</h5>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__('#')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Description')}}</th>
                            <th>{{__('Employees count')}}</th>
                            <th>{{__('Created at')}}</th>
                            <th>{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($positions as $position)
                            <tr>
                                <td>{{$position->id}}</td>
                                <td>{{$position->name}}</td>
                                <td>{{$position->description}}</td>
                                <td>{{$position->users_count}}</td>
                                <td>{{$position->created_at->format('d M Y')}}</td>
                                <td>
                                    <div class="list-icons">
                                        <a href="{{route('positions.show', $position->id)}}" class="list-icons-item text-primary-600"><i class="icon-eye"></i></a>
                                        <a href="{{route('positions.edit', $position->id)}}" class="list-icons-item text-success-600"><i class="icon-pencil7"></i></a>
                                        <a href="#" class="list-icons-item text-danger-600" onclick="$(this).next().submit()"><i class="icon-trash"></i></a>
                                        <form action="{{route('positions.destroy', $position->id)}}" method="POST" onsubmit="return confirm('{{__('Are You Sure?')}}')">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $positions->appends(request()->all())->links() !!}
                </div>
            </div>
        </div>
        <!-- /basic card -->

    </div>
    <!-- /content area -->
@endsection
