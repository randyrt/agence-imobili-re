@extends('admin.admin')

@section('title', 'Tous les biens')
@section('content')

  <div class="d-flex justify-content-between align-items-center">
     <h1>@yield('title')</h1>
     <a href="{{route('admin.property.create')}}" class="btn btn-success">Ajouter un bien</a>
  </div>
 
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Titre</th>
        <th>Surface</th>
        <th>Prix</th>
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
            <a href="{{route("admin.property.edit", $property)}}" class="btn btn-primary" id="edit">Editer</a>
            <form action="{{route("admin.property.destroy", $property)}} " method="post">
              @csrf
              @method("delete")
              <button class="btn btn-danger" id="delete">
                Supprimer
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$properties->links()}}

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      document.getElementById('delete').addEventListener('click', function () {
      Swal.fire({
        title: 'Are you sure?',
        text: "Vouz pouver encore revenir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'cancel',
        cancelButtonText: 'delete',
        timer: 50000,
        timerProgressBar: true, // Optional: Shows a progress bar
        allowOutsideClick: false, // Optional: Prevent closing by clicking outside
        allowEscapeKey: false, // Optional: Prevent closing with the Escape key
        allowEnterKey: false // Optional: Prevent closing with the Enter key
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your item has been deleted.',
            'success'
          );
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          Swal.fire(
            'Cancelled',
            'Your item is safe :)',
            'error'
          );
        }
      });
    });
</script>
@endsection