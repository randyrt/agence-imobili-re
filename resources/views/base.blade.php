<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') | Agence Havana</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
  <link rel="stylesheet" href="{{asset('style/base.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
{{-- @vite(['public/style/base.css' ,'resources/js/app.js'])  --}}
@vite(['public'])
</head>
<body>

  @php
      $route = request()->route()->getName();
  @endphp
 

  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" style="background-color: #1b5279;">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: rgb(13, 240, 240)" >Havana</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
          <a aria-current="page" href="/" @class(['nav-link', 'active' => str_contains($route, 'properties') ])>accueil</a>
        </li>
        <li class="nav-item">
          <a aria-current="page" href="{{route('property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property.') ])>tous les biens</a>
        </li>
         <li class="nav-item">
          <a aria-current="page" class="nav-link" href="{{route('login')}}">Connexion</a>
        </li>
        @auth
        <li class="nav-item">
           <a aria-current="page" class="nav-link" href="{{route('admin.property.index')}}">Administration</a>
        </li>
        @endauth
        @guest 
          <li class="nav-item">
           <a aria-current="page" class="nav-link" href="/login"></a>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>

    @yield('content')
   
  @extends('footer.footer')

</body>
</html>
