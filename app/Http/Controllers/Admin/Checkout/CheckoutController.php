<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function updatePaymentStatus(Checkout $checkout, Request $request)
    {
        $checkout->is_paid = true;
        $checkout->save();
        $request->session()->flash('success', 'Payment status changed to paid successfully');
        return redirect()->route('admin.dashboard');
    }
}
