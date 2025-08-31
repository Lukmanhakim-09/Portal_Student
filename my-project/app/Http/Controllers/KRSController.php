<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\KRSEnrollment;
use App\Models\Payment;

class KRSController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        
        // Check if user has paid all payments
        $totalPayments = Payment::where('user_id', $user->id)->sum('amount');
        $paidPayments = Payment::where('user_id', $user->id)->where('status', 'PAID')->sum('amount');
        $canAddKRS = $paidPayments >= $totalPayments * 0.5; // At least 50% paid
        
        $currentKRS = KRSEnrollment::where('user_id', $user->id)->get();
        
        // Sample available courses
        $availableCourses = [
            [
                'kode_mk' => 'IF101',
                'nama_mk' => 'Pemrograman Dasar',
                'sks' => 3,
                'semester' => 1,
                'prasyarat' => null
            ],
            [
                'kode_mk' => 'IF102',
                'nama_mk' => 'Matematika Diskrit',
                'sks' => 3,
                'semester' => 1,
                'prasyarat' => null
            ],
            [
                'kode_mk' => 'IF201',
                'nama_mk' => 'Struktur Data',
                'sks' => 3,
                'semester' => 2,
                'prasyarat' => 'IF101'
            ],
            [
                'kode_mk' => 'IF202',
                'nama_mk' => 'Algoritma dan Pemrograman',
                'sks' => 4,
                'semester' => 2,
                'prasyarat' => 'IF101'
            ],
            [
                'kode_mk' => 'IF301',
                'nama_mk' => 'Basis Data',
                'sks' => 3,
                'semester' => 3,
                'prasyarat' => 'IF201'
            ],
            [
                'kode_mk' => 'IF302',
                'nama_mk' => 'Pemrograman Web',
                'sks' => 3,
                'semester' => 3,
                'prasyarat' => 'IF202'
            ]
        ];
        
        return view('krs.index', compact('currentKRS', 'availableCourses', 'canAddKRS', 'paidPayments', 'totalPayments'));
    }

    public function addCourse(Request $request)
    {
        $user = $request->user();
        
        // Check if user can add KRS
        $totalPayments = Payment::where('user_id', $user->id)->sum('amount');
        $paidPayments = Payment::where('user_id', $user->id)->where('status', 'PAID')->sum('amount');
        
        if ($paidPayments < $totalPayments * 0.5) {
            return redirect()->back()->with('error', 'Anda harus melunasi minimal 50% tagihan untuk dapat menambah KRS.');
        }
        
        $request->validate([
            'kode_mk' => 'required|string|max:10',
            'nama_mk' => 'required|string|max:255',
            'sks' => 'required|integer|min:1|max:6',
        ]);
        
        // Check if course already exists in KRS
        $existingCourse = KRSEnrollment::where('user_id', $user->id)
            ->where('kode_mk', $request->kode_mk)
            ->first();
            
        if ($existingCourse) {
            return redirect()->back()->with('error', 'Mata kuliah ini sudah ada di KRS Anda.');
        }
        
        // Add course to KRS
        KRSEnrollment::create([
            'user_id' => $user->id,
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'sks' => $request->sks,
            'kelas' => 'A', // Default class
            'hari' => 'Senin', // Default schedule
            'mulai' => '08:00',
            'selesai' => '10:30',
        ]);
        
        return redirect()->back()->with('status', 'Mata kuliah berhasil ditambahkan ke KRS.');
    }

    public function removeCourse(Request $request, $id)
    {
        $user = $request->user();
        
        $krs = KRSEnrollment::where('user_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();
            
        $krs->delete();
        
        return redirect()->back()->with('status', 'Mata kuliah berhasil dihapus dari KRS.');
    }
}
