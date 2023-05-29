<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos Toko Baju | Cetak Struk</title>
    <style>
        html {
            font-family: "Verdana, Arial";
            color: #333;
        }

        body {
            margin: 20px 50px;
        }

        .title {
            text-align: center;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .title h2,
        p {
            margin-bottom: 0;
            margin-top: 0;
        }

        .head {
            padding: 10px 0;
            border-bottom: 1px solid;
        }

        .table {
            width: 100%;
        }

        .table tr td {
            padding-top: 10px;
        }

        .kiri {
            text-align: left;
        }

        .kanan {
            text-align: right;
        }

        .terimakasih {
            padding-top: 20px;
            text-align: center;
            border-top: 1px dashed;
        }
    </style>
</head>

<body onload="print()">
    <div class="container">
        <div class="title">
            <h2>Pos Toko Baju</h2>
            <p>Jl. Pegangsaan Timur No.06 RT.04/RW.02 Kota Jakarta</p>
            <p>081213141515</p>
            <p>created by Gerry Satria Halim</p>
        </div>
        <div class="transaksi">
            <table class="table">
                    <?php foreach($pembelian as $buy) : ?>
                        <tr>
                            <td class="kiri">Item : <?= $buy->nama_produk ?></td>
                            <td class="kanan">Jumlah : <?= $buy->jumlah ?></td>
                            <td class="kanan">Harga : <?= 'Rp '.number_format($buy->harga, 0 , ',', '.') ?></td>
                            <td id="total" class="kanan">Total Akhir : <?= 'Rp '.number_format($buy->Total, 0 , ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <tr>
                    <td colspan="5" style="border-bottom:1px solid; "></td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Sub Total</td>
                    <td class="kanan"><?= $sub_total ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3" style="border-bottom: 1px dashed;"></td>
                </tr>
                    <tr>
                        <td colspan="4" class="kanan">Diskon Pembelian</td>
                        <td class="kanan"><?= $diskon ?></td>
                    </tr>
                <tr>
                    <td colspan="4" class="kanan">Total Akhir</td>
                    <td class="kanan"><?= $total_akhir ?></td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3" style="border-bottom: 1px dashed;"></td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Tunai</td>
                    <td class="kanan"><?= $tunai ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Kembalian</td>
                    <td class="kanan"><?= $tunai - $total_akhir ?></td>
                </tr>
            </table>
        </div>

        <div class="terimakasih">
            ~~~~~ Terima Kasih ~~~~~
        </div>
    </div>
</body>

</html>