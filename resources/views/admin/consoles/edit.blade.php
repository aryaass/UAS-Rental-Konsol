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
        <div class="row py-5 ml-2 mt-4 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-5 mt-5 mb-md-auto">
                <img src="{{ asset($console->image_link) }}" width="450" height="450" alt="Logo Rental" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto cube1">
                <h1 class="mb-4 d-flex justify-content-center" style="color: #5b4f47;">Edit Console</h1>

                <form class="tulisan" action="/admin/consoles/editValidity" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="customer" name="role">
                    <div class="row">

                         <!-- ID  -->
                        <div class="input-group col-lg-12">
                            <label>ID</label>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="id" value="{{ $console->id }}" readonly
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Name  -->
                        <div class="input-group col-lg-12">
                            <label>Name</label>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-gamepad text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="name" value="{{ $console->name }}"
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Price  -->
                        <div class="input-group col-lg-12">
                            <label>Price</label>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-money text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="price" value="{{ $console->price }}"
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Stock  -->
                        <div class="input-group col-lg-12">
                            <label>Stock</label>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-medkit text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="stock" value="{{ $console->stock }}"
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Description  -->
                        <div class="input-group col-lg-12">
                            <label>Description</label>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-info-circle text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="description" value="{{ $console->description }}"
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Image  -->
                        <div class="input-group col-lg-12">
                            <label>New Image</label>
                        </div>
                        <div class="input-group col-lg-12">
                            <small>
                                Recommeded image ratio 1:1
                            </small>
                        </div>
                        <div class="input-group col-lg-12 mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-file-image-o text-muted"></i>
                                </span>
                            </div>
                            <input type="file" name="newImage"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <input type="hidden" name="oldImage" value="{{ $console->image_link }}">
                        
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mb-2">
                            <button type="submit" class="btn btn-success btn-block py-2">
                                <span class="font-weight-bold">Edit this console</span>
                            </button>
                        </div>
                        
                        <!-- Cancel Button -->
                        <div class="form-group col-lg-12 mb-0">
                            <a href="/admin/consoles" class="btn btn-danger btn-block py-2">
                                <span class="font-weight-bold">Cancel</span>
                            </a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection