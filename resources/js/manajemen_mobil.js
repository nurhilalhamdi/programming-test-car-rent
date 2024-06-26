window.priceFormatInput = function () {
    var tanpa_rupiah_edit = document.getElementsByClassName("harga_perhari");
    for (var i = 0; i < tanpa_rupiah_edit.length; i++) {
        tanpa_rupiah_edit[i].addEventListener("keyup", function (e) {
            this.value = formatRupiah(this.value);
        });
    }

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi),
            separator = "";

        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }
};
