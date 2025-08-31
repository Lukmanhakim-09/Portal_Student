<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        // Total mahasiswa yang registrasi
        $totalMahasiswa = User::where('role', 'student')->count();
        
        // Mahasiswa yang sudah membayar
        $sudahMembayar = User::where('role', 'student')->where('payment_status', 'lunas')->count();
        
        // Mahasiswa yang sudah mengajukan KRS
        $sudahAjukanKRS = User::where('role', 'student')->whereHas('krsEnrollments')->count();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'sudahMembayar',
            'sudahAjukanKRS'
        ));
    }
}
