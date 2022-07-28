<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/hasilform.css">
    <title>Hasil Form</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-logo">
                <ul>
                    <li><img src="/img/logo1.png"></li>
                    <li>
                        <h1>AYO DONOR</h1>
                    </li>
                </ul>
            </div>
            <div class="header-list">
                <ul>
                    <li onclick="window.location = '/dashboard'">Back</li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button
                                style="background: none;
                            color: inherit;
                            border: none;
                            padding: 0;
                            font: inherit;
                            cursor: pointer;
                            outline: inherit;"
                                type="submit">Log out</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content">
            <div class="box">
                <div class="form">
                    <h3 class="box-title">Hasil Form Screening</h3>
                    <br>
                    <table>
                        <tr>
                            <td>Username</td>
                            <td>: {{ auth()->user()->username }}</td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>: {{ $screaning->umur }} Tahun</td>
                        </tr>
                        <tr>
                            <td>Berat Badan</td>
                            <td>: {{ $screaning->berat_badan }} Kg</td>
                        </tr>
                        <tr>
                            <td>Apakah pernah mengidap HIV/AIDS?</td>
                            <td>: {{ $screaning->hiv }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? :</td>
                            <td>: {{ $screaning->pasangan_hiv }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki
                                hepatitis B atau C?</td>
                            <td>: {{ $screaning->kontak_hepatitis }}</td>
                        </tr>
                        <tr>
                            <td>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter</td>
                            <td>: {{ $screaning->suntik }}</td>
                        </tr>

                        @if (auth()->user()->jenis_kelamin === 'Laki-Laki')
                            <tr>
                                <td>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?
                                </td>
                                <td>: {{ $screaning->sex_period }}</td>
                            </tr>
                        @elseif (auth()->user()->jenis_kelamin === 'Perempuan')
                            <tr>
                                <td>Apakah Sedang Menstruasi?</td>
                                <td>: {{ $screaning->sex_period }}</td>
                            </tr>
                        @endif

                        <tr>
                            <td>Kapan terakhir kali anda mendonorkan darah?</td>
                            <td>: {{ $screaning->riwayat_donor }}</td>
                        </tr>
                    </table>


                </div>
                <div class="hasil">
                    <h3>HASIL :
                        @if ($hasil->hasil_form === 'Bisa mendonorkan darah')
                            {{ $hasil->hasil_form }}
                            <style>
                                .hasil {
                                    background-color: #2ecc71;
                                    border-radius: 10px;
                                    text-align: center;
                                }
                            </style>
                        @elseif ($hasil->hasil_form === 'Tidak dapat mendonorkan darah')
                            {{ $hasil->hasil_form }}
                            <style>
                                .hasil {
                                    background-color: #ff3030;
                                    border-radius: 15px;
                                    text-align: center;
                                }
                            </style>
                        @endif
                    </h3>
                    <h5>
                        @if ($hasil->hasil_form === 'Tidak dapat mendonorkan darah')
                            <br />
                            Alasan :
                            <br />
                            @if ($screaning->umur < 17 || $screaning->umur > 50)
                                {{ '- Karena batas umur untuk mendonor darah adalah >= 17 tahun dan <= 50 tahun' }}
                                <br />
                            @endif
                            @if ($screaning->berat_badan < 47)
                                {{ '- Karena minimal berat badan untuk mendonor adalah >= 47 KG' }}
                                <br />
                            @endif
                            @if ($screaning->hiv === 'Pernah')
                                {{ '- Karena anda mengidap HIV/AIDS' }}
                                <br />
                            @endif
                            @if ($screaning->kontak_hepatitis === 'Pernah')
                                {{ '- Karena anda pernah melakukan kontak dengan seseorang yang memiliki penyakit hepatitis B atau C, dikhawatirkan anda tertular pada penyakit tersebut' }}
                                <br />
                            @endif
                            @if ($screaning->suntik === 'Pernah')
                                {{ '- Karena anda pernah menyuntik obat tanpa sepengetahuan dokter, dikhawatirkan obat tersebut akan berdampak buruk bagi seseorang' }}
                                <br />
                            @endif
                            @if (auth()->user()->jenis_kelamin === 'Laki-Laki')
                                @if ($screaning->sex_period === 'Pernah')
                                    {{ '- Karena anda pernah melakukan oral atau anal seks tanpa menggunakan pengaman(kondom)' }}
                                    <br />
                                @endif
                            @elseif (auth()->user()->jenis_kelamin === 'Perempuan')
                                @if ($screaning->sex_period === 'Iya')
                                    {{ '- Karena anda sedang menstruasi' }}
                                    <br />
                                @endif
                            @endif
                            @if ($screaning->riwayat_donor === '<=3 Bulan')
                                {{ '- Karena anda sudah mendonor kurang dari sama dengan 3 bulan' }}
                                <br />
                            @endif
                        @endif
                    </h5>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
