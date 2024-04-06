// Fungsi untuk menghitung jumlah hari antara dua tanggal
window.hitungJumlahHari = function (tanggalMulai, tanggalSelesai) {
    // Ubah string tanggal menjadi objek Date
    var mulai = new Date(tanggalMulai);
    var selesai = new Date(tanggalSelesai);

    // Hitung selisih dalam milidetik
    var selisih = selesai.getTime() - mulai.getTime();

    // Hitung jumlah hari dari selisih
    var jumlahHari = Math.ceil(selisih / (1000 * 3600 * 24));

    return jumlahHari;
};

window.jumlahHari = function ($carId) {
    // Tangkap elemen input tanggal
    var tanggalMulaiInput = document.getElementById("tanggal_mulai_" + $carId);
    var jumlahHariText = document.getElementById("text_jumlah_hari_" + $carId);
    var hargaPerhari = document.getElementById("harga_perhari_" + $carId);
    var jumlahHariInput = document.getElementById(
        "jumlah_hari_input_" + $carId
    );
    var tanggalSelesaiInput = document.getElementById(
        "tanggal_selesai_" + $carId
    );
    var jumlahHariOutput;

    var tanggalMulai = tanggalMulaiInput.value;
    var tanggalSelesai = tanggalSelesaiInput.value;

    // Periksa apakah kedua input tanggal telah diisi
    if (tanggalMulai && tanggalSelesai) {
        var jumlahHari = hitungJumlahHari(tanggalMulai, tanggalSelesai);
        jumlahHariText.textContent = jumlahHari + " hari";
        totalTarif(jumlahHari, hargaPerhari.value, $carId);
        jumlahHariInput.value = jumlahHari;
        console.log("Jumlah Hari: " + jumlahHari);
    } else {
        jumlahHariText.textContent = "0 Hari";
        jumlahHariInput.value = jumlahHari;
        console.log("Jumlah Hari: 0");
    }
};

window.totalTarif = function (jumlahHari, hargaPerhari, carId) {
    const total = parseInt(hargaPerhari.replace(/\./g, "")) * jumlahHari;
    var totalTarifInput = document.getElementById("total_tarif_input_" + carId);

    var totalTarifText = document.getElementById("text_total_harga_" + carId);
    const formattedPrice = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(total);

    totalTarifText.textContent = formattedPrice;
    totalTarifInput.value = formattedPrice;
};
