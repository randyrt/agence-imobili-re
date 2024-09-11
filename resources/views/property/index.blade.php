@extends('base')

@section('title', 'tous nos biens')

@section('content')

 <div class="bg-light p-5 mb-4 text-center">
  <form action="" method="get" class="container d-flex gap-2">
   @csrf
      <input type="text" placeholder="mot clé" name="title" value="{{$input ['title'] ?? ''}}" class="form-control">
      <input type="number" placeholder="budget maximum" name="price" value="{{$input ['price'] ?? ''}}" class="form-control">
      <input type="number" placeholder="nombre de surface minimume" name="surfaces" value="{{$input ['surfaces'] ?? ''}}" class="form-control">
      <input type="number" placeholder="nombre de pièce minimume" name="rooms" value="{{$input ['rooms'] ?? ''}}" class="form-control">
      <button class="btn btn-primary btn-sm flex-grow-0">
        rechercher
      </button>
   </form>
 </div>
     <div class="container mt-2">
        <div class="row">
          @forelse($properties as $property)
            <div class="col-3 mb-3">
              @include('property.card')
            </div>
          @empty
            <div class="alert alert-info col">
              Aucun resultat trouvé 
            </div>
          @endforelse
        </div>
        <div class="container mt-4" style="color: black">
        {{$properties->links()}}
        </div>
     </div>
 @endsection