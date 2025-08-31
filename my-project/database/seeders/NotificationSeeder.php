<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create sample notifications for each user
            Notification::create([
                'user_id' => $user->id,
                'title' => 'Pembayaran Cicilan Semester Ganjil',
                'body' => 'Pembayaran cicilan semester ganjil jatuh tempo dalam 15 hari. Silakan lakukan pembayaran sebelum tanggal jatuh tempo.',
                'read_at' => null,
            ]);

            Notification::create([
                'user_id' => $user->id,
                'title' => 'KRS Sementara Disimpan',
                'body' => 'KRS sementara telah disimpan. Harap lakukan pengecekan dan konfirmasi sebelum batas waktu yang ditentukan.',
                'read_at' => null,
            ]);

            Notification::create([
                'user_id' => $user->id,
                'title' => 'Jadwal Ujian Tengah Semester',
                'body' => 'Jadwal ujian tengah semester telah diumumkan. Silakan cek jadwal di portal akademik.',
                'read_at' => Carbon::now()->subHours(2), // Read notification
            ]);
        }
    }
} 