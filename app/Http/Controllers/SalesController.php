<?php
namespace App\Http\Controllers;

use \App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;




class SalesController extends Controller
{

    public function ticket(Request $request)
    {
        $sale = Sale::findOrFail($request->get("id"));
        $printerName = "POS-80";
        $connector = new WindowsPrintConnector("$printerName");
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setEmphasis(true);
        $printer->text("Sales Receipt\n");
        $printer->text($sale->created_at . "\n");
        $printer->setEmphasis(false);
        $printer->text("Client: ");
        
        $printer->text("\nhttps://parzibyte.me/blog\n");
        $printer->text("\n===============================\n");
        $total = 0;
        foreach ($sale->products as $product) {
            $subtotal = $product->amount * $product->price;
            $total += $subtotal;
        $printer->setJustification(Printer::JUSTIFY_LEFT);
        $printer->text(sprintf("%.2fx%s\n", $product->amount, $product->description));
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->text('$' . number_format($subtotal, 2) . "\n");
        }
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->text("\n===============================\n");
        $printer->setJustification(Printer::JUSTIFY_RIGHT);
        $printer->setEmphasis(true);
        $printer->text("Total: $" . number_format($total, 2) . "\n");
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 1);
        $printer->text("Thanks for shopping with us\n");
        $printer->text("https://webxpertsolutions.co.ke/");
        $printer->feed(5);
        $printer->close();
        return redirect()->back()->with("message", "Receipt Printed");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

  public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $sales = Sale::get();
 
            return Datatables::of($sales)
                   ->addColumn('action', function($row){
                    $actionBtn = '<a href="{{route("products_sold.edit",[$sales])}}" class="edit btn btn-success btn-sm">Edit</a>
					<a href="{{route("products_sold.destroy", [$sales])}}" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
				
                ->make(true);;
					
        }            
        return view('sales.sales_index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $total = 0;
        foreach ($sale->products as $product) {
            $total += $product->amount * $product->price;
        }
        return view("sales.sales_show", [
            "sale" => $sale,
            "total" => $total,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route("sales.index")
           ->with([
                    "message" => "Sales Succesfully Deleted",
                    "type" => "warning"
                ]);
    }
}
