@extends('admin.admin')

@section('title', $option->exists ? "Editer une option" : "Créer une option" )

@section('content')
  <h1>@yield('title')</h1>
  <form class="vstack gap-2" action="{{route($option->exists ? "admin.option.update" : "admin.option.store",  $option)}}" method="post">

    @csrf
    @method($option->exists ? "put" : "post")

       @include('shared.input', ["class" => "col", "label" => "Nom", "name" => "name", "value" => $option->name])

    <div>
      <button class="btn btn-primary mt-2" id="success">
        @if($option->exists)
        Modifier
        @else
        Créer
        @endif
      </button>
    </div>
  </form>
@endsection

