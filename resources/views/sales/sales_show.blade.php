@extends("master")
@section("title", "Sales Details ")
@section("contents")

  <div class="container">
  
    <div class="row">
        <div class="col-12">
		
		<br/>
		<br/>
		<br/>
            <h1>Sales Details #{{$sale->id}}</h1>
            
			
            @include("notification")
            <a class="btn btn-info" href="{{route("sales.index")}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Return
            </a>
            <a class="btn btn-success" href="{{route("Sales.ticket", ["id" => $sale->id])}}">
                <i class="fa fa-print"></i>&nbsp;Receipt
            </a>
            <h2>Products</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
					<th>Date</th>
                    <th>Description</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sale->products as $product)
                    <tr>
						<td>{{$product->created_at}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->barcode}}</td>
                        <td>${{number_format($product->price, 2)}}</td>
                        <td>{{$product->amount}}</td>
                        <td>${{number_format($product->amount * $product->price, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                   
					<td colspan="4"></td>
                    <td><strong>Total</strong></td>
                    <td><strong>Ksh{{number_format($total, 2)}}</strong></td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
	
	</div>
@endsection
