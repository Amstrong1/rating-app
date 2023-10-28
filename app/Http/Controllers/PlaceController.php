<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlaceRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePlaceRequest;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.place.index', [
            'places' => $structure->places()->get(),
            'my_actions' => $this->place_actions(),
            'my_attributes' => $this->place_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.place.create', [
            'my_fields' => $this->place_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        $place = new Place();

        $place->structure_id = Auth::user()->structure_id;
        $place->name = $request->name;
        $place->description = $request->description;

        if ($place->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('place');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('app.place.edit', [
            'place' => $place,
            'my_fields' => $this->place_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        $place = place::find($place->id);

        $place->name = $request->name;
        $place->description = $request->description;

        if ($place->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('place');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        try {
            $place = $place->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('place');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function place_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'description' => "Description",
        );
        return $columns;
    }

    private function place_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function place_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Poste',
                'field' => 'text'
            ],
            'description' => [
                'title' => 'Description',
                'field' => 'textarea'
            ],
        ];
        return $fields;
    }
}
