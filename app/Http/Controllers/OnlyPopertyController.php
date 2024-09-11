<?php

namespace App\Http\Controllers;

use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\searchPropertyRequest;
use App\Http\Requests\PropertyContactRequest;


class OnlyPopertyController extends Controller
{
    /**
     * Summary of index
     * @param \App\Http\Requests\searchPropertyRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(searchPropertyRequest $request)
    {
        $query = Property::query()->orderby('created_at', 'desc');

        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }

        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }

        if ($surfaces = $request->validated('surfaces')) {
            $query = $query->where('surfaces', '<=', $surfaces);
        }

        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view(
            'property.index',
            [
                'properties' => $query->paginate(16),
                'input' => $request->validated(),

            ]
        );
    }

    /**
     * Summary of show
     * @param string $slug
     * @param \App\Models\Property $property
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(string $slug, Property $property)
    {
        $exeptedSlug = $property->getSlug();
        if ($slug !== $exeptedSlug) {
            return to_route('property.show', ['slug' => $exeptedSlug, 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property,
        ]);
    }

    /**
     * Summary of contact
     * @param \App\Models\Property $property
     * @param \App\Http\Requests\PropertyContactRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a été bien envoyée');
    }
}

