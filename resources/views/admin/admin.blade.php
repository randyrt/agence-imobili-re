<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') | administration</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('style/admin.css')}}">
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
          <a aria-current="page" href="/" class="nav-link" >Page d'accueil</a>
        </li>
        <li class="nav-item">
          <a aria-current="page" href="{{route('admin.property.index')}}" @class(['nav-link', 'active' => str_contains($route, 'property') ])>Gérer les biens</a>
        </li>
        <li class="nav-item">
          <a aria-current="page" href="{{route('admin.option.index')}}" @class(['nav-link', 'active' => str_contains($route, 'option') ]) >Gérer les options</a>
        </li>
      </ul>
       <div class="ms -auto">
        @auth
        <ul class="navbar-nav">
          <li class="nav-item">
              <form action="{{route('logout')}}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-primary">Se déconnecter</button>
              </form>
          </li>
        </ul>
        @endauth
       </div>
    </div>
  </div>
</nav>

  <div class="container mt-5">

      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
      </svg>

        @if(session('success'))
        <div class="alert alert-success  d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
                {{session('success')}}
              </div>
        </div>  
        @endif

      {{--

        @if($errors->any())
        <div class="btn btn-danger container">
            <ul>
              @foreach($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </ul>
        </div>
      @endif 
      
      --}} 
   
     @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
  <script src="{{asset('javascript/script.js')}}"></script> 
</body>
</html>
