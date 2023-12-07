<style>

    
    .navbar-new-top{
        background: #fff;
    }
    .navbar-brand{
        font-weight: 600;
    }
    .navbar-brand img{
        width: 6%;
    }
    .navbar-new-top ul{
        margin-right: 9%;
    }
    .navbar-new-top ul li{
        margin-right: 2%;
    }
    .navbar-new-bottom{
        background-color: #f7f7f7;
        box-shadow: 0 5px 6px -2px rgba(0,0,0,.3);
        border-top: 1px solid #e0e0e0;
        /* margin-top: 3.4%; if 0 the top navbar will disapper */
        height: 40px;
    }
    .navbar-new-bottom ul li{
        margin-left: 2%;
        margin-right: 2%;
    }
    .navbar-nav .nav-item a {
        color: #333;
        font-size: 14px;
        font-weight: 600;
        transition: 1s ease;
        
    }

    .navbar-nav .nav-item .btn {
        color: #333;
        font-size: 14px;
        font-weight: 600;
        transition: 1s ease;
        
    }

    .navbar-nav .nav-item a:hover{
        color: #0062cc;
    }
    .navbar-nav .nav-item button:hover{
        color: #0062cc;
    }
    .dropdown-menu.show{
        background: #91c5fa;
        border-radius: 0;
    }
    /* .header-btn{
        width: 161%;
        border: none;
        border-radius: 1rem;
        padding: 8%;
        background: #0062cc;
        color: #fff;
        font-weight: 700;
        font-size: 13px;
        cursor: pointer;
    } */

    .navbar-new-top .btn1 {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        background-color: transparent;
        font-size: 9px;
        
        
        
    }
    .navbar-new-top .btn1 img{
        height: 100%;
        width: 100%;
        border-radius: 50%;
        margin: 0;
        
    }

</style>


<div class="double-navbar fixed-top ">
    
    <nav class="navbar navbar-expand-md flex-nowrap navbar-new-top"> {{-- fixed-top --}}
        <a href="/" class="navbar-brand"><img src="http://localhost:8000/images/water-drop.png" alt=""/> Water Mart</a>
        <ul class="nav navbar-nav mr-auto"></ul>
        <ul class="navbar-nav flex-row">
            
            @guest
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{route('auth.signin')}}">SignIn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{route('auth.signup')}}">SignUp</a>
                </li>
            @endguest

            @auth

                <li class="nav-item">
                    <a class="nav-link px-2" href="{{route('auth.carts.index')}}">Cart</a>
                </li>

                <li class="nav-item">
                    <button type="button" class="btn1 nav-link px-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        {{-- {{ Auth::user()->email }} --}}
                        <img src="@if(Auth::user()->userProfile->profile_pic === null) http://localhost:8000/images/user.png @else {{ Auth::user()->userProfile->getUserProfilePic()}} @endif" />
                    </button>
                </li>
                    <!-- Modal -->

                <li class="nav-item">
                    <form action="{{route('auth.logout')}}" method="POST">
                        @csrf
                        <button class="btn nav-link px-2" type="submit" >LogOut</a>
                    </form>
                </li>

                @if(Auth::User()->role == 'admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.users.index')}}">🙎 Users</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.products.index')}}">📦 Products</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.sales.index')}}">📈 Sales</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.brands.index')}}">🔖 Brands</a></li>
                        </ul>
                    </li>
                    
                    
                @endif
            @endauth
            
        </ul>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        
    </nav>
    <nav class="navbar  navbar-expand-md navbar-new-bottom "> {{-- fixed-top --}}
        
        <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">
            
            <ul class="navbar-nav w-100 justify-content-center px-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link</a></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Link</a>
                </li>
                
               
            </ul>
        </div>
    </nav>
    
</div>

 <!-- Modal -->
