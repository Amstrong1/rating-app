<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structure = Auth::user()->structure;
        return view('app.order.index', [
            'orders' => $structure->orders()->get(),
            'my_actions' => $this->order_actions(),
            'my_attributes' => $this->order_columns(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('app.order.show', [
            'order' => $order,
            'my_fields' => $this->order_fields(),
        ]);
    }
    public function edit(Order $order)
    {
        return view('app.order.edit', [
            'order' => $order,
            'my_fields' => $this->order_fields(),
        ]);
    }

    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;

        if ($order->save()) {
            Alert::toast('Les informations ont été modifiées', 'success');
            return redirect('order');
        };
    }


    private function order_columns()
    {
        $columns = (object) array(
            'name' => 'Nom',
            'contact' => "contact",
            'product' => "Produit",
            'quantity' => "Quantité",
            'formatted_delay' => "Delai",
            'status' => "Statut",
        );
        return $columns;
    }

    private function order_actions()
    {
        $actions = (object) array(
            'show' => 'Voir',
            'edit' => 'Modifier',
        );
        return $actions;
    }

    private function order_fields()
    {
        if (Route::currentRouteName() == 'order.show') {    
            $fields = [
                'name' => [
                    'title' => 'Nom',
                    'field' => 'text'
                ],
                'contact' => [
                    'title' => 'Contact',
                    'field' => 'tel'
                ],
                'product' => [
                    'title' => 'Produit',
                    'field' => 'text'
                ],
                'quantity' => [
                    'title' => 'Quantité',
                    'field' => 'number'
                ],
                'delay' => [
                    'title' => 'Délai',
                    'field' => 'date'
                ],
                'description' => [
                    'title' => 'Description',
                    'field' => 'textarea'
                ],
            ];
        }

        if (Route::currentRouteName() == 'order.edit') {    
            $fields = [
                'status' => [
                    'title' => 'Statut',
                    'field' => 'select',
                    'options' => [
                        'En attente' => 'En attente',
                        'Termine' => 'Termine', 
                        'Annule' => 'Annule',
                    ]
                ],
            ];
        }
        return $fields;
    }
}
