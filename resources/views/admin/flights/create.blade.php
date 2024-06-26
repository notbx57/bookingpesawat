<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Flight') }}
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

                    <form method="POST" action="{{ route('admin.flights.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="nama_maskapai" class="block font-medium text-sm text-gray-700">{{ __('Maskapai') }}</label>
                                <input id="nama_maskapai" type="text" name="nama_maskapai" value="{{ old('nama_maskapai') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required autofocus />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="dari" class="block font-medium text-sm text-gray-700">{{ __('Dari') }}</label>
                                <input id="dari" type="text" name="dari" value="{{ old('dari') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="ke" class="block font-medium text-sm text-gray-700">{{ __('Ke') }}</label>
                                <input id="ke" type="text" name="ke" value="{{ old('ke') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="harga" class="block font-medium text-sm text-gray-700">{{ __('Harga') }}</label>
                                <input id="harga" type="number" name="harga" value="{{ old('harga') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="kuota_kursi" class="block font-medium text-sm text-gray-700">{{ __('Jumlah Kursi') }}</label>
                                <input id="kuota_kursi" type="number" name="kuota_kursi" value="{{ old('kuota_kursi') }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="image" class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                                <input id="image" type="file" name="image" class="form-input rounded-md shadow-sm mt-1 block w-full" accept="image/jpeg,image/png,image/jpg,image/gif,image/svg">
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button type="submit">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>