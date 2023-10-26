
@extends("master")
@section("title", "Edit product")
@section("contents")

<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit product</h1>
            <form method="POST" action="{{route("products.update", [$product])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Barcode</label>
                    <input required value="{{$product->barcode}}" autocomplete="off" name="barcode"
                           class="form-control"
                           type="text" placeholder="barcode">
                </div>
                <div class="form-group">
                    <label class="label">Description</label>
                    <input required value="{{$product->description}}" autocomplete="off" name="description"
                           class="form-control"
                           type="text" placeholder="Description">
                </div>
                <div class="form-group">
                    <label class="label">Purchase Price</label>
                    <input required value="{{$product->purchase_price}}" autocomplete="off" name="purchase Price"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio de compra">
                </div>
                <div class="form-group">
                    <label class="label">Sales Price</label>
                    <input required value="{{$product->sales_price}}" autocomplete="off" name="sales_price"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Sales Price">
                </div>
                <div class="form-group">
                    <label class="label">Existence</label>
                    <input required value="{{$product->existence}}" autocomplete="off" name="existence"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Existence">
                </div>

                @include("notification")
                <button class="btn btn-success">Save Product</button>
                <a class="btn btn-primary" href="{{route("products.index")}}">Return</a>
            </form>
        </div>
    </div>
	</div>
@endsection
