@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<style>
    body{
        background-image: url("../images/Wallpaper-hitam.png");
        background-size: 100%;
        color: white;
    }
</style>

<div>
    <div class="row md-3">
        <div class="col">
            <div class="mt-5" style="color:white; text-align: center;">
                <h1>History Order</h1>
            </div>
            @if ($status!=null)
            <div class="alert alert-warning" role="alert">
                {{ $status }}
            </div>    
            @endif
            
            <div>
                <div class="row row-cols-md-3" >
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($history as $item)
                    <div class="col mb-4">
                            <div data-aos="fade-up" class="kartu">
                                <!-- <h3 class="cardTitle">{{ ($i++).'. '.$item->date }}</h3> -->
                                <h3 style="color: #cf7bff; class="cardTitle">{{ $item->date }}</h3>
                                <p style="color: #45e3ff;">List Console Ordered: </p>
                                <span class="cardInfo">
                                    @foreach ($item->consoles as $consoleName)
                                        <p>{{ $consoleName }}</p>
                                    @endforeach
                                </span>
                                <p style="color: #ff5a5a;">Duration : {{ $item->duration }}</p>
                                <p style="color: #ffc445;">Total Price : {{ $item->total_price }}</p>
                                <p style="color: #00ff55;">Status : {{ $item->status }}</p>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>List Consoles</th>
                        <th>Duration (day)</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->id_user }}</td>
                        <td>
                            @foreach ($row->consoles as $consoleName)
                                <p>{{ $consoleName }}</p>
                            @endforeach
                        </td>
                        <td>{{ $row->duration }}</td>
                        <td>{{ $row->status }}</td>
                        <td>Rp. {{ $row->total_price }}</td>
                        <td>{{ $row->date }}</td>
                        <td>
                            <span>
                                <a href="/admin/orders/action/{{ $row->id }}" class="btn btn-success">Details</a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>List Consoles</th>
                        <th>Duration</th>
                        <th>Total Price</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table> --}}

        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script> --}}
@endsection
