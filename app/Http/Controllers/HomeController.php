<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $company = Structure::count();

        $structure = Auth::user()->structure;
        $place = $structure->places()->count();
        $user = $structure->users()->count();
        $quiz = $structure->quizzes()->count();
        $rate = $structure->rates()->count();
        $ratePos = $structure->rates()->where('answer', true)->count();
        $rateNeg = $structure->rates()->where('answer', false)->count();
        return view('dashboard', compact(
            'company',
            'place',
            'user',
            'quiz',
            'rate',
            'ratePos',
            'rateNeg',
        ));
    }
}
