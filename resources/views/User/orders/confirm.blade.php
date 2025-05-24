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
        <div>@include('inc.message')</div>
        <div class="alert alert-success text-center">
            <h2>Thank you for your order!</h2>
            <p>Your order has been placed successfully.</p>
            <p>You can track your order status <a href="{{ route('orders.show', $order->id) }}">here</a>.</p>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                <h4>Invoice #{{ $order->id }}</h4>
                <small>Date: {{ $order->created_at->format('Y-m-d H:i') }}</small>
            </div>

            <div class="card-body">
                <h5>Order Summary</h5>
                <table class="table table-bordered text-center">
                    <thead class="table-secondary">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price (each)</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->menuItem->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->price * $item->quantity }}</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total Amount</td>
                            <td>EGP {{ $order->total }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-end">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary">
                        Track Your Order
                    </a>
                    <a href="{{ route('pages.menu') }}" class="btn btn-secondary">Back to Menu</a>
                </div>
            </div>
        </div>
    </div>
@endsection
