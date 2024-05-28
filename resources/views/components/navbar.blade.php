<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-light fixed-top sticky">
    <div class="container">
        <a class="navbar-brand mr-5" href="#">
            <img src="{{asset('/img/gelap.png')}}" alt="" id="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0 px-5">
                @if ($role=='admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black;">
                        Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/admin">Home Admin</a>
                        <a class="dropdown-item" href="/admin/consoles">Consoles</a>
                        <a class="dropdown-item" href="/admin/orders">Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Information</a>
                    </div>
                </li>
                @endif
                
                <li class="nav-item active">
                    <a class="nav-link " href="/">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/#console">Consoles</a>
                </li>
                {{-- @if($role != 'admin') --}}
                <li class="nav-item active">
                    <a class="nav-link" href="/console/shoppingCart"> Shopping Cart
                        <i class="fa fa-shopping-cart"></i>
                        @if ($cart!=null)
                        <span class="badge badge-pill badge-success">
                            {{ $cart }}
                        </span>
                        @endif
                    </a>
                </li>
                {{-- @endif --}}
                @if ($role=='customer')
                <li class="nav-item active">
                    <a class="nav-link" href="/console/history">History</a>
                </li>    
                @endif
                
            </ul>
            @if (empty($name))
            <div class="form-inline my-2 my-lg-0">
                <a href="/login" class="btn btn-login m-auto" type="button">Login</a>
            </div>
            @else
            <div class="form-inline my-2 my-lg-0">
                <a href="/logout" class="btn btn-login m-auto" type="button">Logout</a>
            </div>
            <div class="form-inline my-2 my-lg-0">
                <p class="nav-link "> {{ 'Hello '.$name }} </p>
            </div>
            @endif

        </div>
    </div>
</nav>
