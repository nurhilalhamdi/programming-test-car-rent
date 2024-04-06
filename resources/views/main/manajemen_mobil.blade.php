@extends('main.main')

@section('content')

<main>
    @include('component.flash_message')
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">

        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 ">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>

                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 " aria-current="page">Cars</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                @if ($errors->any())
                <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 " role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    @foreach ($errors->all() as $error)
                    <div class="ms-3 text-sm font-medium">
                        {{ $error }}
                    </div>
                    @endforeach
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 "
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
                @endif
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl ">Daftar mobil</h1>
            </div>
            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 ">
                <div class="flex items-center mb-4 sm:mb-0">
                    <form class="sm:pr-3" action="{{route('dashboard.manajemen.search')}}" method="GET">
                        <label for="products-search" class="sr-only">Search</label>
                        <div class="flex flex-row gap-4">
                            <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                                <input type="text" name="search_mobil" id="search_mobil"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 "
                                    placeholder="Cari merk, model, atau ketersediaan">
                            </div>
                            <button
                                class="text-white bg-gray-500 hover:bg-gray-900 focus:ring-transparent  font-medium rounded-lg text-sm px-4 "
                                type="submit">
                                Cek mobil
                            </button>
                        </div>
                    </form>
                </div>
                <button id="createProductButton" data-modal-target="addcars-modal" data-modal-toggle="addcars-modal"
                    class="text-white bg-gray-500 hover:bg-gray-900 focus:ring-transparent  font-medium rounded-lg text-sm px-5 py-2.5 "
                    type="button">
                    Add new car
                </button>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    @include('component.manajemen_mobil.table',['cars'=>$cars])
                </div>
            </div>
        </div>
    </div>
    <div
        class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between">
        <div class="flex items-center mb-4 sm:mb-0">
            <!-- Previous Page Link -->
            @if ($cars->onFirstPage())
            <span class="inline-flex justify-center p-1 text-gray-500 rounded cursor-not-allowed bg-gray-200">
                <!-- Previous Page Icon -->
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
            @else
            <a href="{{ $cars->previousPageUrl() }}"
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
            @if ($cars->hasMorePages())
            <a href="{{ $cars->nextPageUrl() }}"
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
                    $cars->firstItem() }}</span> - <span class="font-semibold text-gray-900">{{ $cars->lastItem()
                    }}</span>
                of <span class="font-semibold text-gray-900">{{ $cars->total() }}</span> records</span>
        </div>
    </div>

    @include('component.manajemen_mobil.modal_add')




</main>
@endsection