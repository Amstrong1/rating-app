<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NewsletterController extends Controller
{

    public  function save(Request $request){

        $newsletter = new Newsletter();

        $newsletter->email = $request->email;

        $newsletter->save();

       // Alert::toast("Ajout au Newsletter avec succé", 'success');
        return redirect()->back();

    }
}
