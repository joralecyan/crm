<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name)))) !!}
    {!! Form::textarea($name, $value ?? null, ['id' => $name, 'class' => 'form-control', 'rows' => $rows ?? 5, 'placeholder' => __(ucfirst(str_replace('_', ' ', $name)))]) !!}
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
@if(isset($editor) && $editor == true)
<script>
    ClassicEditor
        .create( document.querySelector( '#{{$name}}' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endif
