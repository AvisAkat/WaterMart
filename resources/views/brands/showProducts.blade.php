@extends('masterlayout.master')

@section('title', "Water Mart")
@section('content')

    
    
    
    <div class="d-flex flex-wrap">
        @foreach($products as $product)
            @component('product.components.product-card', ['product' => $product])
            @endcomponent
        @endforeach
    </div>


@endsection