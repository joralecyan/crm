<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name))), ['class' => 'd-block']) !!}
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            {!! Form::radio($name, $values[0] ?? 1, isset($selected) ? $selected : true, ['class' => 'form-input-styled', 'data-fouc' => true]); !!}
            {{$text[0]}}
        </label>
    </div>
    <br>
    <div class="form-check form-check-inline">
        <label class="form-check-label">
            {!! Form::radio($name, $values[1] ?? 0, isset($selected) ? !$selected : false, ['class' => 'form-input-styled', 'data-fouc' => true]); !!}
            {{$text[1]}}
        </label>
    </div>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
