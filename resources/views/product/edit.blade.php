@extends('masterlayout.master')

@section('title', "Edit Product")



@section('content')

    
    @component('product.components.form', [ 'action' => route('admin.products.update', ['product' => $product->id]),
                                        'brands' => $brands,'product' => $product,'active' => false])
    @endcomponent    
    

@endsection