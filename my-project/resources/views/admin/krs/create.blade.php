@extends('admin.layouts.app')

@section('title', 'Tambah KRS')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Tambah KRS</h1>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
        <form method="POST" action="{{ route('admin.krs.store') }}">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Pilih Mahasiswa</label>
                <select name="user_id" required class="w-full px-3 py-2 border rounded-md">
                    <option value="">Pilih mahasiswa...</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Kode Mata Kuliah</label>
                <input type="text" name="kode_mk" required class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" required class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">SKS</label>
                <input type="number" name="sks" min="1" max="6" required class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Kelas</label>
                <input type="text" name="kelas" required class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Hari</label>
                <select name="hari" class="w-full px-3 py-2 border rounded-md">
                    <option value="">Pilih hari...</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-2">Mulai</label>
                    <input type="time" name="mulai" class="w-full px-3 py-2 border rounded-md">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Selesai</label>
                    <input type="time" name="selesai" class="w-full px-3 py-2 border rounded-md">
                </div>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.krs') }}" class="px-4 py-2 border rounded-md">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Tambah KRS</button>
            </div>
        </form>
    </div>
</div>
@endsection

