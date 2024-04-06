<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Mail\ChatMail;
use App\Models\Structure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $structure = Auth::user()->structure;

        $messages = Chat::where('category',$structure->type)
                            ->with('structure')
                            ->get();

        
        return view('app.chat.index',compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
            // dd($request->all());
            $structure = Auth::user()->structure;

            $chat = new Chat();
            $chat->category = $structure->type;
            $chat->message = $request->message;
            $chat->structure_id = $structure->id;
          

            $structures_emails = Structure::where('type', $structure->type)->pluck('email')->toArray(); 

            foreach ($structures_emails as $email) {
                Mail::to($email)->send(new ChatMail($structure->name, Auth::user()->name));
                Mail::to('romuald91303142@gmail.com')->send(new ChatMail($structure->name, Auth::user()->name));
            }
            if ( $chat->save()) {
                Alert::toast("Message envoyé avec succés", 'success');
                return back();
            } else {
                Alert::toast('Une erreur est survenue', 'error');
                return redirect()->back()->withInput($request->input());
            }
            
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
