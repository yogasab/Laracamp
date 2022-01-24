<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with(['camp'])->whereUserId(Auth::id())->get();
        return view('dashboard.index')->with([
            'checkouts' => $checkouts
        ]);
    }
}
