<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bimbingan TA</title>

</head>

<body>

    <h1>YUKK BIMBINGANNNNNN</h1>

    <p>Halloooo {{ $order->user->name }},</p>

    <p>Hari Ini jangan Lupa ya bimbingan TA</p>

    <p><strong>Kepoin yu Detialnya</strong></p>

    <ul>


        <li><strong>Judul Bimbingan:</strong> {{ $order->product->title }}</li>

        <li><strong>Tanggal:</strong> {{ $order->date }}</li>
        <li><strong>Lokasi:</strong> {{ "KAMPUS B STT NF" }}</li>



    </ul>

    <p>Jangan Lupa Dateng Okeiiii!!!!!!!</p>

</body>

</html>