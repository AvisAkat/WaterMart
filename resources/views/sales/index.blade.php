@extends('masterlayout.master')

@section('title', "Products")
@section('content')
    
    <div>
        <h1 class="text-center mb-5">Sales</h1>

        <table class="table table-striped text-center">
            <thead class="">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Purchased Date</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($sale = 0; $sale < count($sales); $sale++)
                <tr>
                    <th scope="row">{{ $sale + 1 }}</th>
                    <td class="text-capitalize">{{ $sales[$sale]->user->name }}</td>
                    <td>{{ $sales[$sale]->formatedDate() }}</td>
                    <td>{{ $sales[$sale]->total_amount }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="me-2">
                            <a class="btn btn-info" href="{{ route('admin.sales.show', ['sale' => $sales[$sale]->id])}}"><i class="bi bi-binoculars"></i></a>
                        </div>
                        <div class="me-2">
                            <form action="{{ route('admin.sales.destroy', ['sale' => $sales[$sale]->id])}}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-danger" type="submit"><i class="bi bi-trash3"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>

    
    


@endsection