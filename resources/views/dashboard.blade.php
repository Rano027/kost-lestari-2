<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard Lestari Kost 2
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Statistik --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">

                {{-- Total Kamar --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Total Kamar
                    </p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ $totalRooms }}
                    </p>
                </div>

                {{-- Kamar Terisi --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Kamar Terisi
                    </p>
                    <p class="text-3xl font-bold text-gray-800 dark:text-white mt-2">
                        {{ $occupiedRooms }}
                    </p>
                </div>

                {{-- Kamar Tersedia --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Kamar Tersedia
                    </p>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        {{ $availableRooms }}
                    </p>
                </div>

                {{-- Booking Menunggu --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Booking Menunggu
                    </p>
                    <p class="text-3xl font-bold text-yellow-500 mt-2">
                        {{ $pendingBookings }}
                    </p>
                </div>

                {{-- Keluhan Baru --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5">
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Keluhan Baru
                    </p>
                    <p class="text-3xl font-bold text-red-500 mt-2">
                        {{ $newComplaints }}
                    </p>
                </div>

            </div>

            {{-- Booking & Keluhan --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Booking Terbaru --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="font-semibold text-gray-800 dark:text-white">
                            Booking Terbaru
                        </h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Nama
                                    </th>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Kamar
                                    </th>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($recentBookings as $booking)
                                    <tr class="border-t border-gray-100 dark:border-gray-700">
                                        <td class="px-5 py-3 text-gray-800 dark:text-gray-200">
                                            {{ $booking->name }}
                                        </td>

                                        <td class="px-5 py-3 text-gray-600 dark:text-gray-300">
                                            {{ $booking->room->room_number }}
                                        </td>

                                        <td class="px-5 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-5 py-6 text-center text-gray-500">
                                            Belum ada booking.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Keluhan Terbaru --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                    <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="font-semibold text-gray-800 dark:text-white">
                            Keluhan Terbaru
                        </h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Nama
                                    </th>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Kamar
                                    </th>
                                    <th class="text-left px-5 py-3 text-gray-600 dark:text-gray-300">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($recentComplaints as $complaint)
                                    <tr class="border-t border-gray-100 dark:border-gray-700">
                                        <td class="px-5 py-3 text-gray-800 dark:text-gray-200">
                                            {{ $complaint->name }}
                                        </td>

                                        <td class="px-5 py-3 text-gray-600 dark:text-gray-300">
                                            {{ $complaint->room->room_number }}
                                        </td>

                                        <td class="px-5 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-700">
                                                {{ ucfirst($complaint->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-5 py-6 text-center text-gray-500">
                                            Belum ada keluhan.
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