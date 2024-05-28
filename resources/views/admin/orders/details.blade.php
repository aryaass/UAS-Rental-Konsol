@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<style>
    .tulisan{
        font-family: "roboto";
    }
</style>

<div class="sec1">
    <div class="container">
        <div class="row py-5 ml-2 mt-4">

            <div class="col-md-7 col-lg-6 ml-auto cube1">
                <h1 class="mb-4 mt-4 d-flex" style="color: #5b4f47;">Details Order</h1>
                <div class="row">

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                ID Order
                            </span>
                        </div>
                        <pre class="form-control bg-white border-left-0 border-md">{{ $order->id }}</pre>
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Consoles
                            </span>
                        </div>
                        <textarea class="form-control bg-white border-left-0 border-md">
                            @foreach ($order->consoles as $consoleName)
                            <?=$consoleName?>
                            @endforeach
                        </textarea>
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Duration
                            </span>
                        </div>
                        <pre class="form-control bg-white border-left-0 border-md">{{ $order->duration }}</pre>
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Date
                            </span>
                        </div>
                        <pre class="form-control bg-white border-left-0 border-md">   {{ $order->date }}</pre>
                    </div>

                    <form action="/admin/orders/actionValidity" method="POST" class="input-group col-lg-12 mb-2 ">
                        @csrf
                        <div class="input-group col-lg-14 mb-2 tulisan">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border">
                                    Status&nbsp;&nbsp;&nbsp;
                                </span>
                            </div>
                            <select name="newStatus" class="form-control bg-white border-left-0 border-md">
                                <option selected>{{ $order->status }}</option>
                                @if ($availableStatus!=null)
                                <option>{{ $availableStatus }}</option>    
                                @endif
                            </select>
                        </div>
                        <input type="hidden" name="id" value="{{ $order->id }}">
                        <input type="hidden" name="oldStatus" value="{{ $order->status }}">
                        <div class="form-group w-100 mb-2 mt-2">
                            <button type="submit" name="btn" value="Action Validity" class="btn btn-success btn-block py-2">
                                <span class="font-weight-bold">Submit Status Order</span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-7 col-lg-6 ml-auto cube1">
                <h1 class="mb-4 mt-4 d-flex" style="color: #5b4f47;">Details Customer</h1>
                <div class="row">

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Name
                            </span>
                        </div>
                        <input type="text" value="&nbsp;&nbsp;&nbsp;&nbsp;{{ $customer->name }}" disabled class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Email
                            </span>
                        </div>
                        <input type="text" value="&nbsp;&nbsp;&nbsp;&nbsp;{{ $customer->email }}" disabled class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Phone
                            </span>
                        </div>
                        <input type="text" value="&nbsp;&nbsp;&nbsp;{{ $customer->phone_number }}" disabled class="form-control bg-white border-left-0 border-md">
                    </div>

                    <div class="input-group col-lg-12 mb-2 tulisan">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border">
                                Address
                            </span>
                        </div>
                        <input type="text" value="{{ $customer->address }}" class="form-control bg-white border-left-0 border-md">
                    </div>

                </div>
            </div>

            <!-- Cancel Button -->
            <div class="form-group col-lg-12 mb-2">
                <a href="/admin/orders" class="btn btn-danger btn-block py-2">
                    <span class="font-weight-bold">Go Back</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
