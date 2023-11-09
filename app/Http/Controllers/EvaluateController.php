<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class EvaluateController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        $users = $structure->users()->get();
        $voices = $structure->files()->get();
        $evaluates = new EloquentCollection();
        foreach ($users as $user) {
            $evaluates[] = $structure->rates()->where('user_id', $user->id)->orderBy('id', 'desc')->first();
            $descriptions[] = $structure->rates()->where('user_id', $user->id)->orderBy('id', 'desc')->get('description');
            $voices[] = $structure->files()->where('user_id', $user->id)->orderBy('id', 'desc')->first();
        }
        //dd($descriptions);
        // $evaluates = $evaluates->collapse();
        // $evaluates = $structure->rates()->get();
        // $userEvaluate = $evaluates->where('answer', true);

        // dd($structure->rates()->where('answer', true)->groupBy('user_id')->get());
        // dd($structure->rates()->where('answer', true)->groupBy('user_id')->get('user_id'));
        return view('app.evaluate.index', [
            // 'evaluates' => $structure->rates()->groupBy('user_id')->get(),
            'evaluates' => $evaluates,
            'descriptions' => $descriptions,
            'voices' => $voices,
            // 'my_actions' => $this->evaluate_actions(),
            // 'my_attributes' => $this->evaluate_columns(),
        ]);
    }

    // private function evaluate_columns()
    // {
    //     $columns = (object) array(
    //         'user' => 'Employé',
    //         'question' => 'Question',
    //         'answer_formatted' => 'Réponse',
    //         'description' => "Description",
    //         'rate_date' => "Date",
    //     );
    //     return $columns;
    // }

    // private function evaluate_actions()
    // {
    //     $actions = (object) array(
    //         'edit' => 'Modifier',
    //         'delete' => "Supprimer",
    //     );
    //     return $actions;
    // }
}
