<?php

namespace App\Http\Controllers\admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\admin\PropertyFormRequest;

class propertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            "admin.properties.index",
            [
                "properties" => Property::orderBy("created_at", "desc")->paginate(1)
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
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        return to_route('admin.property.index')->with("success", "Les biens ont été bien sauvegerdés");
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view("admin.properties.form", ["property" => $property]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        return to_route('admin.property.index')->with("success", "Les biens ont été bien modifié");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with("success", "Les biens ont été bien supprimé");
    }
}
