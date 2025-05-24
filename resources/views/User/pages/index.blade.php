@extends('User.layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meal</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <a href="" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Book A Table</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="img/hero.png" alt="">
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Service Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-4">
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                    <h5>Master Chefs</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                    <h5>Quality Food</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                    <h5>Online Order</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
            <div class="service-item rounded pt-3">
                <div class="p-4">
                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                    <h5>24/7 Service</h5>
                    <p>Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita amet diam</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Service End -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('front/img/about-1.jpg') }}">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('front/img/about-2.jpg')}}" style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('front/img/about-3.jpg')}}">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('front/img/about-4.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                            <div class="ps-4">
                                <p class="mb-0">Years of</p>
                                <h6 class="text-uppercase mb-0">Experience</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                            <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                            <div class="ps-4">
                                <p class="mb-0">Popular</p>
                                <h6 class="text-uppercase mb-0">Master Chefs</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
            </div>
        </div>
    </div>
</div>

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

<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                        allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
