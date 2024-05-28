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
                <h1 class="mb-4 d-flex justify-content-center">Login</h1>
                @if ($status!=null)
                    <h4> {{ $status }} </h4>
                @endif
                
                {{-- {{ $errors }} --}}
                <form action="/loginValidity" method="post">
                    @csrf
                    <div class="row">
                        <!-- Email -->
                        <div class="input-group col-lg-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input type="email" name="email" placeholder="Email Address"
                                class="form-control bg-white border-left-0 border-md" value="">
                        </div>
                        <div class="input-group col-lg-12 mb-3" style="color: white">
                            <small>
                                We'll never share your email with anyone else.
                            </small><br>
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="input-group col-lg-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input type="password" name="password" placeholder="Password" id="password"
                                class="form-control bg-white border-left-0 border-md" required>
                        </div>
                        <div class="input-group col-lg-12 mb-3" style="color: white">
                            <small>
                                We'll never share your email with anyone else.
                            </small><br>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>

                        <!-- Create Captcha -->
                        <div style="padding: auto;" class="input-group col-lg-12 mb-2">
                            <span>
                                <img src="captcha.php" alt="CAPTCHA" class="captcha-image">
                            </span>
                            <input type="text" id="captcha" name="captcha" placeholder="Enter Captcha"
                                class="form-control bg-white border-md">
                        </div>
                        <div class="input-group col-lg-12 mb-4" style="color: white">
                            <small>
                                Please enter the captcha to continue.
                            </small>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group col-lg-12 mb-0">
                            <button type="submit" class="btn btn-success btn-block py-2">
                                <span class="font-weight-bold">Login</span>
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
                            <p class="font-weight-bold">Don't have an account? <a href="/register"
                                    class="text-primary ml-2">Register Now!</a></p>
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
</script>
@endsection
