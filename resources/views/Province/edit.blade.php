@extends('layout.template')
@section('title', 'Edit Provinsi')
@section('content')
    <div class="mt-8">
        <form action="{{ route('provinces.update', $province->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Provinsi</label>
                <input type="text" name="name" id="name" value="{{ $province->name }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                    required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <x-button type="submit" class="w-full">
                Simpan
            </x-button>
        </form>
    </div>
@endsection
