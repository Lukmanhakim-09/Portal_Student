<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-8 rounded-xl shadow-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-full p-3">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white mb-1">
                            Selamat Datang, {{ auth()->user()->name }}! 👋
                        </h1>
                        <p class="text-green-100 text-sm">
                            Portal Mahasiswa - Semester Ganjil 2024/2025
                        </p>
                        @if(auth()->user()->role === 'admin')
                            <div class="mt-2">
                                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-3 py-1 bg-green-500 text-white text-xs font-medium rounded-md hover:bg-green-600 transition-colors duration-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Admin Panel
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 text-center">
                        <div class="text-white text-xs font-medium">Status</div>
                        <div class="text-white font-bold text-sm">
                            @if(optional(auth()->user())->payment_status === 'lunas')
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Lunas
                                </span>
                            @else
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    Menunggu
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 text-center">
                        <div class="text-white text-xs font-medium">SKS</div>
                        <div class="text-white font-bold text-sm">{{ $krs->sum('sks') }}</div>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-lg px-4 py-2 text-center">
                        <div class="text-white text-xs font-medium">Mata Kuliah</div>
                        <div class="text-white font-bold text-sm">{{ $krs->count() }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Stats Mobile -->
            <div class="md:hidden mt-4 grid grid-cols-3 gap-3">
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-2 text-center">
                    <div class="text-white text-xs font-medium">Status</div>
                    <div class="text-white font-bold text-xs">
                        @if(optional(auth()->user())->payment_status === 'lunas')
                            <span class="inline-flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Lunas
                            </span>
                        @else
                            <span class="inline-flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Menunggu
                            </span>
                        @endif
                    </div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-2 text-center">
                    <div class="text-white text-xs font-medium">SKS</div>
                    <div class="text-white font-bold text-xs">{{ $krs->sum('sks') }}</div>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-2 text-center">
                    <div class="text-white text-xs font-medium">Mata Kuliah</div>
                    <div class="text-white font-bold text-xs">{{ $krs->count() }}</div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @if (session('status'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-green-800 dark:border-green-900/40 dark:bg-green-900/30 dark:text-green-200">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Ringkasan Tagihan -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Ringkasan Tagihan</h3>
                @php $isLunas = optional(auth()->user())->payment_status === 'lunas'; @endphp
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-5">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Total Tagihan</div>
                        <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-gray-100">Rp {{ number_format($totalAmount, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-5">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Sudah Dibayar</div>
                        <div class="mt-1 text-2xl font-bold text-green-600">Rp {{ number_format($paidAmount, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-5">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Sisa Tagihan</div>
                        <div class="mt-1 text-2xl font-bold text-amber-500">Rp {{ number_format($remainingAmount, 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-5">
                        <div class="text-sm text-gray-500 dark:text-gray-400">Jatuh Tempo Terdekat</div>
                        <div class="mt-1 text-base font-semibold text-gray-900 dark:text-gray-100">{{ optional($latestPending?->due_date)->format('d M Y') ?: '-' }}</div>
                    </div>
                </div>
            </div>

            <!-- Status Pembayaran -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Status Pembayaran</h3>
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="p-5">
                        @php $progress = $totalAmount > 0 ? min(100, round(($paidAmount / $totalAmount) * 100)) : 0; @endphp
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                                @if($isLunas)
                                    <p class="mt-1 inline-flex items-center gap-2 text-sm font-medium text-green-700 bg-green-50 dark:text-green-300 dark:bg-green-900/30 px-3 py-1 rounded-full">Lunas</p>
                                @else
                                    <p class="mt-1 inline-flex items-center gap-2 text-sm font-medium text-amber-600 bg-amber-50 dark:bg-amber-900/30 px-3 py-1 rounded-full">Menunggu Pelunasan</p>
                                @endif
                            </div>
                            @if(!$isLunas)
                                <form method="POST" action="{{ route('payment.simulate') }}">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center text-sm font-medium text-white bg-green-600 hover:bg-green-700 dark:bg-green-600 dark:hover:bg-green-500 px-3 py-2 rounded-md">Bayar Sekarang</button>
                                </form>
                            @else
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Terima kasih</span>
                            @endif
                        </div>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 overflow-hidden">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                            </div>
                            <div class="mt-2 flex justify-between text-xs text-gray-500 dark:text-gray-400">
                                <span>Terbayar {{ 'Rp ' . number_format($paidAmount, 0, ',', '.') }}</span>
                                <span>Total {{ 'Rp ' . number_format($totalAmount, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifikasi -->
            <div>
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Notifikasi</h3>
                    <form method="POST" action="{{ route('notifications.mark-all-read') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-green-700 hover:text-green-800 dark:text-green-300 dark:hover:text-green-200">Tandai semua terbaca</button>
                    </form>
                </div>
                <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg divide-y divide-gray-200 dark:divide-gray-700">
                     @forelse($notifications as $n)
                        <div class="p-4 flex items-start gap-3">
                            @if($n->read_at)
                                <!-- Sudah dibaca - tidak ada indikator -->
                                <span class="mt-0.5 h-2 w-2 rounded-full bg-gray-300 dark:bg-gray-600"></span>
                            @else
                                <!-- Belum dibaca - indikator kuning -->
                            <span class="mt-0.5 h-2 w-2 rounded-full bg-amber-500"></span>
                            @endif
                             
                            @if(!$n->read_at)
                                <form method="POST" action="{{ route('notifications.mark-read', $n->id) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="text-xs text-green-700 hover:text-green-800 dark:text-green-300">Tandai terbaca</button>
                                </form>
                            @else
                                <span class="text-xs text-gray-400 dark:text-gray-500">Sudah dibaca</span>
                            @endif
                        </div>
                    @empty
                        <div class="p-4 text-sm text-gray-500 dark:text-gray-400">Tidak ada notifikasi.</div>
                    @endforelse
                </div>
            </div>

            <!-- Kartu Rencana Studi -->
            <div>
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Kartu Rencana Studi</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Semester Ganjil 2024/2025</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-lg">
                            <div class="text-xs text-blue-600 dark:text-blue-400 font-medium">Total SKS</div>
                            <div class="text-lg font-bold text-blue-700 dark:text-blue-300">{{ $krs->sum('sks') }}</div>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/30 px-4 py-2 rounded-lg">
                            <div class="text-xs text-green-600 dark:text-green-400 font-medium">Mata Kuliah</div>
                            <div class="text-lg font-bold text-green-700 dark:text-green-300">{{ $krs->count() }}</div>
                        </div>
                        <a href="{{ route('krs.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 text-white text-sm font-medium rounded-md transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Kelola KRS
                        </a>
                    </div>
                </div>

                @if($krs->count() > 0)
                    <div class="grid gap-4">
                        @foreach($krs as $item)
                            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 hover:shadow-md transition-shadow duration-200">
                                <div class="p-6">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center space-x-3 mb-3">
                                                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                                    {{ $item->kode_mk }}
                                                </div>
                                                <div class="bg-amber-100 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 px-2 py-1 rounded-md text-xs font-medium">
                                                    {{ $item->sks }} SKS
                                                </div>
                                                <div class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-2 py-1 rounded-md text-xs font-medium">
                                                    Kelas {{ $item->kelas }}
                                                </div>
                                            </div>
                                            
                                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                                                {{ $item->nama_mk }}
                                            </h4>
                                            
                                            @if($item->hari && $item->mulai && $item->selesai)
                                                <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400">
                                                    <div class="flex items-center space-x-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                        <span class="font-medium">{{ $item->hari }}</span>
                                                    </div>
                                                    <div class="flex items-center space-x-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <span>{{ $item->mulai }} - {{ $item->selesai }}</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="text-sm text-gray-500 dark:text-gray-400 italic">
                                                    Jadwal belum tersedia
                                                </div>
                                            @endif
                                        </div>
                                        
                                        <div class="flex items-center space-x-2 ml-4">
                                            <a href="{{ route('krs.detail', $item->id) }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 dark:bg-blue-900/30 dark:text-blue-300 dark:hover:bg-blue-900/50 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Detail
                                            </a>
                                            <a href="{{ route('krs.silabus', $item->id) }}" class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                                Silabus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-12 text-center">
                        <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">Belum ada KRS</h3>
                        <p class="text-gray-500 dark:text-gray-400 mb-6">Anda belum mengisi Kartu Rencana Studi untuk semester ini.</p>
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Isi KRS
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
