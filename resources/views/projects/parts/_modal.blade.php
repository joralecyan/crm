<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{__('Add New Task')}}</h5>
            <button type="button" class="close" data-dismiss="modal">×</button>
        </div>

        <div class="modal-body">
            <form action="{{route('tasks.store')}}" method="POST" id="lead_form">
                @csrf
                <input type="hidden" name="board_id" id="board_id">
                @include('components.form._text', (['name' => 'name']))
                @include('components.form._textarea', (['name' => 'description']))
            </form>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-link" data-dismiss="modal">{{__('Close')}}</button>
            <button type="button" class="btn btn-primary" id="add_task" onclick="$('#lead_form').submit()"> {{__('Add Task')}}</button>
        </div>
    </div>
</div>
