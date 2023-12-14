<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }
   public function updateStatus($orderId, Request $request)
   {
       $order = Order::findOrFail($orderId);
       $order->status = $request->input('status');
       $order->save();
   
       // Optionally, you can add additional logic here, such as sending notifications or performing other actions.
   
       return redirect()->back()->with('status', 'Order status updated successfully');
   }
}
