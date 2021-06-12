<div class="form-group ml-2">
    <div class="input-group">
        {!! Form::text($name, $value ?? null, ['id' => $name, 'class' => 'form-control']) !!}
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
<script src="/_dashboard/js/plugins/pickers/anytime.min.js"></script>
<script>

    $('#' + '{{$name}}').AnyTime_picker({
        format: '%d-%m-%Y',
    });
</script>
