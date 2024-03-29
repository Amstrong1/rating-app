<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class UserPrintController extends Controller
{
    public function print($user)
    {
        User::find($user);
        //  $qrcode = QrCode::size(200)->generate(str_replace('user/print', 'site', url()->current()));
        $qrcode = QrCode::size(200)->generate(str_replace('user/print2', 'y$10$wHsZAdDo8uF2YZpyoZiQesGDTOdXRh1BQjFcTs', url()->current()));

        $pdf = PDF::loadView('app.user.print2', compact('user', 'qrcode'));
        return $pdf->stream();
    }
}
