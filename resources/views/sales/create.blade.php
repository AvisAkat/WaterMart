@extends('masterlayout.master')

@section('title', "Add Product")



@section('content')
    

    <h1 class="text-center mb-5" >Product</h1>

    
    @component('product.components.form', [ 'action' => route('admin.products.store'),'active' => true])
    @endcomponent    
    

@endsection