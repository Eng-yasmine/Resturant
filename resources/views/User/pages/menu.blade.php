@extends('User.layouts.app')

@section('content')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Food Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                <h1 class="mb-5">Most Popular Items</h1>
            </div>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                {{-- Show Menu Tabs --}}
                @if ($menus->count())
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        @foreach ($menus as $menu)
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 {{ $loop->first ? 'active' : '' }}"
                                    data-bs-toggle="pill" href="#menu-{{ $menu->id }}">
                                    <i class="fa fa-coffee fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <small class="text-body">Menu</small>
                                        <h6 class="mt-n1 mb-0">{{ $menu->name }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-danger">No Menus Found.</p>
                @endif

                {{-- Show Menu Content --}}
                <div class="tab-content">
                    @foreach ($menus as $menu)
                        <div id="menu-{{ $menu->id }}"
                            class="tab-pane fade {{ $loop->first ? 'show active' : '' }} p-0">
                            @forelse ($menu->categories as $category)
                                <h3 class="text-primary mt-4">{{ $category->name }}</h3>
                                <div class="row g-4">
                                    @forelse ($category->menuItems as $item)
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center">
                                                <img class="flex-shrink-0 img-fluid rounded"
                                                    src="{{ asset('storage/images/' . $item->image) }}"
                                                    alt="{{ $item->name }}" style="width: 80px;">
                                                <div class="w-100 d-flex flex-column text-start ps-4">
                                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                        <span>{{ $item->name }}</span>
                                                        <span class="text-primary">${{ $item->price }}</span>
                                                    </h5>
                                                    <small class="fst-italic">{{ $item->description }}</small>
                                                </div>
                                                <div>
                                                    <form action="{{ route('carts.store') }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                       <input type="hidden" name="menu_item_id" value="{{ $item->id }}">

                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-muted">No items in this category.</p>
                                    @endforelse
                                </div>
                            @empty
                                <p class="text-muted">No categories in this menu.</p>
                            @endforelse
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
