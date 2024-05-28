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
                <h1>Daftar Consoles
                    <a href="/admin/consoles/insert" class="btn btn-primary pull-right">
                        <i class="fa fa-plus-square"></i> Insert Console
                    </a>
                </h1>
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="tulisan">
                    @foreach ($consoles as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->price }}</td>
                        <td>{{ $row->stock }}</td>
                        <td>
                            <span>
                                <a href="/admin/consoles/details/{{ $row->id }}" class="btn btn-info">Details</a>
                                <a href="/admin/consoles/edit/{{ $row->id }}" class="btn btn-warning">Edit</a>
                                <a href="/admin/consoles/delete/{{ $row->id }}" onclick="return(window.confirm('Are you sure delete at ID {{ $row->id }}?'))" 
                                    class="btn btn-danger">Delete</a>
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
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
