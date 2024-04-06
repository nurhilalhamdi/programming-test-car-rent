<!-- Extra Large Modal -->
<div id="returncars-modal-{{$car->id}}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full ">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="text-lg font-semibold text-gray-900 ">
                    Proses pengembalian
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-toggle="returncars-modal-{{$car->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5 " action="{{ route('dashboard.return.pengembalian', $car->id) }}" method="post">
                @csrf
                @method('put')
                <h3 class="text-md font-semibold text-gray-900 mb-4">
                    Data peminjaman
                </h3>
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div hidden>
                        <input type="text" name="id" id="id" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->id}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="merk" class="block mb-2 text-sm font-medium text-gray-900 ">Merk</label>
                        <input type="text" name="merk" id="merk" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->mobil->merk}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="model" class="block mb-2 text-sm font-medium text-gray-900 ">Model</label>
                        <input type="text" name="model" id="model" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->mobil->model}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">

                        <label for="plat_nomor" class="block mb-2 text-sm font-medium text-gray-900 ">Plat Nomor</label>
                        <input type="number" name="plat_nomor" id="plat_nomor" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->mobil->plat_nomor}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="harga_perhari" class="block mb-2 text-sm font-medium text-gray-900 ">Harga per
                            hari</label>
                        <input type="number" name="harga_perhari" id="harga_perhari_{{$car->id}}" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->mobil->harga_perhari}}">
                    </div>

                    <div class="col-span-2 sm:col-span-1">

                        <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                            mulai</label>
                        <input type="text" name="tanggal_mulai" id="tanggal_mulai_{{$car->id}}" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->tanggal_mulai}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">

                        <label for="tanggal_selesai" class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                            selesai</label>
                        <input type="text" name="tanggal_selesai" id="tanggal_selesai_{{$car->id}}" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="{{$car->tanggal_selesai}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1" hidden>

                        <input type="text" name="jumlah_hari" id="jumlah_hari_input_{{$car->id}}" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="">
                    </div>
                    <div class="col-span-2 sm:col-span-1" hidden>

                        <input type="text" name="total_tarif" id="total_tarif_input_{{$car->id}}" readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" value="">
                    </div>


                </div>
                <div class="border-t-2 border-gray-300 w-full border-dashed mb-4"></div>
                <div class="flex flex-col gap-2 mb-2">
                    <div class="flex flex-row justify-between items-center">
                        <p class="text-md text-gray-500">Lama hari peminjaman</p>
                        <p class="text-md text-gray-900" id="text_jumlah_hari_{{$car->id}}">0 Hari</p>
                    </div>
                    <div class="flex flex-row justify-between items-center">
                        <p class="text-md text-gray-500">Total pembayaran</p>
                        <p class="text-md text-gray-900" id="text_total_harga_{{$car->id}}">Rp. 0</p>
                    </div>

                </div>
                <button type=" submit"
                    class="text-white inline-flex items-center justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Kembalikan mobil
                </button>
            </form>
        </div>


    </div>
</div>



@vite('resources/js/pengembalian_mobil.js')

<script type="module">
    jumlahHari({{$car->id}});
</script>