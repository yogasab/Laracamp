<?php

namespace App\Http\Controllers\Admin\Checkout;

use App\Http\Controllers\Controller;
use App\Mail\Admin\AdminUpdatePaymentStatus;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function updatePaymentStatus(Checkout $checkout, Request $request)
    {
        $checkout->is_paid = true;
        $checkout->save();

        Mail::to($checkout->user->email)->send(new AdminUpdatePaymentStatus($checkout));

        $request->session()->flash('success', 'Payment status changed to paid successfully');
        return redirect()->route('admin.dashboard');
    }
}
