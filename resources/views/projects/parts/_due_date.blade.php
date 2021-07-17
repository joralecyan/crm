<div class="modal fade my-modal" id="dueModal" tabindex="-1" role="dialog" aria-labelledby="dueModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" >
            <div class="modal-header border-0">
                <p class="modal-title">{{__('Set Due Date')}}</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center radio-btn-block">
                    <form id="dueForm">
                        <input type="hidden" name="lead_id" id="due_lead_id">
                        @include('components.form._date_time_picker', (['name' => 'due_date']))
                    </form>
                </div>
            </div>
            <div class="modal-footer mt-4 justify-content-center mb-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">{{__('Cancel')}}</button>
                <button type="button" class="btn btn-primary" id="setDue">{{__('Set')}}</button>
            </div>
        </div>
    </div>
</div>
