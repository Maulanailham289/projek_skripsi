<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function listCustomer()
    {
        $listCustomer = Customer::all();
        return view('pages.Customer.index', compact('listCustomer'));
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->back()->with('success', 'Pelanggan berhasil dihapus.');
    }

    public function createCustomer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'contact' => 'required|string|max:50',
            'country' => 'required|string|max:50',
        ]);

        Customer::create($validated);

        return redirect()->back()->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    public function updateCustomer(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'country' => $request->country,
        ]);

        return redirect()->back()->with('success', 'Data customer berhasil diperbarui.');
    }
}
