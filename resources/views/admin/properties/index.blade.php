@extends('admin.admin')

@section('title', 'Tous les biens')
@section('content')

  <div class="d-flex justify-content-between align-items-center">
     <h1>@yield('title')</h1>
     <a href="{{route('admin.property.create')}}" class="btn btn-primary">Ajouter un bien</a>
  </div>
 <div class="container card border-info"  style="background-color:blueviolet;">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Surface en m²</th>
        <th>Prix en ariary</th>
        <th>Ville</th>
        <th class="text-end">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($properties as $property)
      <tr>
        <td>{{$property->title}}</td>
        <td>{{$property->surfaces}}</td>
        <td>{{number_format($property->price, thousands_separator: ' ')}}</td>
        <td>{{$property->city}}</td>
        <td>
          <div class="d-flex gap-2 w-100 justify-content-end">
            <a href="{{route('property.show', ['slug' => $property->getSlug(), 'property'=> $property])}}" class="btn btn-info border-primary">voir le bien</a>
            <a href="{{route("admin.property.edit", $property)}}" class="btn btn-primary" id="edit">Editer</a>
            <form action="{{route("admin.property.destroy", $property)}} " method="post">
              @csrf
              @method("delete")
              <button class="btn btn-danger">
                Supprimer
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  <div class="mt-3">
     {{$properties->links()}}
  </div>
@endsection