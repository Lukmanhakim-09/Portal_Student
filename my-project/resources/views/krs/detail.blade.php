<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Detail Mata Kuliah
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Informasi lengkap mata kuliah</p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500 text-white text-sm font-medium rounded-md transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Header Mata Kuliah -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 px-6 py-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $krs->kode_mk }}
                                </div>
                                <div class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $krs->sks }} SKS
                                </div>
                                <div class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    Kelas {{ $krs->kelas }}
                                </div>
                            </div>
                            <h1 class="text-3xl font-bold text-white mb-2">{{ $krs->nama_mk }}</h1>
                            <p class="text-blue-100">Semester Ganjil 2024/2025</p>
                        </div>
                        <div class="text-right">
                            <div class="bg-white/20 rounded-lg p-4">
                                <div class="text-white text-sm">Status</div>
                                <div class="text-white font-bold">Terdaftar</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Informasi Jadwal -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Jadwal Kuliah -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Jadwal Kuliah
                        </h3>
                        @if($krs->hari && $krs->mulai && $krs->selesai)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-blue-500 text-white p-2 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm text-gray-600 dark:text-gray-400">Hari</div>
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">{{ $krs->hari }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-green-50 dark:bg-green-900/30 rounded-lg p-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-green-500 text-white p-2 rounded-lg">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm text-gray-600 dark:text-gray-400">Waktu</div>
                                            <div class="font-semibold text-gray-900 dark:text-gray-100">{{ $krs->mulai }} - {{ $krs->selesai }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p class="text-gray-500 dark:text-gray-400">Jadwal belum tersedia</p>
                            </div>
                        @endif
                    </div>

                    <!-- Deskripsi Mata Kuliah -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Deskripsi Mata Kuliah
                        </h3>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                Mata kuliah ini memberikan pemahaman mendalam tentang konsep dan implementasi dalam bidang yang relevan. 
                                Mahasiswa akan mempelajari teori-teori fundamental serta aplikasi praktis yang dapat diterapkan dalam 
                                dunia kerja maupun penelitian.
                            </p>
                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Tujuan Pembelajaran:</h4>
                                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Memahami konsep dasar dan teori</li>
                                        <li>• Mampu mengaplikasikan pengetahuan</li>
                                        <li>• Mengembangkan kemampuan analitis</li>
                                        <li>• Meningkatkan keterampilan praktis</li>
                                    </ul>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Kompetensi:</h4>
                                    <ul class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                        <li>• Penguasaan materi pembelajaran</li>
                                        <li>• Kemampuan problem solving</li>
                                        <li>• Keterampilan komunikasi</li>
                                        <li>• Kerja tim dan kolaborasi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Informasi Dosen -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Dosen Pengampu
                        </h3>
                        <div class="text-center">
                            <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-full mx-auto mb-3 flex items-center justify-center">
                                <span class="text-white font-bold text-xl">DR</span>
                            </div>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Dr. Ahmad Rahman, M.Kom</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Dosen Fakultas Teknik</p>
                            <div class="mt-3">
                                <a href="mailto:dosen@example.com" class="text-sm text-blue-600 hover:text-blue-700 dark:text-blue-400">dosen@example.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Statistik -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Statistik</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Kehadiran</span>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">85%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Tugas</span>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">3/5</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: 60%"></div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Nilai Sementara</span>
                                <span class="font-semibold text-gray-900 dark:text-gray-100">A-</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Aksi Cepat</h3>
                        <div class="space-y-3">
                            <a href="{{ route('krs.silabus', $krs->id) }}" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Lihat Silabus
                            </a>
                            <button class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-600 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Download Materi
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


