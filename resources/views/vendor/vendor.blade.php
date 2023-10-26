@extends("master")
@section("title", "New Sale")
@section("contents")

<br/>
<br/>

<div class="container">


    <div class="row">
        <div class="col-12">
            <h1>New Sale <i class="fa fa-cart-plus"></i></h1>
            @include("notification")
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route("endOrCancelSale")}}" method="post">
                        @csrf
                        
					
						
                        @if(session("products") !== null)
                            <div class="form-group">
                                <button name="action" value="End Sale" type="submit" class="btn btn-success">Complete
                                    Sale
                                </button>
                                
                            </div>
                        @endif
                 </form>
                </div>
				
				 <div class="col-12 col-md-6">
                    <form action="{{route("addProductSale")}}" method="post">
                        @csrf
                    <div align="left"><div class="form-group">
                            <label for="code">Barcode</label>
                            <input id="code" autocomplete="off" required autofocus name="code" type="text"
                                   class="form-control"
                                   placeholder="barcode"></div></div>
                 
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(session("products") !== null)
                <h2>Total: Ksh{{number_format($total, 2)}}</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Bar Code</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                     
				  @foreach(session("products") as $product)
                            <tr>
                                <td>{{$product->barcode}}</td>
                                <td>{{$product->description}}</td>
                                <td>Ksh{{number_format($product->sales_price, 2)}}</td>
                                <td>{{$product->amount}}</td>
                                <td>
                                    <form action="{{route("endOrCancelSale")}}" method="POST">
                                    @method("delete")
                                    @csrf
                                        <input type="hidden" name="indice">
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
            @else
		   
								   
			<img src="{{url("/img/inventory.jpg")}}" width="900" height="400"> 
                   
            @endif
        </div>
    </div>
	
	</div>
@endsection

</div>