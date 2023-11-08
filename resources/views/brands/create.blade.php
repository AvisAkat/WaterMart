@extends('masterlayout.master')

@section('title', "Add Brand")



@section('content')

    
    @component('brands.components.form', [ 'action' => route('admin.brands.store'),'active' => true])
    @endcomponent    
    

@endsection