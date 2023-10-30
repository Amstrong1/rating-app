<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class EvaluateController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.evaluate.index', [
            'evaluates' => $structure->rates()->get(),
            'my_actions' => $this->evaluate_actions(),
            'my_attributes' => $this->evaluate_columns(),
        ]);
    }

    private function evaluate_columns()
    {
        $columns = (object) array(
            'user' => 'Employé',
            'question' => 'Question',
            'answer_formatted' => 'Réponse',
            'description' => "Description",
            'rate_date' => "Date",
        );
        return $columns;
    }

    private function evaluate_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }
}
