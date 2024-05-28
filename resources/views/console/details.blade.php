@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<div class="sec1">
    <div class="container">
        <div class="row py-5 ml-2 mt-4 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-5 mt-5 mb-md-auto">
                <img src="{{ asset($console->image_link) }}" width="450" height="450" alt="Logo Rental" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto cube1">
                <h1 class="mb-4 d-flex justify-content-center" style="color: #5b4f47;">{{ $console->name }}</h1>

                @csrf
                <div class="row">

                    <div class="input-group col-lg-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                Description
                            </span>
                        </div>
                        <input type="text" value="{{ $console->description }}" disabled
                            class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                Price
                            </span>
                        </div>
                        <input type="text" value="{{ $console->price }}" disabled
                            id="password" class="form-control bg-white border-left-0 border-md">
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group col-lg-12 mb-2">
                        <a href="/console/addToCart/{{ $console->id }}" class="btn btn-success btn-block py-2">
                            <span class="font-weight-bold">Add to cart</span>
                        </a>
                    </div>
                    <div class="form-group col-lg-12 mb-2">
                        <a href="/#console" class="btn btn-danger btn-block py-2">
                            <span class="font-weight-bold">Cancel</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
