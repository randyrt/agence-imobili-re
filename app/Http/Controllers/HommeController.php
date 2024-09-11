<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Weather;
use Illuminate\Http\Request;

class HommeController extends Controller
{
  public function index(Weather $weather)
  {
    //  dd($weather);


    $properties = Property::avaible()->recent()->limit(4)->get();
    //  $userAdmin = User::where('id', 1)->get();

    /*
      foreach ($userAdmin as $userRole) {
        dd($userRole->role);
      }
     */

    // $role = $userAdmin->pluck('role');


    /*@var User $user */
    /*  $user = User::first();
      $user->password = 'randy';
      $user->syncChanges();
      dd($user->password, $user); */

    return view('home', ['properties' => $properties]);
  }
}
