<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\NewCollaboratorMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CollaboratorStoreRequest;
use App\Http\Requests\CollaboratorUpdateRequest;

class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.collaborator.index', [
            'collaborators' => $structure->users()->where('role', 'collaborator')->get(),
            'my_actions' => $this->collaborator_actions(),
            'my_attributes' => $this->collaborator_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.collaborator.create', [
            'my_fields' => $this->collaborator_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorStoreRequest $request)

    {

        $newPassword = Str::random(8);
        $structure = Auth::user()->structure;
        $collaborator = new User();

        $collaborator->structure_id = Auth::user()->structure_id;
        $collaborator->name = $request->name;
        $collaborator->email = $request->email;
        $collaborator->role = 'collaborator';
        $collaborator->password = bcrypt($newPassword);
        
        Mail::to($request->email)->send(new NewCollaboratorMail($newPassword,$request->name,$request->email, $structure->name));

        if ($collaborator->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('collaborator');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $collaborator)
    {
        return view('app.collaborator.edit', [
            'collaborator' => $collaborator,
            'my_fields' => $this->collaborator_fields()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorUpdateRequest $request, User $collaborator)
    {
        $collaborator = User::find($collaborator->id);

        $collaborator->name = $request->name;
        $collaborator->email = $request->email;

        if ($collaborator->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('collaborator');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $collaborator)
    {
        try {

            $collaborator = $collaborator->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('collaborator');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function collaborator_columns()
    {
        $columns = (object) array(
            'name' => 'Nom Complet',
            'email' => "Email",
        );
        return $columns;
    }

    private function collaborator_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            'delete' => "Supprimer",
        );
        return $actions;
    }

    private function collaborator_fields()
    {
        $fields = [
            'name' => [
                'title' => 'Nom Complet',
                'field' => 'text'
            ],
            'email' => [
                'title' => 'Email',
                'field' => 'text'
            ],
            
        ];
        return $fields;
    }
}
