<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Silabus {{ $krs->nama_mk }}
                </h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $krs->kode_mk }} - {{ $krs->sks }} SKS</p>
            </div>
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Silabus Mata Kuliah</h3>
                
                <div class="space-y-6">
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Deskripsi</h4>
                        <p class="text-gray-700 dark:text-gray-300">
                            Mata kuliah ini memberikan pemahaman mendalam tentang konsep dan implementasi dalam bidang yang relevan.
                        </p>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Capaian Pembelajaran</h4>
                        <ul class="text-gray-700 dark:text-gray-300 space-y-1">
                            <li>• Memahami konsep dasar dan teori</li>
                            <li>• Mampu mengaplikasikan pengetahuan</li>
                            <li>• Mengembangkan kemampuan analitis</li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Sistem Penilaian</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="flex justify-between">
                                    <span>Tugas</span>
                                    <span class="font-semibold">30%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>UTS</span>
                                    <span class="font-semibold">35%</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>UAS</span>
                                    <span class="font-semibold">35%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-gray-100 mb-2">Dosen Pengampu</h4>
                        <p class="text-gray-700 dark:text-gray-300">Dr. Ahmad Rahman, M.Kom</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
