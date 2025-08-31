<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Notification;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Create default payment records for new user
        $this->createDefaultPayments($user);
        
        // Create welcome notification
        $this->createWelcomeNotification($user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    /**
     * Create default payment records for new user
     */
    private function createDefaultPayments(User $user): void
    {
        // First payment - already paid
        Payment::create([
            'user_id' => $user->id,
            'amount' => 5000000, // 5 juta
            'due_date' => Carbon::now()->addDays(30),
            'status' => 'PAID',
            'paid_at' => Carbon::now()->subDays(15),
        ]);

        // Second payment - pending
        Payment::create([
            'user_id' => $user->id,
            'amount' => 2500000, // 2.5 juta
            'due_date' => Carbon::now()->addDays(45),
            'status' => 'PENDING',
        ]);

        // Third payment - future
        Payment::create([
            'user_id' => $user->id,
            'amount' => 3000000, // 3 juta
            'due_date' => Carbon::now()->addDays(90),
            'status' => 'PENDING',
        ]);
    }

    /**
     * Create welcome notification for new user
     */
    private function createWelcomeNotification(User $user): void
    {
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Selamat Datang di Portal Mahasiswa',
            'body' => 'Selamat datang ' . $user->name . '! Akun Anda telah berhasil dibuat. Silakan lengkapi profil dan cek tagihan pembayaran Anda.',
        ]);

        Notification::create([
            'user_id' => $user->id,
            'title' => 'Pembayaran Cicilan Pertama',
            'body' => 'Tagihan pembayaran cicilan pertama telah tersedia. Silakan lakukan pembayaran sebelum tanggal jatuh tempo.',
        ]);
    }
}
