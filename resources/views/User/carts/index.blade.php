@extends('User.layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">CART</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Your Shopping Cart</h2>
        @if (isset($cartItems) && $cartItems->count() > 0)
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Menu Item</th>
                        <th>Quantity</th>
                        <th>Price (each)</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $order_total = 0; @endphp

                    @foreach ($cartItems as $cart)
                        @php
                            $item_total = $cart->price * $cart->quantity;
                            $order_total += $item_total;
                        @endphp

                        <tr>
                            <td>{{ $cart->menuItem->name }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>{{ $item_total }}</td>
                            <td>
                                <form class="increase-form" action="{{ route('cart.increase', $cart->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-sm btn-success">+</button>
                                </form>

                                <form class="decrease-form" action="{{ route('cart.decrease', $cart->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">−</button>
                                </form>

                                <form class="delete-form" action="{{ route('carts.destroy', $cart->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure?')">🗑️</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    <tr class="table-light fw-bold">
                        <td colspan="3" class="text-center fw-bold">Total Order</td>
                        <td colspan="2">EGP {{ $order_total }}</td>
                    </tr>

                    <tr>
                        <td colspan="5" class="text-end">
                            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                            <a href="{{ route('pages.menu') }}" class="btn btn-secondary">Back to Menu</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>

@endsection
@section('scripts')

    <script>

        $(document).ready(function () {
            $(document).on('submit', '.increase-form', function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        location.reload();
                        // console.location();
                    },
                    error: function () {
                        alert('Error increasing quantity');
                    }
                });
            });

            $(document).on('submit', '.decrease-form', function (e) {
                e.preventDefault();
                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        location.reload();
                    },
                    error: function () {
                        alert('Error decreasing quantity');
                    }
                });
            });

            $(document).on('submit', '.delete-form', function (e) {
                e.preventDefault();
                if (!confirm('Are you sure?')) return;

                let form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        location.reload();
                    },
                    error: function () {
                        alert('Error deleting item');
                    }
                });
            });
        });


    </script>

@endsection
