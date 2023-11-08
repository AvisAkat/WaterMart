@extends('masterlayout.master')

@section('title', "Add Product")



@section('content')

    
    @component('product.components.form', [ 'action' => route('admin.products.store'),'brands' => $brands,'active' => true])
    @endcomponent    
    

@endsection