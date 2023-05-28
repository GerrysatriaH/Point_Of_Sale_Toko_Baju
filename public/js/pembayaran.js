$(document).ready(function(){
    let sub_total = $('#sub_total').val(),
        diskon_akhir = ($('#diskon').val() / 100) * sub_total,
        total_akhir = sub_total - diskon_akhir

    $('#total_akhir').val(total_akhir);

    $('#tunai').on('input', function() {
        calculateKembalian();
    });

    function calculateKembalian() {
        var tunai = parseFloat($('#tunai').val());
        var total_akhir = parseFloat($('#total_akhir').val());

        var kembalian = tunai - total_akhir;

        if (kembalian >= 0) {
            $('#kembalian').val(kembalian);
        } else {
            $('#kembalian').val('0');
        }
    }

    function getAllData(){
        var kasir = $('#user').val();
        var tanggal = $('#tanggal').val();

        var transaksi = [];

        $('#tabel-keranjang tbody tr').each(function() {
            var barcode = $(this).find('td:eq(0)').text();
            var namaItem = $(this).find('td:eq(1)').text();
            var harga = $(this).find('td:eq(2)').text();
            var jumlah = $(this).find('td:eq(3)').text();
            var total = $(this).find('td:eq(4)').text();

            transaksi.push({
                barcode: barcode,
                namaItem: namaItem,
                harga: harga,
                jumlah: jumlah,
                total: total
            });
        });

        var subTotal = $('#sub_total').val();
        var diskon = $('#diskon').val();
        var totalAkhir = $('#total_akhir').val();

        var tunai = $('#tunai').val();
        var kembalian = $('#kembalian').val();

        var transaksiData = {
            kasir: kasir,
            tanggal: tanggal,
            transaksi: transaksi,
            subTotal: subTotal,
            diskon: diskon,
            totalAkhir: totalAkhir,
            tunai: tunai,
            kembalian: kembalian
        };

        return transaksiData;
    }

    function getAllData() {

        var kasir = $('#user').val();
        var tanggal = $('#tanggal').val();

        var transaksi = [];

        $('#tabel-keranjang tbody tr').each(function() {
            var barcode = $(this).find('td:eq(0)').text();
            var namaItem = $(this).find('td:eq(1)').text();
            var harga = $(this).find('td:eq(2)').text();
            var jumlah = $(this).find('td:eq(3)').text();
            var total = $(this).find('td:eq(4)').text();

            transaksi.push({
                barcode: barcode,
                namaItem: namaItem,
                harga: harga,
                jumlah: jumlah,
                total: total
            });
        });

        var subTotal = $('#sub_total').val();
        var diskon = $('#diskon').val();
        var totalAkhir = $('#total_akhir').val();

        var tunai = $('#tunai').val();
        var kembalian = $('#kembalian').val();

        var transaksiData = {
            kasir: kasir,
            tanggal: tanggal,
            transaksi: transaksi,
            subTotal: subTotal,
            diskon: diskon,
            totalAkhir: totalAkhir,
            tunai: tunai,
            kembalian: kembalian
        };

        return transaksiData;
    }

    // $('#bayar').click(function(e) {
    //     e.preventDefault();
    //     var kasir = $('#user').val();
    //     var tanggal = $('#tanggal').val();

    //     $.ajax({
    //         url: '/pembayaran/getDataTransaksi',
    //         method: 'POST',
    //         data: { kasir: kasir,
    //                 tanggal: tanggal, 
    //               },
    //         success: function(response) {
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Transaksi Berhasil'
    //             }).then((response) => {
    //                 window.open(
    //                     'pembayaran/getDataTransaksi'
    //                 )
    //                 location.reload(true)
    //             })
    //         },
    //         error: function(xhr, status, error) {
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Transaksi gagal'
    //             })
    //         }
    //     });
    // });
});