extends("master")
@section("title", "Receipt")
@section("contents")
    <div class="row">
        <div class="col-12">
		<br/>
		<br/>
		<br/>
		
		<div class="container">

		
		
		
            <h1>Sales <i class="fa fa-list"></i></h1>
            @include("notification")
			
			foreach ($sale->products as $product) {
			
			$subtotal = $product->quantity * $product->price;
			
			$total += $subtotal;
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div>
			
			@endsection
