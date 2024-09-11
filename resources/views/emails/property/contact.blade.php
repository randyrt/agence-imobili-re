<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été bien fait pour le demande de contact <a href="{{route('property.show', ['slug'=> $property->getSlug(), 'property' => $property] )}}">{{$property->title}}</a>. 

- Prénom : {{$date['firstname']}}
- Nom : {{$date['lastname']}}
- Téléphone : {{$date['phone']}}
- Email : {{$date['mail']}}


** Message: **<br>
{{$date['message']}}
</x-mail::message>
