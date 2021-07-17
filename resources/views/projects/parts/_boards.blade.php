<div class="board">
@foreach($boards as $board)
    <div class="list-wrapper" data-id="{{$board->id}}">
        <a href="#" class="board-delete-icon" data-id="{{$board->id}}"><i class="icon-cross3"></i></a>
        <div class="list-header" data-id="{{$board->id}}">
            <span class="list-title list-title-editable" title="{{$board->name}}">{{$board->name}}</span>
        </div>
        <div id="list-{{$board->id}}" class="list my-list" data-id="{{$board->id}}">
            @foreach($board->tasks as $task)<div class="card lead_modal" data-id="{{$task->id}}" data-board_id="{{$task->board_id}}">
                  <div class="dropdown lead-dropdown">
                      <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"></a>
                      <div class="dropdown-menu" x-placement="bottom-start">
                          <a href="#" class="dropdown-item edit-lead-button lead_modal"
                             data-id="{{$task->id}}"
                             data-board_id="{{$task->board_id}}">
                              <i class="icon-pencil"></i> {{'Edit Task'}}</a>
                          <a href="#" class="dropdown-item due-date-button"
                             data-id="{{$task->id}}" data-due="{{$task->due_date ? $task->due_date->format('d-m-Y H:i') : ''}}">
                              <i class="icon-hour-glass"></i> {{'Set Due Date'}}</a>

                          <a href="#" class="dropdown-item delete-lead-button"
                             data-id="{{$task->id}}"><i class="icon-trash"></i> {{__('Delete Task')}}</a>
                      </div>
                      <p>{{$task->name}}</p>
                  </div>
                 @if($task->due_date)
                  <span class="lead-task-icon-@if($task->is_due){{'lost'}}@else{{'open'}}@endif" data-toggle="tooltip" title="{{$task->due_date->format('d-m-Y H:i')}}"><i class="icon-hour-glass"></i></span>
                 @endif
                  <span class="">0</span></div>
            @endforeach
        </div>
        <div class="new-list text-center">
            <button type="button" class="btn btn-icon btn-new_lead new_lead_modal" data-board_id="{{$board->id}}" data-project_id="{{$board->project_id}}">{{__('Add new Task')}}</button>
        </div>
    </div>
@endforeach
<div class="list-wrapper-new">
    <div class="list-header">
        <input type="text" placeholder="{{__('Add new board')}}" id="new_board_val" maxlength="255">
        <button type="button" class="btn btn-icon" id="add_new_board"><i class="icon-check"></i></button>
    </div>
</div>
</div>
