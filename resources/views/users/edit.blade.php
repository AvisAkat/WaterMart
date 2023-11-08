@extends('masterlayout.master')

@section('title', "Edit User")



@section('content')

    
    @component('users.components.form', [ 'action' => route('admin.users.update', ['user' => $user->id]),
                                        'user' => $user,'active' => false])
    @endcomponent    
    

@endsection