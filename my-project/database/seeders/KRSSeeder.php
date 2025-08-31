<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\KRSEnrollment;

class KRSSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // Create sample KRS enrollments for each user
            KRSEnrollment::create([
                'user_id' => $user->id,
                'kode_mk' => 'IF101',
                'nama_mk' => 'Pemrograman Dasar',
                'sks' => 3,
                'kelas' => 'A',
                'hari' => 'Senin',
                'mulai' => '08:00:00',
                'selesai' => '10:30:00',
            ]);

            KRSEnrollment::create([
                'user_id' => $user->id,
                'kode_mk' => 'IF102',
                'nama_mk' => 'Struktur Data',
                'sks' => 3,
                'kelas' => 'B',
                'hari' => 'Selasa',
                'mulai' => '13:00:00',
                'selesai' => '15:30:00',
            ]);

            KRSEnrollment::create([
                'user_id' => $user->id,
                'kode_mk' => 'IF103',
                'nama_mk' => 'Basis Data',
                'sks' => 3,
                'kelas' => 'A',
                'hari' => 'Rabu',
                'mulai' => '10:00:00',
                'selesai' => '12:30:00',
            ]);
        }
    }
} 