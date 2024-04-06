@extends('main.main')

@section('content')

<div class="flex flex-col gap-8">
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm ">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 ">Data rental anda</h3>
                <span class="text-base font-normal text-gray-500 ">Ini adalah daftar riwayat rental anda</span>
            </div>

        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Merk
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Model
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Plat Nomor
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Tanggal mulai
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Tanggal selesai
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Pemilik
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white ">
                                @forelse ($rentals as $rental)
                                <tr>
                                    <td class="p-4 text-sm  text-gray-900 whitespace-nowrap font-semibold">
                                        {{ $rental->mobil->merk }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $rental->mobil->model }}
                                    </td>
                                    <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                                        {{ $rental->mobil->plat_nomor }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $rental->tanggal_mulai }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $rental->tanggal_selesai }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $rental->mobil->user->nama }}
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md ">Completed</span>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="7">
                                    <div class="p-4 mb-4 text-sm text-gray-700 rounded-lg bg-blue-50 text-center"
                                        role="alert">
                                        <strong>No rental data found!</strong>
                                    </div>
                                </td>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Footer -->
        <div
            class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
            <div class="flex items-center mb-4 sm:mb-0">
                <!-- Previous Page Link -->
                @if ($rentals->onFirstPage())
                <span class="inline-flex justify-center p-1 text-gray-500 rounded cursor-not-allowed bg-gray-200">
                    <!-- Previous Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                @else
                <a href="{{ $rentals->previousPageUrl() }}"
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <!-- Previous Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @endif

                <!-- Next Page Link -->
                @if ($rentals->hasMorePages())
                <a href="{{ $rentals->nextPageUrl() }}"
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <!-- Next Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @else
                <span class="inline-flex justify-center p-1 text-gray-500 rounded cursor-not-allowed bg-gray-200">
                    <!-- Next Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                @endif

                <!-- Displaying Current Page and Total Records -->
                <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">{{
                        $rentals->firstItem() }}</span> - <span class="font-semibold text-gray-900">{{
                        $rentals->lastItem()
                        }}</span>
                    of <span class="font-semibold text-gray-900">{{ $rentals->total() }}</span> records</span>
            </div>
        </div>
    </div>

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm ">
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 ">Data Pengembalian anda</h3>
                <span class="text-base font-normal text-gray-500 ">Ini adalah daftar riwayat pengembalian anda</span>
            </div>

        </div>
        <!-- Table -->
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 ">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Merk
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Model
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Plat Nomor
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Harga Perhari
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Tanggal mulai
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Tanggal selesai
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Jumlah Hari
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                        Total Tarif
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white ">
                                @forelse ($pengembalians as $pengembalian)
                                <tr>
                                    <td class="p-4 text-sm  text-gray-900 whitespace-nowrap font-semibold">
                                        {{ $pengembalian->merk }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->model }}
                                    </td>
                                    <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                                        {{ $pengembalian->plat_nomor }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->harga_perhari }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->tanggal_mulai }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->tanggal_selesai }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->jumlah_hari }}
                                    </td>
                                    <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                                        {{ $pengembalian->total_tarif }}
                                    </td>

                                </tr>
                                @empty
                                <td colspan="8">
                                    <div class="p-4 mb-4 text-sm text-gray-700 rounded-lg bg-blue-50 text-center"
                                        role="alert">
                                        <strong>No return data found!</strong>
                                    </div>
                                </td>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Footer -->
        <div
            class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
            <div class="flex items-center mb-4 sm:mb-0">
                <!-- Previous Page Link -->
                @if ($rentals->onFirstPage())
                <span class="inline-flex justify-center p-1 text-gray-500 rounded cursor-not-allowed bg-gray-200">
                    <!-- Previous Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                @else
                <a href="{{ $rentals->previousPageUrl() }}"
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <!-- Previous Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @endif

                <!-- Next Page Link -->
                @if ($rentals->hasMorePages())
                <a href="{{ $rentals->nextPageUrl() }}"
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
                    <!-- Next Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                @else
                <span class="inline-flex justify-center p-1 text-gray-500 rounded cursor-not-allowed bg-gray-200">
                    <!-- Next Page Icon -->
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
                @endif

                <!-- Displaying Current Page and Total Records -->
                <span class="text-sm font-normal text-gray-500">Showing <span class="font-semibold text-gray-900">{{
                        $rentals->firstItem() }}</span> - <span class="font-semibold text-gray-900">{{
                        $rentals->lastItem()
                        }}</span>
                    of <span class="font-semibold text-gray-900">{{ $rentals->total() }}</span> records</span>
            </div>
        </div>
    </div>

</div>
@endsection