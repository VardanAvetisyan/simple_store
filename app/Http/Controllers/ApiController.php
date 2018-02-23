<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deleteProductFromOrder(Request $request)
    {
        $orderProduct = OrderProduct::where('id', $request->id)->first();
        if (!empty($orderProduct)) {
            $orderProduct->remove();
        }
        return json_encode([
            'success' => true
        ]);
    }
}
