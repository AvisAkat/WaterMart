<div class="card m-3" style="width: 18rem;">
    <img src="{{ $product->getProductImage()}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $product->name }}</h5>
      <p class="card-text">{{ $product->description }}</p>
      
    </div>
    <div class="card-footer d-flex">
        
        <button type="button" class="btn btn-primary" @if( $product->quantity_in_stock == 0) disabled @endif>Add To Cart</button>
          
        {{-- <a href="#" class="btn btn-primary me-2">Add To Cart</a> --}}
        @if( $product->quantity_in_stock == 0)
          <form action="{{ route('mail.notify.store', ['product' => $product->id]) }}" method="post">
            @csrf
            <button class="btn btn-primary">Send Notification</button>
          </form>
        @endif
    </div>
</div>