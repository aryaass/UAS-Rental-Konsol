@extends('layouts.app')
@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<div class="sec1">
    <div class="container">
        <div class="row py-5 ml-2 mt-4 align-items-center">

            <!-- Insert Data -->
            <div class=" ml-auto cube1">
                <h1 class="mb-4 d-flex justify-content-center" style="color: #5b4f47;">Insert New Console</h1>
                {{-- {{ $errors }} --}}
                <form action="/admin/consoles/insertValidity" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="customer" name="role">
                    <div class="row">

                        <!-- Name  -->
                        <div class="input-group col-lg-12">
                            <label>Name</label>
                        </div>
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-gamepad text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="name" placeholder="Name "
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-3">
                            <small class="form-text text-muted">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <!-- Price  -->
                        <div class="input-group col-lg-12">
                            <label>Price</label>
                        </div>
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-money text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="price" placeholder="Price "
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-3">
                            <small class="form-text text-muted">
                                @error('price')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <!-- Stock  -->
                        <div class="input-group col-lg-12">
                            <label>Stock</label>
                        </div>
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-medkit text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="stock" placeholder="Stock "
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-3">
                            <small class="form-text text-muted">
                                @error('stock')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <!-- Description  -->
                        <div class="input-group col-lg-12">
                            <label>Description</label>
                        </div>
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-info-circle text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="description" placeholder="Description "
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-3">
                            <small class="form-text text-muted">
                                @error('description')
                                {{ $message }}
                                @enderror
                            </small>
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
                        <div class="input-group col-lg-12 mb-0">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-file-image-o text-muted"></i>
                                </span>
                            </div>
                            <input id="file" class="form-control bg-white border-left-0 border-md"
                            type="file" name="image">
                        </div>
                        <div class="input-group col-lg-12 mb-3">
                            <small class="form-text text-muted">
                                @error('image')
                                {{ $message }}
                                @enderror
                            </small>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mb-2">
                            <button type="submit" class="btn btn-success btn-block py-2">
                                <span class="font-weight-bold">Insert</span>
                            </button>
                        </div>
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
<br><br><br><br>
@endsection
