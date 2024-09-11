@extends('base')
@section('content')
  @php 
    $type = 'info'
  @endphp
  {{-- <x-alert :type='$type' class="font-bold text-red"> Des informations
  </x-alert>--}}
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner imageContainer">
          <div class="carousel-item active">
            <img class="d-block w-100 image1" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 image2">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100 image3">
          </div>
      </div>
   </div>
</div>
 <div class=" slogon">
      <h1 style="font-size: 3rem">  Agence Immobilière Havana</h1>
      <p class="visite">Venez nous rendre visite à Fianarantsoa et découvrez comment nous pouvons vous aider à réaliser vos projets immobiliers.</p>
      <p class="sentence">"Avec Havana, l'immobilier devient simple et accessible."</p> 
  </div>
  <div class="bg-light p-5 mb-4 text-center">
     
      <p> 
       Située au cœur de Fianarantsoa, l'agence immobilière Havana est votre partenaire de confiance pour toutes vos transactions immobilières. Que vous soyez à la recherche de la maison de vos rêves, d'un appartement moderne ou d'un terrain pour bâtir votre avenir, notre équipe d'experts est là pour vous accompagner à chaque étape.
     </p>
     <hr>
    <div class="container">
      <h2>Nos Services </h2>
        <div class="row">
            <div class="row">
          <p><span>Achat et Vente de Propriétés :</span> <br> Nous vous aidons à trouver la propriété idéale qui correspond à vos besoins et à votre budget, ou à vendre votre bien rapidement et au meilleur prix.</p>
            </div>
            <div class="row">
            <p><span>Location :</span> <br> Que vous cherchiez à louer un logement ou que vous ayez une propriété à louer, nous facilitons les processus pour garantir une expérience sans tracas.</p>  
            </div>
            <div class="row">
            <p><span>Gestion Locative :</span> <br> Nous prenons en charge la gestion complète de vos biens locatifs, de la recherche de locataires à la gestion des contrats et des entretiens.
            </div></p> 
            <div class="row">
            <p><span>Conseils en Investissement :</span> <br>  Notre expertise locale et notre connaissance approfondie du marché vous offrent des conseils avisés pour maximiser vos investissements immobiliers.</p> 
            </div>
     </div>
  
    <hr>
  <div class="row">
    <h3 class="mt-2"> Pourquoi Choisir Havana ?</h3>
     <div class="row">
      <p><span> Expertise Locale :</span> <br>  Basée à Fianarantsoa, notre connaissance du marché local nous permet de vous offrir des conseils personnalisés et pertinents.</p> 
     </div>
      <div class="row">
      <p><span> Équipe Dévouée :</span> <br>  Nos agents sont passionnés par l'immobilier et dévoués à offrir un service client exceptionnel. </p>
      </div>
      <div class="row">
      <p><span>Transparence et Intégrité :</span><br>  Nous nous engageons à maintenir des pratiques commerciales honnêtes et transparentes.</p>
      </div> 
    </div>
    <hr>
   <div class="container section mt-5 mb-10 section">
    <h2 class="text-center black">Voir les quatres dernières publications</h2>
    <div class="row mt-2">
      @foreach($properties as $property)
        <div class="col">
          @include('property.card')
        </div>
      @endforeach
    </div>
  </div>

 {{--<x-weather></x-weather>--}} 

@endsection