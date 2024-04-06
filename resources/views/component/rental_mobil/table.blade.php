<table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>

            <th scope="col" class="px-6 py-3">
                Merk
            </th>
            <th scope="col" class="px-6 py-3">
                Model
            </th>
            <th scope="col" class="px-6 py-3">
                Plat nomor
            </th>
            <th scope="col" class="px-6 py-3">
                Harga per Hari
            </th>
            <th scope="col" class="px-6 py-3">
                Status sewa
            </th>

        </tr>
    </thead>
    <tbody>
        @forelse ($cars as $car)
        <tr class="bg-white border-b w-full hover:bg-gray-50 cursor-pointer" data-car-id="{{ $car->id }}">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                {{ $car->merk }}
            </th>
            <td class="px-6 py-4">
                {{ $car->model }}
            </td>
            <td class="px-6 py-4">
                {{ $car->plat_nomor }}
            </td>

            <td class="px-6 py-4">
                {{ $car->harga_perhari }}
            </td>
            <td class="px-6 py-4">
                {{ $car->status_sewa }}
            </td>


        </tr>



        @empty
        <td colspan="7">
            <div class="p-4 mb-4 text-sm text-gray-700 rounded-lg bg-blue-50 text-center" role="alert">
                <strong>No cars data found!</strong>
            </div>
        </td>

        @endforelse

    </tbody>
</table>

@vite('resources/js/rental_mobil.js')

<script type="module">
    selectCar();
</script>