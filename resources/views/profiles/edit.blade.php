@extends('masterlayout.master')

@section('title', "Edit Profile")



@section('content')

<style>


.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

.form-group .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }
</style>

<div class="container rounded bg-white mt-5 mb-5">
<form action="{{ route('customer.profiles.update', ['profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-3 border-right">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img class="rounded-circle mt-5" width="150px" src="@if($user->userProfile->profile_pic === null) http://localhost:8000/images/user.png @else {{ $user->userProfile->getUserProfilePic()}} @endif">
          <span class=" mt-1" style="width: 88px">
            {{-- <input class="btn" type="file" name="profile_pic" /> --}}
            
                <input type="file" class="form-control form-control-sm " aria-label="Upload" name="profile_pic">
            
          </span>
          <span class="font-weight-bold mt-4">
            {{ $user->name }}
          </span>
          <span class="text-black-50">
            {{ $user->email }}
          </span>
          <span>
          </span>
        </div>
      </div>
      <div class="col-md-5 border-right">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">
              Profile Settings
            </h4>
          </div>
          <div class="row mt-3">

            <div class="col-md-12 form-group">
              <label class="labels">
                Name
              </label>
              <input type="text" name="name" class="form-control" placeholder="name.." value="{{ old('name') ? old('name') : $user->name }}">
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
              <label class="labels">
                Email
              </label>
              <input type="text" name="email" class="form-control" placeholder="email@example.com" value="{{ old('email') ? old('email') : $user->email }}">
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
              <label class="labels">
                Address
              </label>
              <input type="text" name="address" class="form-control" placeholder="address.." value="{{ old('address') ? old('address') : $user->userProfile->address }}">
                @if($errors->has('address'))
                    <div class="alert alert-danger">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
                <label class="labels">
                    Phone Number
                </label>
                
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" >+233</span>
                    <input name="phone" type="text" name="phone" class="form-control" placeholder="User's Contact.." aria-label="Username" aria-describedby="basic-addon1" value="{{ old('phone') ? old('phone') : $user->userProfile->phone }}">
                    
                </div>
                @if($errors->has('phone'))
                        <div class="alert alert-danger">
                            {{ $errors->first('phone') }}
                        </div>
                @endif
            </div>



            
           
        </div>
          
          <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" type="submit">
              Save Profile
            </button>
          </div>
        </div>
      </div>
      
    </div>
</form>
  </div>
  {{-- </div>
  </div> --}}
    

@endsection