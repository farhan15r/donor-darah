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
                            <td>Apakah anda sehat?</td>
                            <td>: {{ $screaning->sehat ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda sedang minum obat? :</td>
                            <td>: {{ $screaning->minum_obat ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda sedang sakit kepala atau demam?</td>
                            <td>: {{ $screaning->demam ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda mencabut gigi dalam 1 minggu ini?</td>
                            <td>: {{ $screaning->cabut_gigi ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda mengidap HIV/AIDS?</td>
                            <td>: {{ $screaning->hiv ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki
                                hepatitis
                                B atau C?</td>
                            <td>: {{ $screaning->kontak_hepatitis ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)?</td>
                            <td>: {{ $screaning->kontak_hepatitis ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda mendonorkan darah dalam 2 bulan terakhir?</td>
                            <td>: {{ $screaning->riwayat_donor ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        <tr>
                            <td>Apakah anda sudah sarapan hari ini?</td>
                            <td>: {{ $screaning->sarapan ? 'Ya' : 'Tidak' }}</td>
                        </tr>
                        @if (auth()->user()->jenis_kelamin === 'Perempuan')
                            <tr>
                                <td>Apakah andasedang hamil??
                                </td>
                                <td>: {{ $screaning->hamil ? 'Ya' : 'Tidak' }}</td>
                            </tr>
                        @endif
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
                            @if (!$screaning->sehat)
                                {{ '- Karena anda sedang tidak sehat' }}
                                <br />
                            @endif
                            @if ($screaning->minum_obat)
                                {{ '- Karena anda sedang minum obat' }}
                                <br />
                            @endif
                            @if ($screaning->demam)
                                {{ '- Karena anda sedang demam' }}
                                <br />
                            @endif
                            @if ($screaning->cabut_gigi)
                                {{ '- Karena anda pernah cabut gigi dalam seminggu terakhir' }}
                                <br />
                            @endif
                            @if ($screaning->hiv)
                                {{ '- Karena anda mengidap HIV/AIDS' }}
                                <br />
                            @endif
                            @if ($screaning->kontak_hepatitis)
                                {{ '- Karena anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis
                                                                                                                                                                                                                                                                                                B atau C' }}
                                <br />
                            @endif
                            @if ($screaning->sex_period)
                                {{ '- Karena anda pernah melakukan oral atau anal seks tanpa menggunakan pengaman(kondom)' }}
                                <br />
                            @endif
                            @if ($screaning->riwayat_donor)
                                {{ '- Karena anda sudah mendonorkan darah anda dalam sebulan terakhir' }}
                                <br />
                            @endif
                            @if (!$screaning->sarapan)
                                {{ '- Karena anda belum sarapan' }}
                                <br />
                            @endif
                            @if (auth()->user()->jenis_kelamin === 'Perempuan')
                                @if ($screaning->hamil)
                                    {{ '- Karena anda sedang hamil' }}
                                    <br />
                                @endif

                            @endif
                        @endif
                    </h5>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
