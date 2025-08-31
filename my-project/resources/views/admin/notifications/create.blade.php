@extends('admin.layouts.app')

@section('title', 'Kirim Notifikasi')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Kirim Notifikasi</h1>
    
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-6">
        <form method="POST" action="{{ route('admin.notifications.store') }}">
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
                <label class="block text-sm font-medium mb-2">Judul</label>
                <input type="text" name="title" required class="w-full px-3 py-2 border rounded-md">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Pesan</label>
                <textarea name="body" rows="4" required class="w-full px-3 py-2 border rounded-md"></textarea>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.notifications') }}" class="px-4 py-2 border rounded-md">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection
