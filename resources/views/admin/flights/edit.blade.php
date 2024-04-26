<!-- resources/views/admin/flights/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Flight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="mb-4">
                            <ul class="text-red-500">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.flights.update', $flight->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="nama_maskapai" class="block font-medium text-sm text-gray-700">{{ __('Maskapai') }}</label>
                                <input id="nama_maskapai" type="text" name="nama_maskapai" value="{{ old('nama_maskapai', $flight->nama_maskapai) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required autofocus />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="dari" class="block font-medium text-sm text-gray-700">{{ __('Dari') }}</label>
                                <input id="dari" type="text" name="dari" value="{{ old('dari', $flight->dari) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="ke" class="block font-medium text-sm text-gray-700">{{ __('Ke') }}</label>
                                <input id="ke" type="text" name="ke" value="{{ old('ke', $flight->ke) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="tanggal" class="block font-medium text-sm text-gray-700">{{ __('Tanggal') }}</label>
                                <input id="tanggal" type="date" name="tanggal" value="{{ old('tanggal', $flight->tanggal) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="harga" class="block font-medium text-sm text-gray-700">{{ __('Harga') }}</label>
                                <input id="harga" type="number" name="harga" value="{{ old('harga', $flight->harga) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                        

                            <!-- Add other form fields for flight details -->
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit">
                                {{ __('Save Changes') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
