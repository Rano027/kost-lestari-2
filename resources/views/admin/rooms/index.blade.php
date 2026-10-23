<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Kamar
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
        {{ session('success') }}
    </div>
@endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex justify-between items-center mb-4">
    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
        Daftar Kamar
    </h3>

    <a
        href="{{ route('admin.rooms.create') }}"
        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700"
    >
        + Tambah Kamar
    </a>
</div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="px-4 py-3 text-left">No</th>
                                    <th class="px-4 py-3 text-left">Nomor Kamar</th>
                                    <th class="px-4 py-3 text-left">Nama</th>
                                    <th class="px-4 py-3 text-left">Status</th>
                                    <th class="px-4 py-3 text-left">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($rooms as $room)
                                    <tr class="border-t dark:border-gray-700">
                                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                            {{ $room->room_number }}
                                        </td>

                                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                            {{ $room->name }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ ucfirst($room->status) }}
                                        </td>
                                        <<td class="px-4 py-3">
    <div class="flex gap-3">
        <a
            href="{{ route('admin.rooms.edit', $room->id) }}"
            class="text-blue-600 hover:text-blue-800"
        >
            Edit
        </a>

        <form
            action="{{ route('admin.rooms.destroy', $room->id) }}"
            method="POST"
            onsubmit="return confirm('Apakah kamu yakin ingin menghapus kamar ini?')"
        >
            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="text-red-600 hover:text-red-800"
            >
                Hapus
            </button>
        </form>
    </div>
</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                            Belum ada data kamar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>