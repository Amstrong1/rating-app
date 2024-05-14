<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Answer;
use App\Models\Appreciation;
use Illuminate\Support\Facades\Auth;

class EvaluateController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;

        foreach (auth()->user()->notifications as $notification) {
            $notification->markAsRead();
        }

        $rates = $structure->rates()->orderBy('created_at', 'desc')->get();
        $rates = $rates->unique('rater_contact');
        
        return view('app.evaluate.index', [
            'rates' => $rates,
            'users' => $structure->users()->where('role', 'user')->get(),
            'count_answers' => $structure->answers()->count(),
            'count_answers_true' => $structure->answers()->where('answer', true)->count(),
            'count_answers_false' => $structure->answers()->where('answer', false)->count(),
            'my_actions' => $this->actions(),
            'rates_attributes' => $this->rate_columns(),
            'voices_attributes' => $this->voice_columns(),
            'comment_attributes' => $this->comment_columns(),
        ]);
    }

    public function show(Rate $evaluate)
    {
        $rater_contact = $evaluate->rater_contact;
        $rates = Rate::where('rater_contact', $rater_contact)->get();

        return view('app.evaluate.show', [
            'rates' => $rates,
            'my_fields' => $this->fields(),
            'my_actions' => $this->list_actions(),
            'rates_attributes' => $this->user_rate_columns(),
        ]);
    }

    public function answer($id)
    {
        $rate = Rate::find($id);
        $appreciation = Appreciation::where('rate_id', $id)->first();
        $answers = Answer::where('rate_id', $id)->get();   
        $answers->load('quiz');

        return view('app.evaluate.show_list', [
            'rate' => $rate,
            'appreciation' => $appreciation,
            'answers' => $answers,
            'my_fields' => $this->fields(),
            'answer_attributes' => $this->answer_columns(),
        ]);
    }


    private function actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
        );
        return $actions;
    }


    private function list_actions()
    {
        $actions = (object) array(
            'list' => 'Voir',
        );
        return $actions;
    }

    private function voice_columns()
    {
        return [
            'formated_date' => 'Date',
            'audio' => 'Audio',
            'contact' => 'Contact',
        ];
    }

    private function rate_columns()
    {
        return [
            'rate_date' => 'Date',
            'rater_name' => 'Auteur',
            'rater_contact' => 'Contact',
            'satisfaction' => 'Satisfaction',
        ];
    }

    private function answer_columns()
    {
        return [
            'question' => 'Question',
            'formatted_answer' => 'Reponse',
            'formatted_date' => 'Date',
         
        ];
    }

    private function user_rate_columns()
    {
        return [
            'rate_date' => 'Date',
            'rater_contact' => 'Contact',
            'user' => 'Unité',
            'appreciation' => 'Avis',
         
        ];
    }

    private function comment_columns()
    {
        return [
            'formated_date' => 'Date',
            'appreciation' => 'Avis client',
        ];
    }

    private function fields()
    {
        $fields = [
            'appreciation' => [
                'title' => 'Avis client',
                'field' => 'richtext',
                'colspan' => true
            ],
        ];
        return $fields;
    }
}
