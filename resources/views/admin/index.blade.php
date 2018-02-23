@extends('layouts/admin')

@section('content')
    <h1>Orders</h1>
    <table class="table">
        <thead>
        <tr>
            <th width="*">OrderId</th>
            <th width="*">User Name</th>
            <th width="*">Email</th>
            <th width="10%">Address</th>
            <th width="10%">Status</th>
            <th width="10%">Created date</th>
        </tr>
        </thead>
        @if(!empty($orders))
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->username }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->creted_at }}</td>
                </tr>
                @if($order->orderProduct)
                    <tr>
                        <td colspan="5">
                            Product list
                            <div v-bind:class="['product-list', {'open' : showProductList=={{ $order->id }}}]">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="*">Product Name</th>
                                        <th width="*">Price</th>
                                        <th width="*">QTY</th>
                                    </tr>
                                    </thead>
                                @foreach($order->orderProduct as $product)
                                    <tr>
                                        <td>{{ $product->getProduct->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->qty }}</td>

                                    </tr>
                                @endforeach
                                </table>
                            </div>
                        </td>
                        <td class="product-actions">
                            <span class="show-product-list" v-on:click="showProductList={{ $order->id }}">+</span>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endif
    </table>

@endsection