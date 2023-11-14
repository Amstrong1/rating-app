<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class EvaluateController extends Controller
{
    public function index(Request $request)
    {
        $structure = Auth::user()->structure;
        $users = $structure->users()->get();
        $voices = $structure->files()->get();
        $evaluates = new EloquentCollection();
        $descriptions = new EloquentCollection();
        $voices = new EloquentCollection();

        if ($request->method() == 'POST') {
            foreach ($users as $user) {
                if ($user->rates()->count() !== 0) {
                    $evaluates[] = $structure->rates()->where('user_id', $user->id)->orderBy('id', $request->sortType)->first();
                    $descriptions[] = $structure->appreciations()->where('user_id', $user->id)->orderBy('id', $request->sortType)->get();
                    $voices[] = $structure->files()->where('user_id', $user->id)->orderBy('id', $request->sortType)->first();
                }
    
                // $descriptions = $descriptions->collapse();
            }
        } else {
            foreach ($users as $user) {
                if ($user->rates()->count() !== 0) {
                    $evaluates[] = $structure->rates()->where('user_id', $user->id)->orderBy('id', 'desc')->first();
                    $descriptions[] = $structure->appreciations()->where('user_id', $user->id)->orderBy('id', 'desc')->get();
                    $voices[] = $structure->files()->where('user_id', $user->id)->orderBy('id', 'desc')->first();
                }
    
                $descriptions = $descriptions->collapse();
            }
        }        
        
        return view('app.evaluate.index', [
            'evaluates' => $evaluates,
            'descriptions' => $descriptions,
            'voices' => $voices,
        ]);
    }
}
