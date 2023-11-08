<style>
    /* body{
        background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
    } */
    .contact-form{
        background: #fff;
        margin-top: 10%;
        margin-bottom: 5%;
        width: 70%;
    }
    .contact-form .form-control{
        border-radius:1rem;
    }
    .contact-image{
        text-align: center;
        
    }
    .contact-image img{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
    }

    .contact-image i{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
        font-size: 50px;
    }
    .contact-image icon{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
        font-size: 100px;
    }
    .contact-form form{
        padding: 14%;
    }
    .contact-form form .row{
        /* margin-bottom: 10px; */
        margin-top: 15px;
    }
    .contact-form h2{
        margin-bottom: 3rem;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
    }
    .contact-form label{
        margin-bottom: 10px;
        margin-top: 15px;
        text-align: left;
        color: #0062cc;
    }
    .contact-form .btnContact {
        width: 100%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background-color: #0062cc;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        margin-top: 3rem;
    }
    .btnContactSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
        
    }

    .form-group .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }
    </style>
    
    
@php

if(!$active)
{
  $name = old('name') ? old('name') : $user->name;
  $email = old('email') ? old('email') : $user->email;
  $role = old('role') ? old('role') : $user->role;
  $status = old('status') ? old('status') : $user->status;
  $description = old('description') ? old('description') : $user->description;
  
}
@endphp
    
    <div class="container contact-form">
        <div class="contact-image">
            {{-- <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/> --}}
            <img src="http://localhost:8000/images/water-drop.png" alt="logo"/>
            {{-- <div class="icon"><i class="bi bi-droplet-half"></i></div> --}}
        </div>
        <form action="{{$action}}" method="POST">
            @csrf
            @if(!$active)
                @method('PUT')
            @endif
            <h2>{{ $active ? "Add User" : "Edit User" }}</h2>
           
                
                    <div class="form-group">
                        <label for="Uname">Name Of User</label>
                        <input id="Uname" type="text" name="name" class="form-control" placeholder="User's Name.." value="{{ $active? old('name') : $name}}" />
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Uemail">Email</label>
                        <input id="Uemail" type="email" name="email" class="form-control" placeholder="User's Email .." value="{{ $active? old('email') : $email}}" />
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="row" style="text-align: center;">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="mb-0">User's Role</label>
                                <br />
                                <div class="btn-group mb-0 " role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="role" id="Urole1" autocomplete="off" value="admin"
                                        @if($active)
                                            @if(old('role') == "admin")
                                                checked="checked"
                                            @endif
                                        @endif
                                        @if(!$active)
                                            @if($role == "admin")
                                            checked="checked"
                                            @endif
                                        @endif
                                    
                                    />
                                    <label class="btn btn-outline-primary" for="Urole1" style="border-top-left-radius: 1rem;border-bottom-left-radius: 1rem">Admin</label>
                                
                                    <input type="radio" class="btn-check " name="role" id="Urole2" autocomplete="off" value="customer"
                                        @if($active)
                                            @if(old('role') == "customer")
                                                checked="checked"
                                            @endif
                                        @endif
                                        @if(!$active)
                                            @if($role == "customer")
                                                checked="checked"
                                            @endif
                                        @endif
                                    >
                                    <label class="btn btn-outline-primary" for="Urole2" style="border-top-right-radius: 1rem;border-bottom-right-radius: 1rem">Customer</label>
                                
                                </div>
                                @if($errors->has('role'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('role') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group " >
                                <label class="mb-0">User's Status</label>
                                <br />
                            
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="status" id="Ustatus1" autocomplete="off" value="active"
                                        @if($active)
                                            @if(old('status') == "active")
                                                checked="checked"
                                            @endif
                                        @endif
                                        @if(!$active)
                                            @if($status == "active")
                                                checked="checked"
                                            @endif
                                        @endif
                                    >
                                    <label class="btn btn-outline-primary" for="Ustatus1" style="border-top-left-radius: 1rem;border-bottom-left-radius: 1rem">Active</label>
                                
                                    <input type="radio" class="btn-check" name="status" id="Ustatus2" autocomplete="off" value="inactive"
                                        @if($active)
                                            @if(old('status') == "inactive")
                                                checked="checked"
                                            @endif
                                        @endif
                                        @if(!$active)
                                            @if($status == "inactive")
                                                checked="checked"
                                            @endif
                                        @endif
                                    >
                                    <label class="btn btn-outline-primary" for="Ustatus2" style="border-top-right-radius: 1rem;border-bottom-right-radius: 1rem">In active</label>
                                
                                </div>
                                @if($errors->has('status'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="Uaddress">Address</label>
                        <input id="Uaddress" type="text" name="address" class="form-control" placeholder="User's Address.." value="{{ $active? old('address') : ''}}" />
                        @if($errors->has('address'))
                            <div class="alert alert-danger">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div> --}}

                    {{-- <div class="form-group">
                        <label for="Uphone">Phone Number</label>
                        <div class="form-group input-group mb-3">
                            <span class="input-group-text" id="basic-addon1" style="border-top-left-radius: 1rem;border-bottom-left-radius: 1rem">+233</span>
                            <input id="Uphone" type="text" name="phone" class="form-control" placeholder="User's Contact.." aria-label="Username" aria-describedby="basic-addon1" value="{{ $active? old('phone') : ''}}">
                        </div>
                        @if($errors->has('phone'))
                            <div class="alert alert-danger">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div> --}}

                    @if($active)
                        <div class="form-group">
                            <label for="Upass">Password</label>
                            <input id="Upass" type="password" name="password" class="form-control" placeholder="************" value="{{ $active? old('password') : ''}}" />
                            @if($errors->has('password'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <label for="UcPass">Confirm Password</label>
                            <input id="UcPass" type="password" name="password_confirmation" class="form-control" placeholder="************" value="{{ $active? old('password_confirmation') : ''}}" />
                            @if($errors->has('password_confirmation'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('password_confirmation') }}
                                </div>
                            @endif
                        </div>
                    @endif
                
                    {{-- <div class="form-group">
                        <label for="Uiamge">Profile Pic</label>
                        <input id="Uimage" type="file" name="profile_pic" class="form-control" placeholder="User's Profile Picture.." value="{{ $active? old('profile_pic') : ''}}" />
                        @if($errors->has('profile_pic'))
                            <div class="alert alert-danger">
                                {{ $errors->first('profile_pic') }}
                            </div>
                        @endif
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="Piamge">Product image</label>
                                <input id="Pimage" type="file" name="image" class="form-control" placeholder="Product Image *" value="" />
                            </div>
                        </div>
                        <div class="col-md-4">
                                <img src=".." alt=".."/>
                        </div>
                    </div> --}}
    
    
    
    
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="{{ $active ? "ADD" : "SAVE" }}" />
                    </div>
    
                    
                
            
        </form>
    </div>