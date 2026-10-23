<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Kamar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nomor Kamar
                        </label>

                        <input
                            type="text"
                            name="room_number"
                            value="{{ old('room_number', $room->room_number) }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            required
                        >

                        @error('room_number')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Kamar
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $room->name) }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price', $room->price) }}"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status
                        </label>

                        <select
                            name="status"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >
                            <option value="available" @selected($room->status === 'available')>
                                Tersedia
                            </option>

                            <option value="occupied" @selected($room->status === 'occupied')>
                                Terisi
                            </option>

                            <option value="maintenance" @selected($room->status === 'maintenance')>
                                Maintenance
                            </option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >{{ old('description', $room->description) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Fasilitas
                        </label>

                        <textarea
                            name="facilities"
                            rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300"
                        >{{ old('facilities', $room->facilities) }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <a
                            href="{{ route('admin.rooms.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md"
                        >
                            Kembali
                        </a>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
                        >
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>