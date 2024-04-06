<!-- Extra Large Modal -->
<div id="editcars-modal-{{$cars->id}}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Edit car data
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-toggle="editcars-modal-{{$cars->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 " action="{{ route('dashboard.manajemen.update', $cars->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 ">Merk</label>
                        <input type="text" name="merk" id="merk"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Masukkan merk mobil" required="" value="{{$cars->merk}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="model" class="block mb-2 text-sm font-medium text-gray-900 ">Model</label>
                        <input type="text" name="model" id="model"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Masukkan model mobil" required="" value="{{$cars->model}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">

                        <label for="plat_nomor" class="block mb-2 text-sm font-medium text-gray-900 ">Plat Nomor</label>
                        <input type="number" name="plat_nomor" id="plat_nomor"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Masukkan plat nomor mobil" required="" value="{{$cars->plat_nomor}}">
                    </div>
                    <div class="col-span-2">
                        <label for="harga_perhari" class="block mb-2 text-sm font-medium text-gray-900 ">Harga per
                            hari</label>
                        <input type="text" name="harga_perhari" id="harga_perhari"
                            class="harga_perhari bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            placeholder="Masukkan harga perhari" required="" value="{{$cars->harga_perhari}}">
                    </div>
                </div>
                <button type=" submit"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Update mobil
                </button>
            </form>
        </div>


    </div>
</div>

@vite('resources/js/manajemen_mobil.js')

<script type="module">
    priceFormatInput();
</script>