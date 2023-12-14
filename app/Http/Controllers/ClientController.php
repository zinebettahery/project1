<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
{
    
 
    $users = DB::table('users')
            ->whereNotNull('adresse')
            ->get();
    return view('clients.index', compact('users'));
}

public function show($id)
{
    $clients = Client::select('clients.name as nom_client', 'clients.id as id_clients', 'clients.email','orders.quantity as q', 'orders.created_at as date_com','p.name as p')
    ->join('orders', 'orders.client_id', '=', 'clients.id')
    ->leftJoin('products as p', 'p.id', '=', 'orders.product_id')
    ->where('clients.id', '=', $id)
    ->get();

    return view('clients.show', compact('clients'));
}

}
