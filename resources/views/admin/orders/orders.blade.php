@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<style>
    .tulisan{
        font-family: "roboto";
    }
</style>

<div>
    <div class="row md-3" style="background-image:url('')">
        <div class="col mb-4">
            <div class="mt-4">
                <h1>Daftar Orders</h1>
            </div>
            @if ($status!=null)
            <div class="alert alert-warning" role="alert">
                {{ $status }}
            </div>    
            @endif
            
            <table id="myTable" class="display table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>List Consoles</th>
                        <th>Duration (day)</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tulisan">
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
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script> --}}
@endsection
