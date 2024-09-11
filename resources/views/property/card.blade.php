<div class="card border-info mb-3" style="background-color: rgb(0 0 0 /30%);">
  <h5 class="card-header"></h5>
  <div class="card-body">
    <h5 class="card-title">
      <a href="{{route('property.show', ['slug' => $property->getSlug(), 'property'=> $property])}}">{{$property->title}}</a>
    </h5>
     <p class="card-text">{{$property->surfaces}} m² - {{$property->city}} - ({{$property->postal_code}})</p>
     <div class="text-info fw-bold" style="font-weight: bold" >
      {{number_format($property->price, thousands_separator: ' ') }} Ariary
     </div>
  </div>
</div> 