@extends('masterlayout.master')

@section('title', "Users")
@section('content')
    
    <div>
        <h1 class="text-center mb-5">Users</h1>

        <a class="btn btn-success" href="{{ route('admin.users.create')}}" style="margin-bottom: 4rem "><i class="bi bi-plus-square"></i> Add User</a>

        <table class="table table-striped text-center">
            <thead class="">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @for($user = 0; $user < count($users); $user++)
                <tr>
                    <th scope="row">{{ $user + 1 }}</th>
                    <td>{{ $users[$user]->name }}</td>
                    <td>{{ $users[$user]->email }}</td>
                    <td>{{ $users[$user]->role }}</td>
                    <td>{{ $users[$user]->status }}</td>
                    <td class="d-flex justify-content-center">
                        <div class="me-2">
                            <a class="btn btn-info" href="{{ route('admin.users.show', ['user' => $users[$user]->id])}}"><i class="bi bi-binoculars"></i></a>
                        </div>
                        <div class="me-2">
                            <a class="btn btn-primary" href="{{ route('admin.users.edit', ['user' => $users[$user]->id])}}"><i class="bi bi-pen"></i></a>
                        </div>
                        <div class="me-2">
                            <form action="{{ route('admin.users.destroy', ['user' => $users[$user]->id])}}" method="POST">
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