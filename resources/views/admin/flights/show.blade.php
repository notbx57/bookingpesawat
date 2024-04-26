<!-- resources/views/admin/flights/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Flight Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Display flight details here -->
                    <p><strong>Maskapai:</strong> {{ $flight->nama_maskapai }}</p>
                    <p><strong>Dari:</strong> {{ $flight->dari }}</p>
                    <p><strong>Ke:</strong> {{ $flight->ke }}</p>
                    <p><strong>Tanggal:</strong> {{ $flight->tanggal }}</p>
                    <p><strong>Harga:</strong> {{ $flight->harga }}</p>
                    <!-- Add other flight details as needed -->

                    <div class="mt-4">
                        <a href="{{ route('admin.flights.edit', $flight->id) }}" class="text-blue-500 hover:underline">{{ __('Edit') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
