<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('Project details')}}</legend>
            @include('components.form._text', (['name' => 'name']))
            @include('components.form._file', (['name' => 'image', 'object' => $project ?? null]))
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('Project description')}}</legend>
            @include('components.form._textarea', (['name' => 'description']))
        </fieldset>
    </div>
</div>
