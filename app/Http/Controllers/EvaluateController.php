<?php

namespace App\Http\Controllers;

use App\Models\Appreciation;
use Illuminate\Support\Facades\Auth;

class EvaluateController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        $users = $structure->users()->where('role', 'user')->get();

        return view('app.evaluate.index', [
            'users' => $users,
            'my_actions' => $this->actions(),
            'rates_attributes' => $this->rate_columns(),
            'voices_attributes' => $this->voice_columns(),
            'comment_attributes' => $this->comment_columns(),
        ]);
    }

    public function show(Appreciation $evaluate)
    {
        return view('app.evaluate.show', [
            'comment' => $evaluate,
            'my_fields' => $this->fields(),
        ]);
    }


    private function actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
        );
        return $actions;
    }

    private function voice_columns()
    {
        return [
            'formated_date' => 'Date',
            'audio' => 'Audio',
        ];
    }

    private function rate_columns()
    {
        return [
            'rate_date' => 'Date',
            'question' => 'Question',
            'answer_formatted' => 'Reponse',
            'rater_name' => 'Auteur',
            'rater_contact' => 'Contact',
        ];
    }

    private function comment_columns()
    {
        return [
            'formated_date' => 'Date',
            'appreciation' => 'Commentaire',
        ];
    }

    private function fields()
    {
        $fields = [
            'appreciation' => [
                'title' => 'Commentaire',
                'field' => 'richtext',
                'colspan' => true
            ],
        ];
        return $fields;
    }
}
