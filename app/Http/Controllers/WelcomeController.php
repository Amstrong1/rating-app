<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Quiz;
use App\Models\Rate;
use App\Models\User;
use App\Models\Order;
use App\Models\Answer;
use App\Models\PlaceQuiz;
use App\Models\Structure;
use App\Mail\UserRatedMail;
use App\Models\Appreciation;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Notifications\UserRated;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class WelcomeController extends Controller
{
    public function index(Request $request, $user_id)
    {

        if ($request->method() == 'POST') {

            if ($request->form_type == 'classic') {

                $structure = Structure::find($request->structure);

                $admins = User::where('role', 'admin')->where('structure_id', $structure->id)->get();

                // if (distance($request->latitude, $request->longitude, $structure->latitude, $request->longitude) <= 800) {

                $rate = new Rate();
                $rate->structure_id = $request->structure;
                $rate->user_id = $request->user;
                // $rate->quiz_id = $request->input('quiz_id' . $i);
                // $rate->answer = $request->input('answer' . $i);
                $rate->rater_name = $request->name;
                $rate->rater_contact = $request->contact;
                $rate->rater_email = $request->email;
                $rate->room = $request->room;
                $rate->save();

                for ($i = 0; $i < $request->quizzes; $i++) {
                    $answer = new Answer();
                    $answer->rate_id = $rate->id;
                    $answer->structure_id = $request->structure;
                    $answer->answer = $request->input('answer' . $i);
                    $answer->quiz_id = $request->input('quiz_id' . $i);
                    $answer->save();
                }

                if ($request->appreciation !== null) {
                    $appreciation = new Appreciation();
                    $appreciation->rate_id = $rate->id;
                    $appreciation->user_id = $request->user;
                    $appreciation->structure_id = $request->structure;
                    $appreciation->appreciation = $request->appreciation;
                    $appreciation->save();
                }

                $user = User::find($request->user);

                foreach ($admins as $admin) {

                    $admin->notify(new UserRated());

                    Mail::to($admin->email)->send(new UserRatedMail($admin->name, $structure->name, $user->place->name));
                }
            }

            return redirect('done');
        }

        $user = User::find($user_id);
        $structure = $user->structure;
        $quizzes_id = PlaceQuiz::where('place_id', $user->place_id)->get('quiz_id');
        $quizzes = new EloquentCollection();
        foreach ($quizzes_id as $quiz) {
            $quizzes[] = Quiz::where('id', $quiz->quiz_id)->where('status', '1')->get();
        }
        $quizzes = $quizzes->collapse();
        return view('welcome', compact('user', 'structure', 'quizzes'));
    }


    public function voice(Request $request)
    {

        $fileName = time() . '.' . $request->audio->extension();
        $request->audio->move(public_path('storage'), $fileName);

        $path = $fileName;

        $file = new File();
        $file->audio = $path;
        $file->structure_id = $request->structure;
        $file->user_id = $request->user;
        $file->contact = $request->contact;
        if ($file->save()) {
            Alert::toast("Merci de votre attention", 'success');
            return redirect('done');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return back();
        }
    }

    public function order(Request $request)
    {
        $order = new Order();
        $order->structure_id = $request->structure;
        $order->name = $request->name;
        $order->contact = $request->tel;
        $order->product = $request->product;
        $order->quantity = $request->quantity;
        $order->description = $request->description;
        $order->delay = $request->delay;

        if ($request->image !== null) {
            $fileName = time() . '.' . $request->audio->extension();
            $request->audio->move(public_path('storage'), $fileName);
            $order->image = $request->image;
        }

        if ($order->save()) {
            Alert::toast("Commande enregistré", 'success');
            return redirect('order-done');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return back();
        }
    }

    public function complain(Request $request)
    {
        $complain = new Complain();
        $complain->structure_id = $request->structure;
        $complain->name = $request->name;
        $complain->contact = $request->tel;
        $complain->complain = $request->complain;

        if ($complain->save()) {
            Alert::toast("Plainte enregistrée", 'success');
            return redirect('complain-done');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return back();
        }
    }
}
