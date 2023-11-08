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
.contact-form .form-select{
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
    $brand_name = old('brand_name') ? old('brand_name') : $brand->brand_name;
    
  }
@endphp


<div class="container contact-form">
    <div class="contact-image">
        <img src="http://localhost:8000/images/water-drop.png" alt="logo"/>
    </div>
    <form action="{{ $action }}" method="post" >
        @csrf
        @if(!$active)
            @method('PUT')
        @endif
        <h2>{{ $active ? "Add Brand" : "Edit Brand" }}</h2>
       
            
                <div class="form-group">
                    <label for="Bname">Brand Name</label>
                    <input id="Bname" type="text" name="brand_name" class="form-control" placeholder="Brand Name.." value="{{ $active? old('brand_name') : $brand_name}}" />

                    @if($errors->has('brand_name'))
                      <div class="alert alert-danger">
                          {{ $errors->first('brand_name') }}
                      </div>
                    @endif
                </div>



                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btnContact" value="{{ $active ? 'ADD' : 'SAVE'}}" />
                </div>

                
            
        
    </form>
</div>