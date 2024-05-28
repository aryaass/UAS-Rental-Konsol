@extends('layouts.app')

@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />


@endsection