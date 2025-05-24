@extends('User.layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Confirmation</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Order Confirmation</li>
                </ol>
            </nav>
        </div>
    </div>
     <div class="container py-5">

        <h2>Order Confirmation</h2>
        <p>Thank you! Your order has been placed successfully.</p>
        <p>Order Number: {{ $order->id }}</p>
        <p>Total Price: EGP {{ $order->total_price }}</p>

        <h4>Order Details:</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Menu Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
      <tbody>
    @foreach ($order->order_details as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->quantity_price }}</td>
        </tr>
    @endforeach
    <tr class="fw-bold">
        <td colspan="3" class="text-end">Total Amount</td>
        <td>EGP {{ $order->total_price }}</td>
    </tr>
</tbody>

    </table>

    <p>You can track your order status from <a href="{{ route('order.tracking',$order->id)}}">Track your Order</a>.</p>
    </div>
@endsection
