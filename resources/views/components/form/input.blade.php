<div class="form-group {{$errors->has($name) ? 'has-error' : ''}}">
    <label for="{{$name}}">{{ __($label) }}</label>

    <input
            id="{{$name}}"
            type="{{isset($type) ? $type : 'text'}}"
            class="form-control mb-2 {{isset($class) ? $class : ''}} @error($name) is-invalid @enderror"
            name="{{$name}}"
            value="@if(old($name)){{old($name)}}@elseif(isset($default)){{$default}}@endif"
            placeholder="{{isset($placeholder) ? $placeholder : ''}}"
    >

    @error($name)
    <span class="invalid-feedback mb-3" role="alert">
        {{ $message }}
    </span>
    @enderror

</div>
