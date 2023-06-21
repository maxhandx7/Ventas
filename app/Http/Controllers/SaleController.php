<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use App\Product;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Sale\StoreRequest;

class SaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:sales.create')->only(['create', 'store']);
        $this->middleware('can:sales.index')->only(['index']);
        $this->middleware('can:sales.show')->only(['show']);
        $this->middleware('can:sales.destroy')->only(['destroy']);
        
        $this->middleware('can:change.status.sales')->only(['change_status']);
        $this->middleware('can:sales.pdf')->only(['pdf']);
        $this->middleware('can:sales.print')->only(['print']);
    }


    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }


    public function create()
    {
        $products = Product::where('status', 'ACTIVE')->get();
        $clients = Client::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }


    public function store(StoreRequest $request)
    {
        try {
            $sale =  Sale::create($request->all() + [
                'user_id' => Auth::user()->id,
                'sale_date' => Carbon::now('America/Bogota'),
            ]);
            foreach ($request->product_id as $key => $product) {
                $results[] = array("product_id" => $request->product_id[$key], "quantity" => $request->quantity[$key], "price" => $request->price[$key], "discount" => $request->discount[$key]);
            }
            $sale->saleDetails()->createMany($results);
            return redirect()->route('sales.index')->with('success', 'Nueva venta éxitosa');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al realizar venta');
        }
    }

    public function show(sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }


    public function edit(sale $sale)
    {
        $products = Product::get();
        $clients = Client::get();
        return view('admin.sale.edit', compact('sale'));
    }

    public function destroy(sale $sale)
    {
        try {
            $sale->delete();
            return redirect()->route('sales.index')->with('success', 'Venta eliminada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la venta');
        }
    }

    public function pdf(sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('reporte_de_venta_' . $sale->id . '.pdf');
    }

    public function print(Sale $sale)
    {
        try {
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount / 100;
            }

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status' => 'CANCELED']);
            return redirect()->back()->with('error', 'Factura no pagada');
        } else {
            $sale->update(['status' => 'VALID']);
            return redirect()->back()->with('success', 'Factura pagado');
        }
    }
}
