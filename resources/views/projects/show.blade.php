@extends('layouts.app')
@section('head')
    <link href="/css/pipeline.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
    <div class="page-header pipeline-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex mr-3">
                <h4><i class="icon-file-text2 mr-2"></i> <span class="font-weight-semibold">{{__('Projects')}}</span> > <span class="small">{{$project->name}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
            <div class="btn-group justify-content-center ml-auto mr-2">
                <a href="#" class="btn btn-secondary dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">{{$project->name}}</a>
                <div class="dropdown-menu" x-placement="bottom-start">
                    @foreach($projects as $item)
                        <a href="{{route('projects.show', $item->id)}}" class="dropdown-item @if($item->id == $project->id) disabled @endif">{{$item->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="justify-content-end mr-2">
                <a href="{{route('projects.edit', $project->id)}}" class="btn btn-labeled btn-labeled-right bg-success">{{__('Edit')}} <b><i class="icon-pencil"></i></b></a>
            </div>
            <div class="header-elements text-center text-md-left mb-3 mb-md-0">
                <a href="{{route('projects.create')}}" class="btn btn-labeled btn-labeled-right bg-primary">{{__('Add New')}} <b><i class="icon-plus2"></i></b></a>
            </div>
        </div>
    </div>

    <div class="content pt-0">
        <div class="card mb-0">
            <div class="card-body has-fixed-height board-div">
                @include('projects.parts._boards')
            </div>
        </div>
    </div>
    <div class="modal fade aufg-modal" id="lead_modal">
        @include('projects.parts._modal')
    </div>
    @include('projects.parts._due_date')
@endsection
@section('scripts')
    <script src="https://kendo.cdn.telerik.com/2018.3.911/js/kendo.all.min.js"></script>
    <script>
        var sortableOptions = {
            filter: '.card',
            container: '.board',
            connectWith: '.list',
            cursor: 'grabbing',
            ignore: '.non-sort',
            placeholder: function(element){
                return $('<div class="card"></div>').css({
                    background: '#ddd'
                });
            },
            hint: function(element) {
                return element.clone().css({
                    width: '20em',
                    transform: 'rotate(-5deg)',
                    border: '1px solid #eee'
                });
            },
            change: function (e)
            {
                let board_id = $(e.sender.element).data('id');

                var order = [];
                $.map( $('#list-' + board_id).find('.card'), function( val, i ) {
                    order[i] = $(val).attr('data-id')
                });

                $.ajax({
                    url: '/tasks/' + board_id + '/sort',
                    type: "POST",
                    data: {
                        order: order
                    },
                    success: function (data) {
                        if(board_id === 'delete'){
                            $('#list-delete').html('');
                        }
                        if(board_id === 'win'){
                            $('#list-win').html('');
                        }
                        if(board_id === 'lost'){
                            $('#list-lost').html('');
                        }
                    }
                });
            }
        };
        var boardOptions = {
            filter: '.list-wrapper',
            container: '.board',
            connectWith: '.list-wrapper',
            cursor: 'grabbing',
            ignore: '.non-sort',
            placeholder: function(element){
                return $('<div class="list-wrapper"></div>').css({
                    background: '#d42626'
                });
            },
            hint: function(element) {
                return element.clone().css({
                    width: '20em',
                    transform: 'rotate(-5deg)',
                    border: '1px solid #eee'
                });
            },
            change: function(e) {
                var order = [];
                $.map( board_sort.items(), function( val, i ) {
                    order[i] = $(val).attr('data-id')
                });
                $.ajax({
                    url: '/boards/' + '{{$project->id}}' + '/sort',
                    type: "POST",
                    data: {
                        order: order
                    },
                    success: function (data) {}
                });
            }
        };
        var list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
        var board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");

        $(document).on('click', '#add_new_board', function (){
            if($('#new_board_val').val() != ''){
                $.ajax({
                    url: '/boards/' + '{{$project->id}}',
                    type: "POST",
                    data: {
                        name: $('#new_board_val').val()
                    },
                    success: function (data) {
                        $('.board-div').html(data);
                        list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                        board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                    }
                });
            }

        })

        $(document).on('click', '.list-title-editable', function (){
            let text = $(this).text();
            $(this).parent().parent().find('.board-delete-icon').addClass('d-none');
            let html = '     <input type="text" value="' + text + '" class="non-sort">\n' +
                '        <button type="button" class="btn btn-icon non-sort edit_button"><i class="icon-check"></i></button>'
            $(this).parent().html(html);
        });

        $(document).on('click', '.delete-lead-button', function (){
            let id = $(this).data('id');
            $.ajax({
                url: '/tasks/' + id,
                type: "DELETE",
                data: {
                },
                success: function (data) {
                    $('.board-div').html(data);
                    list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                    board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                }
            });
        });

        $(document).on('click', '.board-delete-icon', function (){
            let id = $(this).data('id');
            $.ajax({
                url: '/boards/' + id + '/destroy',
                type: "POST",
                data: {},
                success: function (data) {
                    $('.board-div').html(data);
                    list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                    board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                }
            });
        });

        $(document).on('click', '.edit_button', function (){
            let val = $(this).prev().val();
            let id = $(this).parent().data('id');
            if(val != ''){
                $.ajax({
                    url: '/boards/' + id + '/update',
                    type: "POST",
                    data: {
                        name: val,
                    },
                    success: function (data) {
                        $('.board-div').html(data);
                        list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                        board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                    }
                });
            }
        });

        $(document).on('click', '.new_lead_modal', function (){
            let board_id = $(this).data('board_id');
            $('#board_id').val(board_id);
            $('#lead_modal').modal();
        });

        $(document).on('click', '.close_lead_modal', function (){
            $('#lead_modal').hide();
        });

        $(document).on('submit', '#lead_form', function (e){
            e.preventDefault();
            $('.leads-errors').html('');
            $.ajax({
                url: '/tasks',
                type: "POST",
                data: $('#lead_form').serialize(),
                success: function (data) {
                    $('.board-div').html(data);
                    $('#lead_form').find('.form-control').val('');
                    $('#lead_modal').modal('hide');
                    list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                    board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                },
                error: function (data)
                {
                    $.each(data.responseJSON.errors, function( index, value ) {
                        $('#' + index + '-error').parent().find('.text-danger').html(value);
                    });
                }
            });
        });

        $(document).on('mouseover', '.board-delete-icon', function (){
            $(this).parent().find('.board-delete-icon').show();
        })
        $(document).on('mouseover', '.list-header', function (){
            $(this).parent().find('.board-delete-icon').show();
        })

        $(document).on('mouseout', '.list-header', function (){
            $(this).parent().find('.board-delete-icon').hide();
        })

        // horizon scroll mouse
        const slider = document.querySelector('.board');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if(!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3; //scroll-fast
            slider.scrollLeft = scrollLeft - walk;
            console.log(walk);
        });

        $(document).on('click', '.due-date-button', function (){
            let id = $(this).data('id');
            let due = $(this).data('due');
            $('#due_lead_id').val(id);
            $('#due_date').val(due);
            $('#dueModal').modal('show');
        })

        $('#setDue').click(function (){
            $.ajax({
                url: '/tasks-due',
                type: "POST",
                data: $('#dueForm').serialize(),
                success: function (data) {
                    $('.board-div').html(data);
                    list_sort = $('.list').kendoSortable(sortableOptions).data("kendoSortable");
                    board_sort = $('.board').kendoSortable(boardOptions).data("kendoSortable");
                    $('#dueModal').modal('hide');
                    $('[data-toggle="tooltip"]').tooltip()
                }
            });
        })

    </script>
@endsection

