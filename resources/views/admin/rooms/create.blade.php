<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Kamar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.rooms.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nomor Kamar
                        </label>

                        <input
                            type="text"
                            name="room_number"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            placeholder="Contoh: Kamar 22"
                            required
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Kamar
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            placeholder="Contoh: Kamar 22"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            placeholder="Masukkan harga"
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
                            <option value="available">Tersedia</option>
                            <option value="occupied">Terisi</option>
                            <option value="maintenance">Maintenance</option>
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
                            placeholder="Deskripsi kamar"
                        ></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Fasilitas
                        </label>

                        <textarea
                            name="facilities"
                            rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300"
                            placeholder="Contoh: WiFi, kasur, lemari"
                        ></textarea>
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
                            class="px-4 py-2 bg-blue-600 text-white rounded-md"
                        >
                            Simpan Kamar
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>