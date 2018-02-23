<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public $timestamps = false;
    protected $table = 'order_product';

    public function getProduct()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public static function saveProducts($data, $orderId) {

        if (empty($data)) {
            throw new \Exception('Empty list');
        }

        $sum = 0;

        foreach ($data as $product) {
            $_product = Product::find($product['id']);
            if (empty($_product)) {
                throw new \Exception('No product');
            }
            $model = new self();
            $model->order_id = $orderId;
            $model->product_id = $product['id'];
            $model->qty = $product['qty'];
            $model->price = $_product->price;

            $sum += $model->qty * $model->price;
            
            if (!$model->save()) {
                throw new \Exception('Something went wrong');
            }
        }

        return $sum;
    }
}
