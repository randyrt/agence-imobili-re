<div>
  @php
    $label ??= ucfirst($name);
    $type ??= 'text';
    $name ??= '';
    $class ??= null;
    $value ??= "";
  @endphp

<div @class(["form-group mt-3", $class])>
    <label for="{{$name}}">{{$label}}</label>
    @if($type === 'textarea')
     <textarea class="form-control @error($name) is-invalid @enderror" type="{{$type}}" id={{$name}} name={{$name}} value="{{old($name, $value)}}"></textarea>
    @else
     <input class="form-control @error($name) is-invalid @enderror" type="{{$type}}" id={{$name}} name={{$name}} value="{{old($name, $value)}}">
    @endif
    @error($name)
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
</div>
</div>