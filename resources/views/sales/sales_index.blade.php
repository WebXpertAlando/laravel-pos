
@extends("master")
@section("title", "Sales")
@section("contents")
    <div class="row">
        <div class="col-12">
		<br/>
		<br/>
		<br/>
		
		<div class="container">

		
		
		
            <h1>Sales <i class="fa fa-list"></i></h1>
            @include("notification")
            <div class="table-responsive">
                <table class="table table-borderd">
                    <thead>
                    <tr>
                        <th>Date</th>
                       
                        <th>Total</th>
                        <th>Sales Receipt</th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
					<tr>

                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{$sale->created_at}}</td>
                          
                            <td>Ksh{{number_format($sale->total, 2)}}</td>
                            <td>
                                <a class="btn btn-info" href="{{route("Sales.ticket", ["id"=>$sale->id])}}">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{route("sales.show", $sale)}}">
                                    <i class="fa fa-info"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("sales.destroy", [$sale])}}" method="POST">
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
				<br/>
				<br/>
				<br/>
				
				{{ $sales->links() }}
            </div>
        </div>
    </div>
@endsection
