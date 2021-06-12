<div class="form-group">
    {!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name)))) !!}
    <br>
    @if($name == 'file')
        {!! Form::file($name, ['id' => $name, 'accept' => "application/pdf"]) !!}
    @else
        {!! Form::file($name, ['id' => $name]) !!}
    @endif
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>
@if(isset($object) && $object)
    <div class="form-group">
        {!! Form::label('current_' . $name, __('Current ' . ucfirst(str_replace('_', ' ', $name)))) !!}
        <br>
        @if($name != 'file')
        <img src="{{$object->$name}}" width="100px" alt="{{$name}}">
        @else
            <a href="{{$object->$name}}" target="_blank">{{__('Link to file')}}</a>
        @endif
    </div>
@endif
