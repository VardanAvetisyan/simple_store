<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('/admin/index', [
            'orders' => $orders
        ]);
    }

    public function logout()
    {
        \Auth::logout();
        return redirect(route('admin.dashboard'));
    }
}
