<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Requests\Purchase\StoreRequest;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }


    public function create()
    {
        $providers = Provider::get();
        $products = Product::where('status', 'ACTIVE')->get();

        return view('admin.purchase.create', compact('providers', 'products'));
    }


    public function store(StoreRequest $request)
    {
        try {
            $purchase = Purchase::create($request->all() + [
                'user_id' => Auth::user()->id,
                'purchase_date' => Carbon::now('America/Bogota'),
            ]);
            foreach ($request->product_id as $key => $product) {
                $results[] = array("product_id" => $request->product_id[$key], "quantity" => $request->quantity[$key], "price" => $request->price[$key]);
            }
            $purchase->purchaseDetails()->createMany($results);
            return redirect()->route('purchases.index')->with('success', 'Nueva compra éxitosa');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al realizar la compra');
        }
    }

    public function show(purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }


    public function edit(purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.edit', compact('purchase'));
    }

    public function destroy(purchase $purchase)
    {
        try {
            $purchase->delete();
            return redirect()->route('purchases.index')->with('success', 'Compra eliminada');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', 'Ocurrió un error al eliminar la compra');
        }
    } 

    public function pdf(purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('reporte_de_compra_' . $purchase->id . '.pdf');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'VALID') {
            $purchase->update(['status' => 'CANCELED']);
            return redirect()->back()->with('error', 'Factura no pagada');
        } else {
            $purchase->update(['status' => 'VALID']);
            return redirect()->back()->with('success', 'Factura pagado');
        }
    }
}
