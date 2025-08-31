<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Kartu Rencana Studi (KRS)
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola mata kuliah yang akan diambil</p>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @if (session('status'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-900/40 dark:bg-green-900/30 dark:text-green-200">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-red-800 dark:border-red-900/40 dark:bg-red-900/30 dark:text-red-200">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Status Pembayaran -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Status Pembayaran</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-4">
                        <div class="text-sm text-blue-600 dark:text-blue-400 font-medium">Total Tagihan</div>
                        <div class="text-2xl font-bold text-blue-700 dark:text-blue-300">Rp {{ number_format($totalPayments, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/30 rounded-lg p-4">
                        <div class="text-sm text-green-600 dark:text-green-400 font-medium">Sudah Dibayar</div>
                        <div class="text-2xl font-bold text-green-700 dark:text-green-300">Rp {{ number_format($paidPayments, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-amber-50 dark:bg-amber-900/30 rounded-lg p-4">
                        <div class="text-sm text-amber-600 dark:text-amber-400 font-medium">Status KRS</div>
                        <div class="text-lg font-bold text-amber-700 dark:text-amber-300">
                            @if($canAddKRS)
                                <span class="text-green-600 dark:text-green-400">✓ Dapat Menambah KRS</span>
                            @else
                                <span class="text-red-600 dark:text-red-400">✗ Belum Dapat Menambah KRS</span>
                            @endif
                        </div>
                    </div>
                </div>
                @if(!$canAddKRS)
                    <div class="mt-4 p-4 bg-red-50 dark:bg-red-900/30 border border-red-200 dark:border-red-700 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                            <p class="text-red-700 dark:text-red-300">
                                Anda harus melunasi minimal 50% tagihan (Rp {{ number_format($totalPayments * 0.5, 0, ',', '.') }}) untuk dapat menambah KRS.
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- KRS Saat Ini -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">KRS Saat Ini</h3>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Total SKS: <span class="font-semibold">{{ $currentKRS->sum('sks') }}</span>
                    </div>
                </div>
                
                @if($currentKRS->count() > 0)
                    <div class="grid gap-4">
                        @foreach($currentKRS as $krs)
                            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        {{ $krs->kode_mk }}
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $krs->nama_mk }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $krs->sks }} SKS • Kelas {{ $krs->kelas }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('krs.detail', $krs->id) }}" class="text-blue-600 hover:text-blue-700 dark:text-blue-400 text-sm">Detail</a>
                                    <form method="POST" action="{{ route('krs.remove-course', $krs->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 dark:text-red-400 text-sm" onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <p class="text-gray-500 dark:text-gray-400">Belum ada mata kuliah di KRS</p>
                    </div>
                @endif
            </div>

            <!-- Mata Kuliah Tersedia -->
            @if($canAddKRS)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-6">Mata Kuliah Tersedia</h3>
                    <div class="grid gap-4">
                        @foreach($availableCourses as $course)
                            @php
                                $isEnrolled = $currentKRS->where('kode_mk', $course['kode_mk'])->count() > 0;
                            @endphp
                            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 {{ $isEnrolled ? 'bg-gray-50 dark:bg-gray-700/50' : 'bg-white dark:bg-gray-800' }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            {{ $course['kode_mk'] }}
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $course['nama_mk'] }}</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ $course['sks'] }} SKS • Semester {{ $course['semester'] }}
                                                @if($course['prasyarat'])
                                                    • Prasyarat: {{ $course['prasyarat'] }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        @if($isEnrolled)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Sudah Diambil
                                            </span>
                                        @else
                                            <form method="POST" action="{{ route('krs.add-course') }}" class="inline">
                                                @csrf
                                                <input type="hidden" name="kode_mk" value="{{ $course['kode_mk'] }}">
                                                <input type="hidden" name="nama_mk" value="{{ $course['nama_mk'] }}">
                                                <input type="hidden" name="sks" value="{{ $course['sks'] }}">
                                                <button type="submit" class="inline-flex items-center px-3 py-1 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 transition-colors duration-200">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Tambah
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>


