{!! Form::label($name, __(ucfirst(str_replace('_', ' ', $name))), ['class' => 'd-block']) !!}
<div class="d-flex flex-wrap pt-2 tamplate-container">
    @foreach($component as $cmp)
        <div class="tamplate-item">
            <div class="form-check form-check-inline radio-container align-items-start mb-3 radio-container">
                <a href="{{route('preview_template',$cmp->key)}}" target="_blank" class="img-wrapper position-relative">
                    @if($with_image)
                        <img src="{{$cmp->image}}" alt="Template Image">
                    @endif
                    <p class="preview-template">Preview</p>
                </a>
                <label class="form-check-label mt-2">
                    {!! Form::radio($name, $cmp->id, $selected , ['class' => 'form-input-styled','checked'=> $selected == $cmp->id]); !!}
                    {{$cmp->name}}
                </label>
            </div>
        </div>
    @endforeach
</div>
<div class="pb-3">
    {!! $errors->first($name, '<span class="form-text text-danger">:message</span>') !!}
</div>

