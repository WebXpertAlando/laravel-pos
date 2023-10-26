<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\ProductSold;
use App\Sale;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function endOrCancelSale(Request $request)
    {
        if ($request->input("action") == "cancelSale") {
            return $this->finishSale($request);
        } else if ($request->input("action2") == "cancelSale") {
            return $this->cancelSale();
        }
    }

    public function finishSale(Request $request)
    {
        // Create a Sale
        $sale = new Sale();
       
        $sale->saveOrFail();
        $idSale = $sale->id;
        $products = $this->getProducts();
        // Record a shopping Cart
        foreach ($products as $product) {
            // The product that is sold...
            $productSold = new ProductSold();
            $productSold->fill([
                "id_sale" => $idSale,
                "description" => $product->description,
                "barcode" => $product->barcode,
                "price" => $product->sales_price,
                "amount" => $product->amount,
            ]);
            // We keep it
            $productSold->saveOrFail();
            // Y We submit the existence of the original

            $productUpdated = Product::find($product->id);
            $productUpdated->existence -= $productSold->amount;
            $productUpdated->saveOrFail();
        }
        $this->emptyProducts();
        return redirect()
            ->route("vendor.index")
            ->with("message", "Sales Successfully Finished");
    }

    private function getProducts()
    {
        $products = session("products");
        if (!$products) {
            $products = [];
        }
        return $products;
    }

    private function emptyProducts()
    {
     $this->emptyProducts(Null);   
    }

    private function saveProducts($products)
    {
        session(["products" => $products,
        ]);
    }

    public function cancelSale()
    {
        $this->emptyProducts();
        return redirect()
            ->route("vendor.index")
           ->with([
                    "message" => "Sales Cancelled",
                    "type" => "warning"
                ]);
    }

    public function removeSaleProduct(Request $request)
    {
        $index = $request->post("index");
        $products = $this->getProducts();
        array_splice($products, $index, 1);
        $this->saveProducts($products);
        return redirect()
            ->route("vendor.index");
    }

    public function addProductSales(Request $request)
    {
        $code = $request->post("code");
        $product = Product::where("barcode", "=", $code)->first();
        if (!$product) {
            return redirect()
                ->route("vendor.index")
                ->with([
                    "message" => "Product not Found",
                    "type" => "danger"
                ]);
        }
        $this->addProduct($product);
        return redirect()
            ->route("vendor.index");
    }

    private function addProduct($product)
    {
        if ($product->existence <= 0) {
            return redirect()->route("vendor.index")
                ->with([
                    "message" => "No product available in  Stock",
                    "type" => "danger"
                ]);
        }
        $products = $this->getProducts();
        $possibleIndex = $this->searchProductIndex($product->barcode, $products);
        // Es decir, producto no fue encontrado
        if ($possibleIndex === -1) {
            $product->amount = 1;
            array_push($products, $product);
        } else {
            if ($products[$possibleIndex]->amount + 1 > $product->existence) {
                return redirect()->route("vendor.index")
                    ->with([
                        "message" => "You can not add more products of this type, they would be left without existence",
                        "type" => "danger"
                    ]);
            }
            $products[$possibleIndex]->amount++;
        }
        $this->saveProducts($products);
    }

    private function searchProductIndex(string $code, array &$products)
    {
        foreach ($products as $index => $product) {
            if ($product->barcode === $code) {
                return $index;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        foreach ($this->getProducts() as $product) {
            $total += $product->amount * $product->sales_price;
        }
        return view("vendor.vendor",
            [
                "total" => $total,
                "clients" => Client::all(),
            ]);
    }
}
