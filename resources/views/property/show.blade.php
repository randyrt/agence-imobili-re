@extends('base')

@section('title', $property->title)

@section('content')
<div class="container mt-2 card border-primary"  style="background-color: rgb(0 0 0 /20%);">
    <div>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          @foreach (['image1', 'image2', 'image3'] as $index => $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$property->$item) }}" alt="{{ $item }}" class="d-block w-100" style="height: 700px; filter: brightness(50%)">
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>

  
  <h1 class="text-black">{{$property->title}}</h1>
  <h2 class="text-black" >{{$property->rooms}} pièces - {{$property->surfaces}} m²</h2>
  <div class="text-black fw-bold" style="font-size: 2rem">
      {{number_format($property->price, thousands_separator: ' ') }} Ariary
  </div>
  <hr>
  @include('shared.flash')
   <div class="mt-1">
        <p style="font-size: 2rem"> {!!nl2br($property->description)!!}</p>
        <div class="row">
          <div class="col-8">
            <h2>Caractéristique</h2>
            <table class="table striped">
              <tr>
                <td>surface habitable</td>
                <td>{{$property->surfaces}} m²</td>
              </tr>
               <tr>
                <td>Pièce</td>
                <td>{{$property->rooms}}</td>
              </tr>
               <tr>
                <td>Chambre</td>
                <td>{{$property->bedrooms}}</td>
              </tr>
              <tr>
                <td>Etage</td>
                <td>{{$property->floor}}</td>
              </tr>
            </table>
          </div>
          <div class="col-4">
            <h2>Spécificité</h2>
            <ul class="list-group">
              @foreach($property->option as $item)
              <li class="list-group-item">
                {{$item->name}}
              </li>
              @endforeach
            </ul>
          </div>
        </div>
    </div>
    <hr>
    <div class="mt-2">
    <h4>Vous êtes intéressé par ce bien ?</h4>
    </div>
     <form action="{{route('property.contact', $property)}}" method="post" class="vstack gap-3">
         @csrf
       <div class="row">
         {{--<x-input class="col" name="firstname" label="Prénom" value=''></x-input>--}} 
          @include('shared.input', ["class" => "col" ,"name" => "firstname", "label" => "Prénom"])
          @include('shared.input', ["class" => "col" ,"name" => "lastname", "label" => "Nom"])
        </div>
        <div class="row">
            @include('shared.input', ["class" => "col" ,"name" => "phone", "label" => "Téléphone"])
            @include('shared.input', ["type"=>"email" , "class" => "col" , "name" => "email", "label" => "E-mail"])
        </div>
            @include('shared.input', ["type" => "textarea", "label" => "Votre message", "name" => "message"])
            <button class="btn btn-primary mt-2">
              Nous contacter
            </button>
     </form>
</div> 
@endsection