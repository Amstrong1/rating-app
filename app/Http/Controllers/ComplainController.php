<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.complain.index', [
            'complains' => $structure->complains()->get(),
            'my_actions' => $this->complain_actions(),
            'my_attributes' => $this->complain_columns(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Complain $complain)
    {
        return view('app.complain.show', [
            'complain' => $complain,
            'my_fields' => $this->complain_fields(),
        ]);
    }

    private function complain_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'contact' => "Contact",
            'complain' => "Plainte",
        );
        return $columns;
    }

    private function complain_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
        );
        return $actions;
    }

    private function complain_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom et prénoms',
                'field' => 'text'
            ],
            'contact' => [
                'title' => 'Contact',
                'field' => 'tel'
            ],
            'complain' => [
                'title' => 'Plainte',
                'field' => 'textarea',
                'colspan' => 'true'
            ],
        ];
        return $fields;
    }
}
