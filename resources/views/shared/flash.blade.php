<div class="container mt-2">
        @if(session('success'))
              <div class="alert alert-success">
                {{session('success')}}
              </div>
            </div>  
        @endif

        @if($errors->any())
            <div class="btn btn-danger">
              @foreach($errors->all() as $error)
                <li>
                  {{$error}}
                </li>
              @endforeach
            </div>
          @endif

    @yield('content')
  </div>