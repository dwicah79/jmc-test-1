@extends('layout.template')
@section('title', 'Edit Kabupaten')
@section('content')
    <div class="mt-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Data Kabupaten</h2>
        <form action="{{ route('regencies.update', $regency->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Kabupaten</label>
                <input type="text" name="name" id="name" value="{{ old('name', $regency->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                    required>
                @error('name')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="population" class="block text-sm font-medium text-gray-700">Jumlah Populasi</label>
                <input type="number" name="population" id="population"
                    value="{{ old('population', $regency->population) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    required>
                @error('population')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="province_id" class="block text-sm font-medium text-gray-700">Provinsi</label>
                <select name="province_id" id="province_id"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
                    required>
                    <option value="">-- Pilih Provinsi --</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}"
                            {{ old('province_id', $regency->province_id) == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                @error('province_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4">
                <x-button type="submit" class="w-full bg-blue-600 hover:bg-blue-700">
                    Update
                </x-button>
            </div>
        </form>
    </div>
@endsection
