<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Quiz;
use App\Models\Rate;
use App\Models\User;
use App\Models\PlaceQuiz;
use App\Models\Structure;
use Illuminate\Http\Request;
use App\Notifications\UserRated;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class WelcomeController extends Controller
{
    public function index(Request $request, $user_id)
    {
            //dd($request->file('audio'));
            if ($request->method() == 'POST') {

                if ($request->form_type == 'classic') {
                    $structure = Structure::find($request->structure);
                $admins = User::where('role', 'admin')->where('structure_id', $structure->id)->get();

                // if (distance($request->latitude, $request->longitude, $structure->latitude, $request->longitude) <= 800) {
                    for ($i = 0; $i < $request->quizzes; $i++) {
                        $rate = new Rate();
                        $rate->structure_id = $request->structure;
                        $rate->user_id = $request->user;
                        $rate->quiz_id = $request->input('quiz_id' . $i);
                        $rate->answer = $request->input('answer' . $i);
                        $rate->description = $request->input('description' . $i);
                        if ($rate->save()) {
                            Alert::toast("Merci de votre attention", 'success');

                            foreach ($admins as $admin) {
                                $admin->notify(new UserRated());
                            }
                        } else {
                            Alert::toast('Une erreur est survenue', 'error');
                        }
                    }
                // } else {
                //     Alert::toast('Vérifier votre position géographique', 'error');
                // }
                } else {

                    $fileName = time() . '.' . $request->audio->extension();
                    // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
                    
                    $request->audio->move(public_path('storage'), $fileName);
                    
                    $path = $fileName;
                    
                    $file = new File();
                    $file->file = $path;
                    $file->structure_id = $request->structure;
                    $file->user_id = $request->user;
                    if ($file->save()) {
                        Alert::toast("Merci de votre attention", 'success');

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


        public function voice(Request $request){

           // dd($request->all());
           $fileName = time() . '.' . $request->audio->extension();
                    // $path = $request->file('logo')->storeAs('logos', $fileName, 'public');
                    
                    $request->audio->move(public_path('storage'), $fileName);
                    
                    $path = $fileName;
                    
                    $file = new File();
                    $file->file = $path;
                    $file->structure_id = $request->structure;
                    $file->user_id = $request->user;
                    if ($file->save()) {
                        Alert::toast("Merci de votre attention", 'success');

                    } else {
                        Alert::toast('Une erreur est survenue', 'error');
                    }
        }
}
