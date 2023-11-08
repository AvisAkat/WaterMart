@extends('masterlayout.master')

@section('title', "Add User")



@section('content')

    
    @component('users.components.form', [ 'action' => route('admin.users.store'),'active' => true])
    @endcomponent    
    

@endsection