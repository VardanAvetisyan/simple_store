<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const NEW_ORDER = 0;
    const PAYED_ORDER = 1;

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct', 'order_id');
    }

    public static function saveOrder($data)
    {
        $model = new self();
        $model->username = $data['name'];
        $model->email = $data['email'];
        $model->address = $data['address'];

        if (!$model->save()) {
            throw new \Exception('Something went wrong');
        }
        return $model->id;
    }
}
