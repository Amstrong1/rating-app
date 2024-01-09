<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class EvaluateController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        $users = $structure->users()->where('role', 'user')->get();

        return view('app.evaluate.index', [
            'users' => $users,
            'voices_attributes' => $this->voice_columns(),
            'comment_attributes' => $this->comment_columns(),
        ]);
    }

    public function voice_columns()
    {
        return [
            'formated_date' => 'Date',
            'audio' => 'Audio',
        ];
    }

    public function comment_columns()
    {
        return [
            'appreciation' => 'Commentaire',
            'formated_date' => 'Date',
        ];
    }
}