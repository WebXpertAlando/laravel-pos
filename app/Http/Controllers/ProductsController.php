<?php


namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\Paginator;

use DataTables;

use Illuminate\Support\Facades\Route;

class ProductsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $products = Product::get();
 
            return Datatables::of($products)
                   ->addColumn('action', function($row){
                    $actionBtn = '<a href="{{route("products.edit",[$product])}}" class="edit btn btn-success btn-sm"><i class="glyphicon glyphicon-trash"></i> Edit</a>
					<a href="{{route("products.destroy", [$product])}}" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
				
                ->make(true);;
					
        }            
        return view('products.products_index');
    }

	


	
	
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.products_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->input());
        $product->saveOrFail();
        return redirect()->route("products.index")->with("message", "Product Successfully Saved");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $producto
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("products.products_edit", ["product" => $product,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->fill($request->input());
        $product->saveOrFail();
        return redirect()->route("products.index")->with("message", "Product successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route("products.index")->with("message", "Product deleted successfully");
    }
}


