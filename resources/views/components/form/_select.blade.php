<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace(' id', ' ', str_replace('_', ' ', $name))))) !!}
    {!! Form::select($name . ((isset($multiple) && $multiple) ? '[]' : ''), $data, $selected ?? null, ['id' => $name, 'class' => 'form-control w-100', 'multiple' => $multiple ?? false]) !!}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
@if(isset($select_2) && $select_2 == true)
<script>
    var selector = '{{$name}}';
    @if(isset($multiple) && $multiple == true)
        selector += '[]'
    @endif
    $('[name="' + selector + '"]').select2();
</script>
@endif
