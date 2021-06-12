<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('Position details')}}</legend>
            @include('components.form._text', (['name' => 'name']))

        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('Position description')}}</legend>
            @include('components.form._textarea', (['name' => 'description']))
        </fieldset>
    </div>
</div>
