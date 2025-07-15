<?php

namespace App\Http\Controllers;

use App\Models\Export;
use App\Http\Requests\StoreExportRequest;
use App\Http\Requests\UpdateExportRequest;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listEkspor()
    {
        $exports = Export::with(['customer', 'product'])->get();
        $customers = \App\Models\Customer::all();
        $products = \App\Models\Product::all();

        return view('pages.ekspor.index', compact('exports', 'customers', 'products'))->with('listExports', $exports);
    }

    public function createEkspor(Request $request)
    {
    $request->validate([
        'tanggal_ekspor' => 'required|date',
        'customer_id' => 'required|exists:customers,id',
        'product_id' => 'required|exists:products,id',
        'negara_tujuan' => 'required|string',
        'volume_ekspor' => 'required|numeric',
        'biaya_produksi' => 'required|numeric',
        'laba_bersih' => 'required|numeric',
    ]);

    Export::create([
        'export_date' => $request->tanggal_ekspor,
        'customer_id' => $request->customer_id,
        'product_id' => $request->product_id,
        'country' => $request->negara_tujuan,
        'volume' => $request->volume_ekspor,
        'price' => $request->biaya_produksi,
        'net_profit' => $request->laba_bersih,
    ]);

        return redirect()->route('ekspor.index')->with('success', 'Data ekspor berhasil ditambahkan!');
    }

    public function updateEkspor(Request $request)
    {
    $request->validate([
        'id' => 'required|exists:exports,id',
        'tanggal_ekspor' => 'required|date',
        'customer_id' => 'required|exists:customers,id',
        'product_id' => 'required|exists:products,id',
        'negara_tujuan' => 'required|string',
        'volume_ekspor' => 'required|numeric',
        'biaya_produksi' => 'required|numeric',
        'laba_bersih' => 'required|numeric',
    ]);

    $export = \App\Models\Export::findOrFail($request->id);
    $export->update([
        'export_date' => $request->tanggal_ekspor,
        'customer_id' => $request->customer_id,
        'product_id' => $request->product_id,
        'country' => $request->negara_tujuan,
        'volume' => $request->volume_ekspor,
        'price' => $request->biaya_produksi,
        'net_profit' => $request->laba_bersih,
    ]);

        return redirect()->back()->with('success', 'Data ekspor berhasil diperbarui!');
    }

    public function deleteEkspor(Request $request)
    {
    $request->validate([
        'id' => 'required|exists:exports,id',
    ]);

    $export = \App\Models\Export::findOrFail($request->id);
    $export->delete();

        return redirect()->back()->with('success', 'Data ekspor berhasil dihapus.');
    }
}
