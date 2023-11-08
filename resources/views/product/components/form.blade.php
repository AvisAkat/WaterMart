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
    $name = old('name') ? old('name') : $product->name;
    $price = old('price') ? old('price') : $product->price;
    $qty = old('quantity_in_stock') ? old('quantity_in_stock') : $product->quantity_in_stock;
    $brand_id = old('brand_id') ? old('brand_id') : $product->brand_id;
    $description = old('description') ? old('description') : $product->description;
    
  }
@endphp


<div class="container contact-form">
    <div class="contact-image">
        <img src="http://localhost:8000/images/water-drop.png" alt="logo"/>
    </div>
    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf
        @if(!$active)
            @method('PUT')
        @endif
        <h2>{{ $active ? "Add a Product" : "Edit Product" }}</h2>
       
            
                <div class="form-group">
                    <label for="Pname">Name Of Product</label>
                    <input id="Pname" type="text" name="name" class="form-control" placeholder="Product Name.." value="{{ $active? old('name') : $name}}" />

                    @if($errors->has('name'))
                      <div class="alert alert-danger">
                          {{ $errors->first('name') }}
                      </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Pbrand">Product's Brand</label>
                    <select id="Pbrand" class="form-select" aria-label="Default select example" name="brand_id">
                        <option value=""><span class="text-muted">--Select Brand--<span></option>
                        @foreach($brands as $brand)
                            <option
                                
                                @if($active)
                                    @if(old('brand_id') == $brand->id)
                                        selected="selected"
                                    @endif
                                @endif
                                @if(!$active)
                                    @if($brand_id == $brand->id)
                                        selected="selected"
                                    @endif
                                @endif
                                value="{{ $brand->id }}">{{ $brand->brand_name }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('brand_id'))
                      <div class="alert alert-danger">
                          {{ $errors->first('brand_id') }}
                      </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pprice">Price</label>
                            <div class="input-group mb-0">
                                <span class="input-group-text" style="border-top-left-radius: 1rem;border-bottom-left-radius: 1rem">Ghc</span>
                                <input type="number" name="price" class="form-control" step=".01" aria-label="Amount" value="{{ $active? old('price') : $price}}">
                                
                            </div>

                            @if($errors->has('price'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Pqty">Quantity Available</label>
                            <input id="Pqty" type="number" name="quantity_in_stock" class="form-control" placeholder="Quantity In Stock.." value="{{ $active? old('quantity_in_stock') : $qty}}" />

                            @if($errors->has('quantity_in_stock'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('quantity_in_stock') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="Pdescription">Description</label>
                    <textarea id="Pdescription" name="description" class="form-control" placeholder="Describe the product.." style="width: 100%; height: 150px;">{{ $active? old('description') : $description}}</textarea>

                    @if($errors->has('description'))
                      <div class="alert alert-danger">
                          {{ $errors->first('description') }}
                      </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Piamge">Product image</label>
                    <input id="Pimage" type="file" name="image" class="form-control" placeholder="Product Image.." value="{{ $active? old('image') : $product->image}}" />

                    @if($errors->has('image'))
                      <div class="alert alert-danger">
                          {{ $errors->first('image') }}
                      </div>
                    @endif
                </div>
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
                    <input type="submit" name="btnSubmit" class="btnContact" value="{{ $active ? 'ADD' : 'SAVE'}}" />
                </div>

                
            
        
    </form>
</div>