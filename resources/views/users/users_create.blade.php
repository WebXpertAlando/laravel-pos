
@extends("master")
@section("title", "Add Users")
@section("contents")

<br/>
<br/>
<br/>

<div class="container">

    <div class="row">
        <div class="col-12">
            <h1>Add Users <i class="fa fa-users"></i></h1>
            <form method="POST" action="{{route("users.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Name</label>
                    <input required autocomplete="off" name="name" class="form-control"
                           type="text" placeholder="Name">
                </div>
                <div class="form-group">
                    <label class="label">Email</label>
                    <input required autocomplete="off" name="email" class="form-control"
                           type="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label class="label">Password</label>
                    <input required autocomplete="off" name="password" class="form-control"
                           type="password" placeholder="password">
                </div>

                @include("notification")
                <button class="btn btn-success">Save</button>
                <a class="btn btn-primary" href="{{route("users.index")}}">Back to List</a>
            </form>
        </div>
    </div>
	</div>
@endsection
