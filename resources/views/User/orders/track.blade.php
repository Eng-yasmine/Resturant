@extends('User.layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Order Tracking</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Tracking</li>
                </ol>
            </nav>
        </div>
    </div>


<div class="container py-5">
    <h2 class="mb-4">Track your Order{{ $order->id }}</h2>

    <div class="card p-4 shadow-sm">
        <h5>Current Status : 
            @php
                $statusColors = [
                    'pending' => 'warning',
                    'processing' => 'info',
                    'shipped' => 'primary',
                    'delivered' => 'success',
                    'cancelled' => 'danger',
                ];
            @endphp
            <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }}">
                {{ ucfirst($order->status) }}
            </span>
        </h5>

        <hr>

        <div class="progress" style="height: 30px;">
            @php
                $statuses = ['pending', 'processing', 'shipped', 'delivered'];
                $currentIndex = array_search($order->status, $statuses);
            @endphp

            @foreach ($statuses as $index => $status)
                <div 
                    class="progress-bar 
                    @if($index <= $currentIndex) bg-success @else bg-light @endif" 
                    role="progressbar" 
                    style="width: 25%; cursor: default;"
                    aria-valuenow="{{ $index <= $currentIndex ? 100 : 0 }}" 
                    aria-valuemin="0" 
                    aria-valuemax="100">
                    {{ ucfirst($status) }}
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between mt-3 px-2">
            @foreach ($statuses as $index => $status)
                <small class="@if($index == $currentIndex) fw-bold text-success @else text-muted @endif">
                    {{ ucfirst($status) }}
                </small>
            @endforeach
        </div>
    </div>
</div>
@endsection



  