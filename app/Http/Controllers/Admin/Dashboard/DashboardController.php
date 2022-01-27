<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Checkout;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with(['camp'])->latest()->get();
        return view('admin.dashboard')->with([
            'checkouts' => $checkouts
        ]);
    }
}
