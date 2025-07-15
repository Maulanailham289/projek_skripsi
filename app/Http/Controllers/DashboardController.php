<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $countProducts = Product::count();
        $countCustomers = Customer::count();

        return view('pages.home', [
            'countProducts' => $countProducts,
            'countCustomers' => $countCustomers,
        ]);
    }
}
