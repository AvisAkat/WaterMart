<div class="card mb-3 p-2" style="width: 100%">
    <div class="row g-0">
      <div class="col-md-4 p-2">
        <img src="{{ $carts[$cart]->product->getProductImage() }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $carts[$cart]->product->name }}</h5>
          <p class="card-text">{{ $carts[$cart]->product->description }}</p>
          <p class="card-text">GHc {{ $carts[$cart]->product->price }}</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          <div class="card-footer bg-transparent p-0 pt-2 m-0 d-flex mb-0 ">
            <div class="me-5 text-start justify-content-start ms-0  w-100">
                <label for="item-qty fw-bold">How Many: </label>
                <input type="number" class="w-25 text-center" id="item-qty" name="item{{$cart}}" value="{{ old('item'.$cart) ? old('item'.$cart) : '1'}}" style="height: 35px;border: none;border-bottom: 2px solid black;"/>
                <input type="hidden" name="item{{$cart}}Pid" value="{{ $carts[$cart]->product->id }}" />
                @if($errors->has('item'.$cart))
                  <div class="alert alert-danger w-50">
                      {{ $errors->first('item'.$cart) }}
                  </div>
                @endif  
            </div>
            <div class="me-2 justify-content-end text-end flex-shrink-1">
                {{-- <form action="{{ route('auth.carts.destroy', ['cart' => $carts[$cart]->id])}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash3"></i></button>
                </form> --}}

                
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  