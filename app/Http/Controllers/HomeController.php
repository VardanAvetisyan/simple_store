<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function getProducts()
    {
        $products = Product::select(['id', 'name', 'price'])->get()->toArray();

        return response()->json($products);
    }

    public function order(Request $request)
    {
        $data = [];
        if ($request->has('product')) {
            foreach ($request->product as $key => $product) {
                $data[$key] = [
                    'name' => $product,
                    'id' => $request->id[$key],
                    'qty' => $request->qty[$key]
                ];
            }
        } else {
            return back();
        }
        session()->put('order', $data);
        return redirect(route('checkout'));
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function checkoutSend(Request $request)
    {
        $error = '';
        DB::beginTransaction();
        try {
            $id = Order::saveOrder($request->all());
            $amount = OrderProduct::saveProducts(session()->get('order'), $id);

            $token = $this->setApikey($request->card);
            $this->payment($token, $amount);
            
            Order::where('id', $id)->update(['status' => Order::PAYED_ORDER]);

            DB::commit();
            session()->forget('orders');

            return redirect(route('home'))->with('success', 'Order is successfully payed');
        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect(route('home'))->with('error', $e->getMessage());
        }


    }

    protected function setApikey($data)
    {
        Stripe::setApiKey(env('STRIPE_API_KEY'));

        $p = \Stripe\Token::create(array(
            "card" => array(
                "number" => $data['number'],
                "exp_month" => $data['month'],
                "exp_year" => $data['year'],
                "cvc" => $data['cvv']
            )
        ));
        return $p->id;
    }

    protected function payment($token, $amount)
    {

        $charge = \Stripe\Charge::create(array(
            "amount" => $amount,
            "currency" => "usd",
            "description" => "Example charge",
            "source" => $token,
        ));
    }
}
