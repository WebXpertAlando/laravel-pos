<?php
public function FinishSale()
{
    // Create as Sale
    $sale = new Sale();
    $sale->saveOrFail();
    $idSale = $sale->id;
    $products = $this->getProducts();
    // Tour shopping cart
    foreach ($products as $product) {
        // The product sold...
        $productSold = new ProductSold();
        $productSold->fill([
            "id_sale" => $idSale,
            "description" => $product->description,
            "barcode" => $product->barcode,
            "price" => $product->price_sold,
            "amount" => $product->amount,
        ]);
        // We Save it
        $productSold->saveOrFail();
        // Y We subtract the existence of the original
        $productUpdated = Product::find($product->id);
        $productUpdated->existence -= $productSold->amount;
        $productUpdated->saveOrFail();
    }
    $this->emptyProducts();
    return redirect()
        ->route("vendor.index")
        ->with("message", "Sales Cancelled");
}