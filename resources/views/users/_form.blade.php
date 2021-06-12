<div class="row">
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('User details')}}</legend>
            @include('components.form._text', (['name' => 'name']))
            @include('components.form._email', (['name' => 'email']))
            @include('components.form._text', (['name' => 'phone']))
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <legend class="font-weight-semibold"><i class="icon-file-text2 mr-2"></i> {{__('User properties')}}</legend>
            @include('components.form._select', (['name' => 'status', 'data' => [\App\Models\User::STATUS_ACTIVE => __(ucfirst(\App\Models\User::STATUS_ACTIVE)), \App\Models\User::STATUS_INACTIVE => __(ucfirst(\App\Models\User::STATUS_INACTIVE))]]))
            @include('components.form._select', (['name' => 'role', 'data' => [\App\Models\User::ROLE_USER => __(ucfirst(\App\Models\User::ROLE_USER)), \App\Models\User::ROLE_ADMIN => __(ucfirst(\App\Models\User::ROLE_ADMIN))]]))
            @include('components.form._select', (['name' => 'position_id', 'data' => $positions]))
        </fieldset>
    </div>
</div>
