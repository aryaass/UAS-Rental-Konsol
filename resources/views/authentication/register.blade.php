@extends('layouts.app')
@section('content')

<x-navbar name="{{ $user->name }}" role="{{ $user->role }}" cart="{{ $cart }}" />

<style>
    body{
        background-image: url("../images/Wallpaper-login.png");
        background-size: 100%;
        color: white;
    }
</style>

<div class="sec1">
    <div class="container">
        <div class="row py-5 ml-2 mt-4 align-items-center">
            <div class="col-md-5 pr-lg-5 mb-5 mt-5 mb-md-auto">
                <img src="../images/Logo.png" width="450" height="450" alt="Logo Rental" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <!-- Registration Form -->
            <div class="col-md-7 col-lg-6 ml-auto cube1">
                <h1 class="mb-4 d-flex justify-content-center" style="color: white;">Create an Account</h1>

                <form action="/registerValidity" method="post">
                    @csrf
                    <input type="hidden" value="customer" name="role">
                    <div class="row">
                        <!-- Name  -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="name" placeholder="Name"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            {{ $errors->first('name') }}
                        </div>
                        
                        <!-- Address  -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-home text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="address" placeholder="Address"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            {{ $errors->first('address') }}
                        </div>

                        <!-- Phone Number  -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <input type="text" name="phone" placeholder="Phone Number"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            {{ $errors->first('phone') }}
                        </div>

                        <!-- Email -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input type="email" name="email" placeholder="Email Address"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input-group col-lg-12">
                            <small>We'll never share your email with anyoneelse.</small>
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            {{ $errors->first('email') }}
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input type="password" name="password" placeholder="Password" id="password"
                                class="form-control bg-white border-left-0 border-md">
                        </div>
                        <div class="input group col-lg-12 mb-0">
                            <input type="checkbox" onclick="showPassword()"> Show Password
                        </div>
                        <div class="input-group col-lg-12 mb-4">
                            {{ $errors->first('password') }}
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group col-lg-12 mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Confirm Password" id="confirmPassword"
                                class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Check Box -->
                        <div class="input group col-lg-12 mb-4">
                            <input type="checkbox" onclick="showConfirmPassword()"> Show Confirm Password
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mb-0">
                            <button type="submit" class="btn btn-success btn-block py-2">
                                <span class="font-weight-bold">Create your account</span>
                            </button>
                        </div>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-6"></div>
                            <span class="px-2 small font-weight-bold">OR</span>
                            <div class="border-bottom w-100 mr-6"></div>
                        </div>

                        <!-- Already Registered -->
                        <div class="text-center w-100">
                            <p class=" font-weight-bold">Already Registered?
                                <a href="/login" class="text ml-2">Login</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    function showConfirmPassword() {
        var x = document.getElementById("confirmPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection

{{-- <!-- First Name -->
<div class="input-group col-lg-6 mb-4">
    <div class="input-group-prepend">
        <span class="input-group-text bg-white px-4 border-md border-right-0">
            <i class="fa fa-user text-muted"></i>
        </span>
    </div>
    <input id="firstName" type="text" name="firstName" placeholder="First Name"
        class="form-control bg-white border-left-0 border-md">
</div>

<!-- Last Name -->
<div class="input-group col-lg-6 mb-4">
    <div class="input-group-prepend">
        <span class="input-group-text bg-white px-4 border-md border-right-0">
            <i class="fa fa-user text-muted"></i>
        </span>
    </div>
    <input id="lastName" type="text" name="lastName" placeholder="Last Name"
        class="form-control bg-white border-left-0 border-md">
</div> --}}
