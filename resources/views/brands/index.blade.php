@extends('masterlayout.master')

@section('title', "Brands")
@section('content')
    
    <div>
        <h1 class="text-center mb-5">Brands</h1>

        <a class="btn btn-success" href="{{ route('admin.brands.create')}}" style="margin-bottom: 4rem "><i class="bi bi-plus-square"></i> Add Brand</a>

        <table class="table table-striped text-center">
            <thead class="">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($brand = 0; $brand < count($brands); $brand++)
                <tr>
                    <th scope="row">{{ $brand + 1 }}</th>
                    <td>{{ $brands[$brand]->brand_name }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="me-2">
                            <a class="btn btn-info" href="{{ route('admin.brands.show', ['brand' => $brands[$brand]->id])}}"><i class="bi bi-binoculars"></i></a>
                        </div>
                        <div class="me-2">
                            <a class="btn btn-primary" href="{{ route('admin.brands.edit', ['brand' => $brands[$brand]->id])}}"><i class="bi bi-pen"></i></a>
                        </div>
                        <div class="me-2">
                            <form action="{{ route('admin.brands.destroy', ['brand' => $brands[$brand]->id])}}" method="POST">
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