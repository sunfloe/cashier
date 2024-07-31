<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>sunfloe store</h4>

    Jl. Yos sudarso 11112 <br>
    Telp : 0819780111 <br>
    Email : avvalyy@gmail.com <br>
    --------------------------------- <br>
    <table>
        <tr>
            <td>No.Nota: #<?= $note ?></td>
        </tr>
        <tr>
            <td>Customers Name: <?= $sale->name ?> </td>
        </tr>

    </table>
    ----------------------------------- <br>
    <?php $no = 1;
    $total = 0;
    foreach ($detail as $oo) { ?>
        <table>
            <tr>
                <td colspan=3><?= $oo['name'] ?></td>
                <td style="text-align: right;"> x<?= $oo['jumlah'] ?></td>
                <td style="text-align: right;"> = </td>
                <td style="text-align: right;"> <?= number_format($oo['price']) ?></td>
        </table>
    ----------------------------------- <br>
    <?php $total = $total + $oo['jumlah'] * $oo['price'];
        $no++;
    } ?>
    <table>
        <tr>
            <td colspan=1 style="text-align: right;"> Total = <?= number_format($total) ?></td>
        </tr>
    </table>
    ----------------------------------- <br>

    Barang yang telah dibeli tidak <br>
    dapat dikembalikan kecuali <br>
    ada perjanjian

</body>
    <script>
        window.print();
    </script>
</html>