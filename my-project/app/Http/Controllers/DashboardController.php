<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\KRSEnrollment;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        // Check if user has payments, if not create default payments
        if ($user->payments()->count() === 0) {
            $this->createDefaultPayments($user);
        }

        $payments = Payment::where('user_id', $user->id)
            ->orderBy('due_date')
            ->get();
        $latestPending = $payments->firstWhere('status', 'PENDING');
        $totalAmount = (int) $payments->sum('amount');
        
        // If user status is lunas, show all as paid
        if ($user->payment_status === 'lunas') {
            $paidAmount = $totalAmount;
            $remainingAmount = 0;
        } else {
            $paidAmount = (int) $payments->where('status', 'PAID')->sum('amount');
            $remainingAmount = max($totalAmount - $paidAmount, 0);
        }

        $notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $krs = KRSEnrollment::where('user_id', $user->id)
            ->orderBy('kode_mk')
            ->get();

        return view('dashboard', [
            'payments' => $payments,
            'latestPending' => $latestPending,
            'totalAmount' => $totalAmount,
            'paidAmount' => $paidAmount,
            'remainingAmount' => $remainingAmount,
            'notifications' => $notifications,
            'krs' => $krs,
        ]);
    }

    public function markAsRead(Request $request, $id)
    {
        $user = $request->user();
        
        $notification = Notification::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
            
        $notification->update(['read_at' => now()]);
        
        return redirect()->back()->with('status', 'Notifikasi telah ditandai sebagai terbaca.');
    }

    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        
        Notification::where('user_id', $user->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
        
        return redirect()->back()->with('status', 'Semua notifikasi telah ditandai sebagai terbaca.');
    }

    public function showDetail(Request $request, $id)
    {
        $user = $request->user();
        
        $krs = KRSEnrollment::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
            
        return view('krs.detail', compact('krs'));
    }

    public function showSilabus(Request $request, $id)
    {
        $user = $request->user();
        
        $krs = KRSEnrollment::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
            
        return view('krs.silabus', compact('krs'));
    }

    /**
     * Create default payment records for user
     */
    private function createDefaultPayments($user): void
    {
        // First payment - already paid
        Payment::create([
            'user_id' => $user->id,
            'amount' => 5000000, // 5 juta
            'due_date' => now()->addDays(30),
            'status' => 'PAID',
            'paid_at' => now()->subDays(15),
        ]);

        // Second payment - pending
        Payment::create([
            'user_id' => $user->id,
            'amount' => 2500000, // 2.5 juta
            'due_date' => now()->addDays(45),
            'status' => 'PENDING',
        ]);

        // Third payment - future
        Payment::create([
            'user_id' => $user->id,
            'amount' => 3000000, // 3 juta
            'due_date' => now()->addDays(90),
            'status' => 'PENDING',
        ]);
    }
} 