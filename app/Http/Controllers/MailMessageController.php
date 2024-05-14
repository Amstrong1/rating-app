<?php

namespace App\Http\Controllers;

use App\Mail\MessageMail;
use App\Models\Structure;
use App\Models\MailMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.mailMessage.index', [
            'mailMessages' => MailMessage::all(),
            'my_actions' => $this->mailMessage_actions(),
            'my_attributes' => $this->mailMessage_columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.mailMessage.create', [
            'my_fields' => $this->mailMessage_fields()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required'],
        ]);

        if ($request->structures == null) {
            $structures = Structure::all();
        } else {
            $structures = $request->structures;
        }

        $mailMessage = new MailMessage();

        $mailMessage->subject = $request->subject;
        $mailMessage->message = $request->message;

        foreach ($structures as $structure) {
            Mail::to($structure->email)->send(new MessageMail($mailMessage->subject, $mailMessage->message));
        }

        if ($mailMessage->save()) {
            Alert::toast("Données enregistrées", 'success');
            return redirect('message');
        } else {
            Alert::toast('Une erreur est survenue', 'error');
            return redirect()->back()->withInput($request->input());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MailMessage $mailMessage)
    {
        return view('app.mailMessage.edit', [
            'mailMessage' => $mailMessage,
            'my_fields' => $this->mailMessage_fields(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailMessage $mailMessage)
    {
        return view('app.mailMessage.edit', [
            'mailMessage' => $mailMessage,
            'my_fields' => $this->mailMessage_fields(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MailMessage $mailMessage)
    {
        $mailMessage = new MailMessage();

        $mailMessage->subject = $request->subject;
        $mailMessage->message = $request->message;

        if ($mailMessage->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('message');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailMessage $mailMessage)
    {
        try {
            $mailMessage = $mailMessage->delete();
            Alert::success('Opération effectuée', 'Suppression éffectué');
            return redirect('mailMessage');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Element introuvable');
            return redirect()->back();
        }
    }

    private function mailMessage_columns()
    {
        $columns = (object) array(
            'message' => 'Message',
            'formatted_date' => 'Date',
        );
        return $columns;
    }

    private function mailMessage_actions()
    {
        $actions = (object) array(
            'edit' => 'Modifier',
            // 'delete' => "Supprimer",
        );
        return $actions;
    }

    private function mailMessage_fields()
    {
        $fields = [
            'structures' => [
                'title' => 'Structures',
                'field' => 'multiple-select',
                'options' => Structure::all(),
            ],
            'subject' => [
                'title' => 'Objet',
                'field' => 'text',
            ],
            'message' => [
                'title' => 'Message',
                'field' => 'richtext',
                'colspan' => true
            ],
        ];

        return $fields;
    }
}
