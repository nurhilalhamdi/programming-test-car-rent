<table class="min-w-full divide-y divide-gray-200 ">
    <thead class="bg-gray-50 ">
        <tr>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Merk
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Model
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Plat Nomor
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Tanggal mulai
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Tanggal selesai
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Harga per hari
            </th>
            <th scope="col" class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                Aksi
            </th>
        </tr>
    </thead>
    <tbody class="bg-white ">
        @forelse ($cars as $car)
        <tr>
            <td class="p-4 text-sm  text-gray-900 whitespace-nowrap font-semibold">
                {{ $car->mobil->merk }}
            </td>
            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                {{ $car->mobil->model }}
            </td>
            <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                {{ $car->mobil->plat_nomor }}
            </td>
            <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                {{ $car->tanggal_mulai }}
            </td>
            <td class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap ">
                {{ $car->tanggal_selesai }}
            </td>
            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap ">
                {{ $car->mobil->harga_perhari }}
            </td>
            <td class="p-4 whitespace-nowrap">
                <a href="#" data-modal-target="returncars-modal-{{ $car->id }}"
                    data-modal-toggle="returncars-modal-{{ $car->id }}"
                    class="text-white bg-gray-500 hover:bg-gray-900 focus:ring-transparent font-medium rounded-lg text-sm px-2 py-2">Kembalikan</a>
                @include('component.pengembalian_mobil.modal_pengembalian', ['car' => $car])
            </td>
        </tr>
        @empty
        <td colspan="7">
            <div class="p-4 mb-4 text-sm text-gray-700 rounded-lg bg-blue-50 text-center" role="alert">
                <strong>No rental data found!</strong>
            </div>
        </td>

        @endforelse

    </tbody>
</table>