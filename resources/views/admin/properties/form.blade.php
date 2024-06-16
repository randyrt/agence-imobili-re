@extends('admin.admin')

@section('title', $property->exists ? "Editer un bien" : "Créer un bien" )

@section('content')
  <h1>@yield('title')</h1>
  <form class="vstack gap-2" action="{{route($property->exists ? "admin.property.update" : "admin.property.store",  $property)}}" method="post">

    @csrf
    @method($property->exists ? "put" : "post")

    <div class="row">
      @include('shared.input', ["class" => "col", "label" => "Titre" ,"name" => "title", "value" => $property->title])
        <div class="col row">
              @include('shared.input', ["class" => "col", "label" => "surface" ,"name" => "surfaces", "value" => $property->surfaces])
              @include('shared.input', ["class" => "col", "label" => "Prix", "name" => "price", "value" => $property->price])
         </div>
    </div>

     @include('shared.input', ["type" => "textarea","class" => "col", "label" => "Description", "name" => "description", "value" => $property->description])

     <div class="row">
        @include('shared.input', ["class"  => "col", "label" => "Pièce", "name" => "rooms", "value" => $property->rooms])
        @include('shared.input', ["class"  => "col", "label" => "Chambre", "name" => "bedrooms", "value" => $property->bedrooms])
        @include('shared.input', ["class"  => "col", "label" => "Etage", "name" => "floor", "value" => $property->floor])
     </div>

     <div class="row">
        @include('shared.input', ["class"  => "col", "label" => "adresse", "name" => "adress", "value" => $property->adress])
        @include('shared.input', ["class"  => "col", "label" => "Ville", "name" => "city", "value" => $property->city])
        @include('shared.input', ["class"  => "col", "label" => "Code postal", "name" => "postal_code", "value" => $property->postal_code])
      </div>
       @include('shared.checkbox', ["label" => "Vendu", "name" => "sold", "value" => $property->sold])

    <div>
      <button class="btn btn-primary mt-2" id="success">
        @if($property->exists)
        Modifier
        @else
        Créer
        @endif
      </button>
    </div>
  </form>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.getElementById('success').addEventListener('click', function() {
      Swal.fire({
        title: 'Félicitation !',
        text: 'Votre bien a bien été enregistré !',
        icon: 'success',
        confirmButtonText: 'Cool',
        timer: 4000,
        timerProgressBar: true,
      });
    });
  </script>
@endsection

