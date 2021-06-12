<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name)))) !!}
    <input type="datetime-local" name="{{$name}}" id="{{$name}}" class="form-control"  @if(isset($object) && $object->$name)
    value="{{$object->$name->format('Y-m-d\TH:i:s')}}" @else value="{{old($name)}}" @endif placeholder="{{__(ucfirst(str_replace('_', ' ', $name)))}}"
           @if(isset($required) && $required) required @endif>
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
