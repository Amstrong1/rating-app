<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.user.index', [
            'users' => $structure->users()->get(),
            'my_actions' => $this->user_actions(),
            'my_attributes' => $this->user_columns(),
        ]);
    }

    public function create()
    {
        return view('app.user.create', [
            'my_fields' => $this->user_fields()
        ]);
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User();

        $user->structure_id = Auth::user()->structure_id;
        $user->name = $request->name;
        $user->place_id = $request->place;
        $user->role = 'user';

        if ($user->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('user');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    public function show(User $user)
    {
        $qrcode = QrCode::size(200)->generate(str_replace('/user', '', url()->current()));
        $rates = $user->rates()->get();
        return view('app.user.show', [
            'user' => $user,
            'qrcode' => $qrcode,
            'rates' => $rates,
            'my_attributes' => $this->rates_columns(),
        ]);
    }

    public function edit(User $user)
    {
        return view('app.user.edit', [
            'user' => $user,
            'my_fields' => $this->user_fields(),
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user = User::find($user->id);

        $user->name = $request->name;
        $user->place_id = $request->place;

        if ($user->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('user');
        };
    }

    public function destroy(User $user)
    {
        try {
            $user = $user->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('user');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function user_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'place_name' => "Poste",
        );
        return $columns;
    }

    private function rates_columns()
    {
        $columns = (object) array(
            'question' => 'Question',
            'yes_percent' => "Pourcentage réponses positives",
            'no_percent' => "Pourcentage réponses négatives",
        );
        return $columns;
    }

    private function user_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function user_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom',
                'field' => 'text'
            ],
            'place' => [
                'title' => 'Poste',
                'field' => 'model',
                'options' => Place::where('structure_id', Auth::user()->structure_id)->get(),
            ],
        ];
        return $fields;
    }
}
