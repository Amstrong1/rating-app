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
        // $evaluates = new EloquentCollection();
        // $descriptions = new EloquentCollection();
        // $voices = new EloquentCollection();

        // foreach ($users as $user) {
        //     if ($user->rates()->count() !== 0) {
        //         $evaluates[] = $structure->rates()->where('user_id', $user->id)->orderBy('id', 'desc')->first();
        //         $descriptions[] = $structure->appreciations()->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        //     }
        //     if ($user->voices()->count() !== 0) {
        //         $voices[] = $structure->files()->where('user_id', $user->id)->orderBy('id', 'desc')->get();
        //     }
        // }

        return view('app.evaluate.index', [
            // 'evaluates' => $evaluates,
            // 'descriptions' => $descriptions,
            // 'voices' => $voices,
            'users' => $users,
        ]);
    }
}
