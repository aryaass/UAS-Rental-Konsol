@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<style>
    body{
        background-image: url("../images/Wallpaper-hitam.png");
        background-size: 100%;
        color: white;
    }
    table{
        text-align:center;
        width: 100%;
    }
</style>

<div>
    <div class="row md-3">
        <div class="col mb-4">
            <div class="mt-5" style="text-align: center;">
                <h1>Shopping Cart</h1>
            </div>
            <div class="mt-2 mb-4" style="text-align: center;">
                <h5>Status: {{ $order->status }}</h5>
            </div>
            @if ($status!=null)
            <div class="alert alert-warning w-50 container-fluid" role="alert">
                {{ $status }}
            </div>    
            @endif

            <table id="myTable" class="display table table-striped table-dark table-bordered table-hover w-50 container-fluid">
                <thead class="thead-light">
                    <tr>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($consoles as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <table id="myTable" class="display table table-striped table-dark table-bordered table-hover w-50 container-fluid">
                <thead class="thead-light">
                    <tr>
                        <th>Total Harga</th>
                        <th>Rp. {{ $totalPrice }}</th>
                    </tr>
                </thead>
            </table>

            <form action="/console/order" method="POST" class="text-center">
                @csrf
                <input type="hidden" name="orderId" value="{{ $order->id }}">
                <input type="hidden" name="userId" value="{{ $user->id }}">
                <input type="hidden" name="totalPrice" value="{{ $totalPrice }}">
                <div class="mt-4">
                    <h5 >Durasi: <input size="1" class="btn btn-light" name="duration" type="text" {{ $input_duration }} value="{{ $order->duration }}">Days</h5>
                    @error('duration')
                        <p style="color: #ff8181;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" name="btn" value="statusOrder" {{ $btn_statusOrder }} class="btn btn-primary btn-sm">Siap di Pick Up</button>
                <button type="submit" name="btn" value="order" class="btn btn-success btn-sm ">Order</button>
                <button type="submit" name="btn" value="clear" {{ $btn_clear }} class="btn btn-danger btn-sm ">Clear Cart</button>
            </form>

        </div>
    </div>
</div>

{{-- <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script> --}}
@endsection
