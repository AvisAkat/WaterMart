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
          <div class="card-footer bg-transparent p-0 pt-2 m-0 text-end d-flex justify-content-end">
            <div class="me-2">
                <form action="{{ route('auth.carts.destroy', ['cart' => $carts[$cart]->id])}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash3"></i></button>
                </form>
            </div>
            <div class="me-2">
                <form action="{{ route('auth.carts.destroy', ['cart' => $carts[$cart]->id])}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button class="btn btn-danger" type="submit"><i class="bi bi-trash3"></i></button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>