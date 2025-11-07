<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebhookRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function store(WebhookRequest $request)
    {
        return response()->json([
            "data"=> $request->all(),
        ]);
    }
    
}
