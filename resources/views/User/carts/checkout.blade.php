@extends('User.layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Order Checkout</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Check out </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container py-5">
        <div>
            @include('inc.message')
        </div>
        <h2 class="mb-4">Review Your Order</h2>

        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Menu Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td>{{ $item->menuItem->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                @endforeach
                <tr class="fw-bold">
                    <td colspan="3" class="text-center">Total Price</td>
                    <td>EGP {{ $total }}</td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('order.confirm') }}" method="POST">
            @csrf
            <div class="text-end">
                <button type="submit" class="btn btn-success">Confirm Order</button>
                <a href="{{ route('carts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
