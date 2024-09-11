<?php

namespace App\Http\Controllers\admin;


use App\Models\Option;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\optionFormRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            "admin.options.index",
            [
                "options" => Option::paginate(8)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $option = new Option();

        return view(
            'admin.options.form',
            [
                "option" => $option,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(optionFormRequest $request)
    {
        $option = Option::create($request->validated());
        return to_route('admin.option.index')->with("success", "L'option a été bien sauvegerdé");
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(option $option)
    {
        return view("admin.options.form", ["option" => $option]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(optionFormRequest $request, option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with("success", "L'option a été bien modifié");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with("success", "L'option a été bien supprimé");
    }
}
