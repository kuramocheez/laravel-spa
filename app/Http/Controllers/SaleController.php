<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function list()
    {
        return response()->json(Sale::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string',
            'product_name' => 'required|string',
            'qty' => 'required|integer',
            'total_ammount' => 'required|numeric',
        ]);

        return response()->json(Sale::create($data));
    }

    public function show($id)
    {
        return response()->json(Sale::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update($request->all());
        return response()->json($sale);
    }

    public function destroy($id)
    {
        return response()->json(Sale::destroy($id));
    }
}
