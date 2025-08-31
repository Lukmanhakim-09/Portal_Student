<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Payment;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create default payment records for each user
            Payment::create([
                'user_id' => $user->id,
                'amount' => 5000000, // 5 juta
                'due_date' => Carbon::now()->addDays(30),
                'status' => 'PAID',
                'paid_at' => Carbon::now()->subDays(15),
            ]);

            Payment::create([
                'user_id' => $user->id,
                'amount' => 2500000, // 2.5 juta
                'due_date' => Carbon::now()->addDays(45),
                'status' => 'PENDING',
            ]);
        }
    }
} 