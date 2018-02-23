@extends('layouts/layout')

@section('content')

    @if(session()->has('error'))
        <div style="color:red">{{ session()->get('error') }}</div>
    @elseif(session()->has('success'))
        <div style="color:green">{{ session()->get('success') }}</div>
    @endif

    <cart-form action="{{ route('user.order') }}" token="{{ csrf_token() }}"></cart-form>


@endsection