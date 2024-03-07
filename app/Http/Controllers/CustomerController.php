<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MessageCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Rate::select('rater_email', 'rater_contact', 'rater_name', 'id')
            ->distinct()
            ->get();
        return view('app.customers.index',
            [
                'customers' => $customers,
                'my_attributes' => $this->customer_columns(),
            ]
        );
    }

    public function create()
    {
        return view('app.customers.create', [
            'my_fields' => $this->customer_fields()
        ]);
    }

    public function store(Request $request)
    {
        $customers = [];

        foreach ($request->customers as $customer) {
            $customers['rater_name'] = Rate::where('id', $customer)->first()->rater_name; 
            $customers['rater_email'] = Rate::where('id', $customer)->first()->rater_email; 
        }

        $messages = new Message();
        $messages->names = implode(', ', $customers['rater_name']);
        $messages->subject = $request->subject;
        $messages->message = $request->message;

        $data = [
            'subject' => $request->subject,
            'message' => $request->message,
            'company' => Auth::user()->structure->name
        ];

        if ($messages->save()) {
            foreach ($customers as $customer) {
                Mail::to($customer['rater_email'])->send(new MessageCustomer($data));
            }
            Alert::toast("Messages envoyés", 'success');
            return back();
        }
    }

    private function customer_columns()
    {
        return [
            'rater_name' => 'Nom et Prénom',
            'rater_contact' => 'Contact',
            'rater_email' => 'Email',
        ];
    }

    private function customer_fields()
    {
        $customers = Rate::select('rater_email', 'rater_contact', 'rater_name', 'id')
            ->distinct()
            ->get();
        $fields = [
            'customers' => [
                'title' => 'Client(s)',
                'field' => 'multiple-select',
                'options' => $customers
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
