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
        <div class="head">
            <table class="table">
                <tr>
                    <td class="kiri"><?= date("d F Y H:i", strtotime(esc($transaksiData['tanggal'])))?></td>
                    <td class="kanan">Kasir :</td>
                    <td class="kanan">nama kasir</td>
                </tr>
                <tr>
                    <td class="kiri"></td>
                    <td class="kanan">Tipe Pelanggan :</td>
                    <td class="kanan">tes</td>
                </tr>
            </table>
        </div>
        <div class="transaksi">
            <table class="table">
                <tr>
                    <td class="kiri">item</td>
                    <td class="kanan">jumlah</td>
                    <td class="kanan">harga</td>
                    <td class="kanan">total</td>
                </tr>
                <tr>
                    <td class="kiri">tes</td>
                    <td class="kanan">tes</td>
                    <td class="kanan">tes</td>
                    <td class="kanan">tes</td>
                </tr>
                <tr>
                    <td colspan="5" style="border-bottom:1px solid; "></td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Sub Total</td>
                    <td class="kanan">tse</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3" style="border-bottom: 1px dashed;"></td>
                </tr>
                    <tr>
                        <td colspan="4" class="kanan">Diskon Pembelian</td>
                        <td class="kanan"></td>
                    </tr>
                <tr>
                    <td colspan="4" class="kanan">Total Akhir</td>
                    <td class="kanan">tes</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="3" style="border-bottom: 1px dashed;"></td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Tunai</td>
                    <td class="kanan">tes</td>
                </tr>
                <tr>
                    <td colspan="4" class="kanan">Kembalian</td>
                    <td class="kanan">tes</td>
                </tr>
            </table>
        </div>

        <div class="terimakasih">
            ~~~~~ Terima Kasih ~~~~~
        </div>
    </div>
</body>

</html>