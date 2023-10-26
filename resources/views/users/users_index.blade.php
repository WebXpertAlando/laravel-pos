
@extends("master")
@section("title", "Users")
@section("contents")

<br/>
<br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Users <i class="fa fa-users"></i></h1>
            <a href="{{route("users.create")}}" class="btn btn-success mb-2">Add User</a>
            @include("notification")
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->email}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("users.edit",[$user])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("users.destroy", [$user])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	
	</div>
@endsection
