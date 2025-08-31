@extends("admin.layouts.app")

@section("title", "Dashboard Admin")

@section("content")
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin</h1>
                        <p class="mt-1 text-sm text-gray-600">KALLA INSTITUTE - Monitoring Mahasiswa</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                        <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Mahasiswa -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Mahasiswa</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalMahasiswa }}</p>
                        <p class="text-xs text-gray-500">Yang sudah registrasi</p>
                    </div>
                </div>
            </div>

            <!-- Sudah Membayar -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Sudah Membayar</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $sudahMembayar }}</p>
                        <p class="text-xs text-gray-500">Status lunas</p>
                    </div>
                </div>
            </div>

            <!-- Sudah Ajukan KRS -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Sudah Ajukan KRS</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $sudahAjukanKRS }}</p>
                        <p class="text-xs text-gray-500">Yang sudah mengisi KRS</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Statistics -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Ringkasan Statistik</h3>
                <p class="text-sm text-gray-600">Data lengkap mahasiswa KALLA INSTITUTE</p>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Total Mahasiswa Detail -->
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                            <span class="text-2xl font-bold text-blue-600">{{ $totalMahasiswa }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Total Mahasiswa</h4>
                        <p class="text-sm text-gray-600">Jumlah mahasiswa yang sudah registrasi dalam sistem</p>
                    </div>

                    <!-- Sudah Membayar Detail -->
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4">
                            <span class="text-2xl font-bold text-green-600">{{ $sudahMembayar }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Sudah Membayar</h4>
                        <p class="text-sm text-gray-600">Mahasiswa dengan status pembayaran lunas</p>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full transition-all duration-500" style="width: {{ $totalMahasiswa > 0 ? ($sudahMembayar / $totalMahasiswa) * 100 : 0 }}%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">{{ $totalMahasiswa > 0 ? round(($sudahMembayar / $totalMahasiswa) * 100, 1) : 0 }}% dari total mahasiswa</p>
                        </div>
                    </div>

                    <!-- Sudah Ajukan KRS Detail -->
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-100 rounded-full mb-4">
                            <span class="text-2xl font-bold text-amber-600">{{ $sudahAjukanKRS }}</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Sudah Ajukan KRS</h4>
                        <p class="text-sm text-gray-600">Mahasiswa yang sudah mengisi kartu rencana studi</p>
                        <div class="mt-4">
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-amber-500 h-2 rounded-full transition-all duration-500" style="width: {{ $totalMahasiswa > 0 ? ($sudahAjukanKRS / $totalMahasiswa) * 100 : 0 }}%"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">{{ $totalMahasiswa > 0 ? round(($sudahAjukanKRS / $totalMahasiswa) * 100, 1) : 0 }}% dari total mahasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Table -->
        <div class="mt-8 bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Tabel Ringkasan</h3>
                <p class="text-sm text-gray-600">Perbandingan data mahasiswa</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Total Mahasiswa</div>
                                        <div class="text-sm text-gray-500">Registrasi</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $totalMahasiswa }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">100%</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    Semua
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Sudah Membayar</div>
                                        <div class="text-sm text-gray-500">Lunas</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sudahMembayar }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $totalMahasiswa > 0 ? round(($sudahMembayar / $totalMahasiswa) * 100, 1) : 0 }}%</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Lunas
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">Sudah Ajukan KRS</div>
                                        <div class="text-sm text-gray-500">Kartu Rencana Studi</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $sudahAjukanKRS }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $totalMahasiswa > 0 ? round(($sudahAjukanKRS / $totalMahasiswa) * 100, 1) : 0 }}%</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    Terisi
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
