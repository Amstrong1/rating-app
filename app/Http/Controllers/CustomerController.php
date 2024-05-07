<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Mail\MessageCustomer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Rate::where('structure_id', Auth::user()->structure_id)
            ->where('rater_email', '!=', null)
            ->select('rater_name','id','rater_email','rater_contact','structure_id')
            ->get();

        //dd($customers);

        return view('app.customers.index', [
            'customers' => $customers,
            'my_attributes' => $this->customer_columns(),
        ]);

    }

    public function create()
    {
        return view('app.customers.create', [
            'my_fields' => $this->customer_fields()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'subject' => 'required|string|max:150',
            'message' => 'required',
        ]);

        $customers = [];

        if ($request->customers == null) {
            $allCustomers = Rate::select('rater_name', 'id', 'rater_email')
                ->where('structure_id', Auth::user()->structure_id)
                ->where('rater_email', '!=', null)
                ->get();
        }

        $selectedCustomers = $request->customers ?? $allCustomers;

        foreach ($selectedCustomers as $customer) {
            $customers['rater_name'][] = Rate::where('id', $customer)->first()->rater_name ?? $customer->rater_name;
            $customers['rater_email'][] = Rate::where('id', $customer)->first()->rater_email ?? $customer->rater_email;
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
            for ($i = 0; $i < count($customers['rater_email']); $i++) {
                Mail::to($customers['rater_email'][$i])->send(new MessageCustomer($data));
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
        $customers = Rate::select('rater_name', 'id')
            ->where('structure_id', Auth::user()->structure_id)
            ->where('rater_email', '!=', null)
            ->distinct('rater_email')
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
