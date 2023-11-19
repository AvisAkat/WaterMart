@extends('masterlayout.master')

@section('title', "Cart")



@section('content')

<style>
    .form-group .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }
</style>
    

    @if (count($carts) > 0 )
        <h1 class="text-center mb-5" >Items</h1>
    @endif

    <div class="row mb-5">
        <div class="col-sm-6 col-md-2">
        </div>
        <div class="col-sm-6 col-md-8 mb-2 ">
            @if (count($carts) > 0 )
                <form action="{{ route('auth.carts.buyItems', ['cart' => count($carts)]) }}" method="POST">
                    @csrf

                    <div>
                        @for($cart = 0; $cart < count($carts); $cart++)
                            @component('cart.component.cart-card', [ 'cart' => $cart, 'carts' => $carts])
                            @endcomponent
                        @endfor 
                    </div>

                    
                    <button type="submit" class="btn btn-warning w-100">BUY</button>
                    
                </form>
            @else
            <div class="text-center">
                <h1 class="text-center mb-5">No Items Added to Cart</h1>
                <a class="btn btn-warning w-50 p-2 mt-5" href="{{route('home')}}" style="color: white"> Home </a>
            </div>
            @endif
        </div>
        <div class="col-sm-6 col-md-2">
        </div>
    </div>   
    

@endsection