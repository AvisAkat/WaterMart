@extends('masterlayout.master')

@section('title', "Products")
@section('content')
    
    <div>
        <h1 class="text-center mb-5">Products</h1>

        <a class="btn btn-success" href="{{ route('admin.products.create')}}" style="margin-bottom: 4rem "><i class="bi bi-plus-square"></i> Add Product</a>

        <table class="table table-striped text-center">
            <thead class="">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Image</th> --}}
                <th scope="col">Qty in Stock</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($product = 0; $product < count($products); $product++)
                <tr>
                    <th scope="row">{{ $product + 1 }}</th>
                    <td>{{ $products[$product]->name }}</td>
                    {{-- <td><img src="{{ $products[$product]->getProductImage() }}" alt="product..image" style="width: 80px;height: 80px;" /></td> --}}
                    <td>{{ $products[$product]->quantity_in_stock }}</td>
                    <td>{{ $products[$product]->price }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="me-2">
                            <a class="btn btn-info" href="{{ route('admin.products.show', ['product' => $products[$product]->id])}}"><i class="bi bi-binoculars"></i></a>
                        </div>
                        <div class="me-2">
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', ['product' => $products[$product]->id])}}"><i class="bi bi-pen"></i></a>
                        </div>
                        <div class="me-2">
                            <form action="{{ route('admin.products.destroy', ['product' => $products[$product]->id])}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                        
                           
                        <form action="{{ route('mail.notify.send', ['notify' => $products[$product]->id]) }}" method="post">
                            @csrf
                            <button class="btn btn-secondary" type="submit"  @if($products[$product]->quantity_in_stock == 0 || $products[$product]->notifications->count() == 0 ) disabled @endif><i class="bi bi-bell-fill"></i></button>
                        </form>

                        
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    


@endsection