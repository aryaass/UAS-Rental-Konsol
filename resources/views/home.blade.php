@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<x-home-image />

<!-- Title Content -->
<div class="container titleContent" id="console"></div>
<h1 class="mainTitle">CONSOLES</h1>
<p class="titleInfo">
    <span id="title1">PROMO!!!</span> MURAH MERIAH
</p>
<p class="titleInfo" style="color: red">
    <span>{{ $status }}</span>
</p>
<!-- Console Card -->
<div>
    <div class="row row-cols-md-3 bg-home" style="background-image:url('{{ asset('/images/Wallpaper-1.png')}}')">
        @foreach ($consoles as $console)
        <div data-aos="fade-down" class="col mb-4">
            <div class="card">
                <img src="{{asset($console->image_link)}}" class="card-img-top consoleImg">
                <div class="card-detail">
                    <h3 class="cardTitle">{{ $console->name }}</h3>
                    <p class="cardInfo">
                        {{ $console->description }}
                    </p>
                </div>
                <div class="text-center">
                    <a class="btn watch-btn" href="/console/addToCart/{{ $console->id }}"><i class="fa fa-cart-plus"></i> Add to Cart</a>
                    <!-- <a class="btn watch-btn" href="/console/details/{{ $console->id }}"><i class="fa fa-info-circle"></i> Details</a> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br><br><br><br><br><br>
<!-- Discover More Button -->

{{-- <div class="container discoverContainer text-center py-5">
    <a href="" class="btn discoverBtn">discover more . . .</a>
</div> --}}
@endsection

{{-- <div data-aos="fade-down" class="col mb-4">
    <div class="card">
        <img src="{{asset('/img/PS4.png')}}" class="card-img-top consoleImg">
<div class="card-detail">
    <h3 class="cardTitle">PlayStation 4</h3>
    <p class="cardInfo">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore dolorem porro facere quibusdam
        alias vel dolores velit at, ullam atque quam, sapiente labore delectus voluptas sequi
        consequatur enim necessitatibus. Optio?
    </p>
</div>
<div class="text-center">
    <a class="btn watch-btn" href=""><i class="fa fa-cart-plus"></i> Add to Cart</a>
</div>
</div>
</div> --}}
