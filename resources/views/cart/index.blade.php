@extends('masterlayout.master')

@section('title', "Cart")



@section('content')
    

    <h1 class="text-center mb-5" >Items</h1>

    <div class="row mb-5">
        <div class="col-sm-6 col-md-2">
        </div>
        <div class="col-sm-6 col-md-8 mb-2 ">
            @for($cart = 0; $cart < count($carts); $cart++)
                @component('cart.component.cart-card', [ 'cart' => $cart, 'carts' => $carts])
                @endcomponent
            @endfor 

            <div class="mt-4">
                <a class="btn btn-warning w-100" href="#">BUY</i></a>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
        </div>
    </div>   
    

@endsection