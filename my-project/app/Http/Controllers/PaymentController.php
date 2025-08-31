<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Carbon; // Carbon is in Illuminate\Support\Carbon or Carbon\Carbon; we'll use now()

class PaymentController extends Controller
{
    public function simulate(Request $request): RedirectResponse
    {
        $user = $request->user();
        if ($user) {
            $user->payment_status = 'lunas';
            $user->save();

            // Mark ALL pending payments as PAID
            Payment::where('user_id', $user->id)
                ->where('status', 'PENDING')
                ->update([
                    'status' => 'PAID',
                    'paid_at' => now(),
                ]);
        }

        return redirect()->route('dashboard')->with('status', 'Pembayaran berhasil. Status: Lunas.');
    }
} 