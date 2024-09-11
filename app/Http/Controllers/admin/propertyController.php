<?php

namespace App\Http\Controllers\admin;

use App\Models\Option;
use App\Models\Property;
use App\Http\Controllers\Controller;
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\searchPropertyRequest;
use App\Http\Requests\admin\PropertyFormRequest;

class propertyController extends Controller
{
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(AuthManager $auth)
    {
        // dd($auth->user());

        Auth::user()->can('viewany', Property::class);
        return view(
            "admin.properties.index",
            [
                "properties" => Property::orderBy("created_at", "desc")->withTrashed(false)->paginate(20)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $property = new Property();

        $property->fill([
            "surfaces" => "40",
            "rooms" => "3",
            "bedrooms" => "1",
            "floor" => "0",
            "city" => "Fianarantsoa",
            "postal_code" => "301",
            "sold" => false
        ]);


        return view(
            'admin.properties.form',
            [
                "property" => $property,
                "options" => Option::pluck("name", "id")
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request, Property $property)
    {

        $property = Property::create($request->validated());
        $property->option()->sync($request->validated("options"));
        return to_route('admin.property.index')->with("success", "Les biens ont été bien sauvegerdés");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        // dd(Auth::user()->can('delete', $property));
        // $this->authorize('delete', $property);

        return view(
            "admin.properties.form",

            [
                "property" => $property,
                "options" => Option::pluck("name", "id")
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->option()->sync($request->validated("options"));
        $property->update($request->validated());
        return to_route('admin.property.index')->with("success", "Les biens ont été bien modifié");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        // $this->authorize('delete', $property);

        // $property->restore(); Mettre de le deleted_at à null
        // $property->forceDelete(); Supprimer complétement, même dans l'espace admin
        $property->delete();
        return to_route('admin.property.index')->with("success", "Les biens ont été bien supprimé");
    }
}
