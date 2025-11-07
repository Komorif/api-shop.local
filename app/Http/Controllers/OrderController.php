<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Http\Resources\OrderResource;
use Auth;

class OrderController extends Controller
{
    public function index(Order $order)
    {
        $user = Auth::user();
        $order = $order->where("user_id", $user->id)->get();
        return OrderResource::collection($order);
    }   
}
