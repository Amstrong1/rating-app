<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoiceController extends Controller
{
    public function index(){

        $structure = Auth::user()->structure;
        return view('app.voice.index', [
            'voices' => $structure->files()->get(),
            // 'my_actions' => $this->place_actions(),
            'my_attributes' => $this->voice_columns(),
        ]);
    }
    private function voice_columns()
    {
        $columns = (object) array(
            'user_name' => 'Nom Employé',
            'file' => "Audio",
            'formated_date' => "Date",
        );
        return $columns;
    }
}
