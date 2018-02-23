@extends('layouts/layout')

@section('content')
    <h1>Checkout</h1>
    <form method="post" action="{{ route('checkout.send') }}">
{{ csrf_field() }}
        <div class="form-group">
            <input class="form-control" name="name" placeholder="Name"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="email" placeholder="Email"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="address" placeholder="Address"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="card[number]" placeholder="Credit card #"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="card[month]" placeholder="Month"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="card[year]" placeholder="Year"/>
        </div>

        <div class="form-group">
            <input class="form-control" name="card[cvv]" placeholder="CVV"/>
        </div>



    <div class="panel panel-default">
        <div class="panel-body">
            <button class="btn btn-success pull-right">Checkout</button>
        </div>
    </div>

    </form>
@endsection