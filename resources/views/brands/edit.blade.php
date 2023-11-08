@extends('masterlayout.master')

@section('title', "Edit Product")



@section('content')

    
    @component('brands.components.form', [ 'action' => route('admin.brands.update', ['brand' => $brand->id]),
                                        'brand' => $brand, 'active' => false])
    @endcomponent    
    

@endsection