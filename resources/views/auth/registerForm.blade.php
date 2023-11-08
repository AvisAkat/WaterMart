
@extends('masterlayout.master')
@section('title',  $active? "Sign Up" : "Sign In")

@section('content')
<style>
    /* html {
    height:100%
    } */
    /* head,body {
    background-color:#BA68C8
    } */

    .container-fluid{
        margin-top: 10rem;
    }
    .box1 {
      /* background-image: url('http://localhost:8000/images/water5.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: 100% 100%; */
      
      /* background-image: url(http://localhost:8000/images/water5.jpg);
      background-repeat: no-repeat;
      background-attachment: fixed;   
      background-size: cover; */
      
    /* height:600px */

    padding: 0;
    border: 0px;
    }
    
    .card-header {
    background:none
    }
    
    .box2 {
    /* height:600px */
    }
    .heading {
    font-weight:900
    }
    .heading2 {
    padding-left:40px
    }
    .box2-head {
    font-weight:900;
    background:none;
    border:none
    }
    .card-header {
    margin-top:50px;
    padding-left:19px
    }
    .sub-heading {
    font-weight:900;
    font-size:14px;
    /* border:1px solid black; */
    }
    .sub-heading2 {
      border:1px solid white;
      padding-top:10px;
      padding-bottom:10px;
      border-bottom: 3px solid rgb(62, 62, 253);
      color: black;
      
    } 
    .sub-heading1 {
    background-color:white;
    color:#263238;
    padding-top:10px;
    padding-bottom:10px;
    border-bottom: 3px solid rgb(44, 44, 158); 
    color: black;
    
    }
    
    .sub-heading2.active{
      padding-top:10px;
      padding-bottom:10px;
      border: none;
      background-color: rgb(44, 44, 158); 
      color: white
    }


    .sub-heading1.active{ 
    background-color: rgb(62, 62, 253);
    color: white;
    border: none;
    padding-top:10px;
    padding-bottom:10px;
    
    }
    
    
    /* .back {
    position:absolute;
    z-index:1;
    left:70px;
    top:30px
    } */
    .form-group>input {
    border:none;
    border-bottom:1px solid lightgray
    }
    /* .card-number>input {
    border:none
    }
    .card-number {
    border-bottom:1px solid lightgray
    }
    .card-number>input::-webkit-input-placeholder {
    color:peachpuff;
    font-size:25px
    }
    .card-number>input::-moz-placeholder {
    color:peachpuff;
    font-size:25px
    }
    .card-number>input:-ms-input-placeholder {
    color:peachpuff;
    font-size:25px
    }
    .card-number>input::placeholder {
    color:peachpuff;
    font-size:25px
    } */
    input.focus,input:focus {
    outline:0;
    box-shadow:none !important
    }
    /* .card-number.hover,.card-number:hover {
    outline:0;
    box-shadow:none !important;
    border-bottom:1px solid lightskyblue
    } */
    
    .form-control {
    border:none;
    border-bottom:1px solid lightgray
    }
    /* .txt {
    justify-content:space-between
    }
    .txt>p>small {
    font-weight:900
    } */
    
    .btnn {
    
    background-color:#00B8D4;
    color:white;
    height: 100%;
    margin-top: 15px;
    }
    .footer2 {
    background:none
    }
    .btnn.focus,.btnn:focus {
    outline:0;
    box-shadow:none !important
    }
    @media (min-width:1025px) and (max-width:1280px) {
        .inner {
        margin-left:150px
        }
    }

    .form-group .alert{
        margin-top: 5px;
        padding: 5px;
        text-align: center;
    }

    form .butt{
        border: 2px solid blue;
        width: 100%;
        border-radius: 5px;
        background-color: rgb(140, 140, 244);
        color: blue;
        margin-top: 30px;
        text-align: center;
        padding: 3px;

    }
</style>




    {{-- Image --}}
    <div class="inner row d-flex justify-content-center mb-5">
      <div class="card col-md-5 col-12 box1">

        @if($active)
          <img src="http://localhost:8000/images/water7.jpg" alt="" style="width: 100%;height: 100%;"/>
        @else
          <img src="http://localhost:8000/images/water4.jpg" alt="" style="width: 100%;height: 100%;"/>
        @endif
        
      </div>

      {{-- Form --}}
      <div class="card col-md-5 col-12 box2">
        <div class="card-content">
          <div class="card-header box2-head">
            <div class="sub-heading row text-center m-0">
              <a class="col-6 col-md-6 sub-heading1  {{ $active ? 'active' : ''}}" href="{{route('auth.signup')}}">
                <div >
                  SIGN UP
                </div>
              </a>
              <a class="col-6 col-md-6 sub-heading2 {{ $active ? '' : 'active'}}" href="{{route('auth.signin')}}" >
                <div>
                  SIGN IN
                </div>
              </a>
              </div>
          </div>

          <div class="card-body col-10 offset-1">
            <form action="{{ $active? route('auth.register'): route('auth.signinUser') }}" method="POST">
              @csrf
              @if($active)
                <div class="form-group">
                    <label for="UserName">
                        <small>
                            <strong class="text-muted">
                                NAME
                            </strong>
                        </small>
                    </label>
                    <input type="text" id="UserName" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name')}}">

                    @if($errors->has('name'))
                      <div class="alert alert-danger">
                          {{ $errors->first('name') }}
                      </div>
                    @endif
                </div>
              @endif

                <div class="form-group">
                    <label for="UserEmail">
                        <small>
                            <strong class="text-muted">
                                EMAIL
                            </strong>
                        </small>
                    </label>
                    <input type="email" class="form-control" id="UserEmail" name="email" placeholder="email@example.com" value="{{ old('email')}}">
                    @if($errors->has('email'))
                      <div class="alert alert-danger">
                          {{ $errors->first('email') }}
                      </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="UserPassword">
                        <small>
                            <strong class="text-muted">
                                PASSWORD
                            </strong>
                        </small>
                    </label>
                    <input type="password" class="form-control" id="UserPassword" name="password" placeholder="*************" value="{{ old('password')}}">

                    @if($errors->has('password'))
                      <div class="alert alert-danger">
                          {{ $errors->first('password') }}
                      </div>
                    @endif
                </div>

              @if($active)
                <div class="form-group">
                    <label for="UserConfirmPassword">
                        <small>
                            <strong class="text-muted" >
                                CONFIRM PASSWORD
                            </strong>
                        </small>
                    </label>
                    <input type="password" class="form-control" id="UserConfirmPassword" name="password_confirmation" placeholder="*************" value="{{ old('password_confirmation')}}">

                    @if($errors->has('password_confirmation'))
                      <div class="alert alert-danger">
                          {{ $errors->first('password_confirmation') }}
                      </div>
                    @endif
                </div>
              @endif
                
              
            
                <button class="btn btnn col-12 w-100" type="submit">
                  {{ $active? "Sign Up" : "Sign In" }}
                </button>
              

              {{-- <div>
                <button class="butt" type="submit">{{ $active? "Sign Up" : "Sign In" }}</button>

            </div> --}}
            </form>
          </div>
          
        </div>
      </div>
    </div>
  


@endsection





