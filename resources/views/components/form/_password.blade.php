<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name)))) !!}
    <input type="password" class="form-control" placeholder="{{__(ucfirst(str_replace('_', ' ', $name)))}}" name="{{$name}}" id="{{$name}}">
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>