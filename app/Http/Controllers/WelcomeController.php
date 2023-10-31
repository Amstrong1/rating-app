<?php

namespace App\Http\Controllers;

use App\Models\PlaceQuiz;
use App\Models\Quiz;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class WelcomeController extends Controller
{
    public function index(Request $request, $user_id)
    {
        if ($request->method() == 'POST') {
            
            for ($i = 0; $i < $request->quizzes; $i++) {
                $rate = new Rate();
                $rate->structure_id = $request->structure;
                $rate->user_id = $request->user;
                $rate->quiz_id = $request->input('quiz_id' . $i);
                $rate->answer = $request->input('answer' . $i);
                $rate->description = $request->input('description' . $i);
                if ($rate->save()) {
                    Alert::toast("Données enregistrées", 'success');
                } else {
                    Alert::toast('Une erreur est survenue', 'error');
                }
            }

        }

        $user = User::find($user_id);
        $structure = $user->structure;
        $quizzes_id = PlaceQuiz::where('place_id', $user->place_id)->get('quiz_id');
        $quizzes = new EloquentCollection();
        foreach ($quizzes_id as $quiz) {
            $quizzes[] = Quiz::find($quiz->quiz_id);
        }
        return view('welcome', compact('user', 'structure', 'quizzes'));
    }
}
