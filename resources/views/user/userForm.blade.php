<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/screening.css">
    <title>Form Screening</title>
</head>

<body>
    @if (session()->has('berhasil'))
        <script>
            alert('Screening telah berhasil!, anda dialihan ke dashboard page');
        </script>
    @endif
    <div class="wrapper">
        <div class="header">
            <div class="header-logo">
                <ul>
                    <li><img src="/img/Palang.png"></li>
                    <li>
                        <h1>AYO DONOR</h1>
                    </li>
                </ul>
            </div>
            <div class="header-list">
            </div>
        </div>
        <div class="content">
            <div class="box">
                <div class="form">
                    <form action="" method="POST">
                        <h3 class="box-title">SCREENING PENDONOR</h3> <br>
                        @csrf
                        <h5>NOTES: Tolong anda isi form ini berdasarkan kebenaran dan keadaan yang terjadi, karena
                            keputusan anda akan berdampak kepada orang lain !</h5> <br>

                        <table>
                            <tr>
                                <td>Umur </td>
                                <td> : <input type="number" name="umur" required> Tahun</td>
                            </tr>
                            <tr>
                                <td>Berat badan </td>
                                <td> : <input type="number" name="berat_badan" required> Kg</td>
                            </tr>
                        </table>

                        <span>Apakah pernah mengidap HIV/AIDS? : </span><br>
                        <label>
                            <input type="radio" name="hiv" id="pernah" value="Pernah">
                            <span class="check"></span>
                            Pernah
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="hiv" id="tidak" value="Tidak Pernah">
                            <span class="cross"></span>
                            Tidak Pernah
                        </label>

                        <br>

                        <span>Apakah anda memiliki pasangan yang mengidap HIV/AIDS? : </span><br>
                        <label>
                            <input type="radio" name="pasangan_hiv" id="pernah" value="Pernah">
                            <span class="check"></span>
                            Pernah
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="pasangan_hiv" id="tidak" value="Tidak Pernah">
                            <span class="cross"></span>
                            Tidak Pernah
                        </label>

                        <br>

                        <span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis
                            B atau C? : </span><br>
                        <label>
                            <input type="radio" name="kontak_hepatitis" id="pernah" value="Pernah">
                            <span class="check"></span>
                            Pernah
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="kontak_hepatitis" id="tidak" value="Tidak Pernah">
                            <span class="cross"></span>
                            Tidak Pernah
                        </label>

                        <br>

                        <span>Apakah pernah menyuntikkan atau disuntikkan obat-obatan tanpa sepengetahuan dokter :
                        </span><br>
                        <label>
                            <input type="radio" name="suntik" id="pernah" value="Pernah">
                            <span class="check"></span>
                            Pernah
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="suntik" id="tidak" value="Tidak Pernah">
                            <span class="cross"></span>
                            Tidak Pernah
                        </label>

                        <br>

                        <span>Kapan terakhir kali anda mendonorkan darah? : </span><br>
                        <label>
                            <input type="radio" name="riwayat_donor" id="pernah" value=">3 Bulan">
                            <span class="check"></span>
                            Lebih dari 3 bulan yang lalu
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="riwayat_donor" id="tidak" value="<=3 Bulan">
                            <span class="check"></span>
                            Kurang dari 3 bulan yang lalu
                        </label>
                        <br>
                        @if (auth()->user()->jenis_kelamin === 'Laki-Laki')
                            <span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? :
                            </span><br>
                            <label>
                                <input type='radio' name='sex_period' id='pernah' value='Pernah'>
                                <span class='check'></span>
                                Pernah
                            </label>
                            <br>
                            <label>
                                <input type='radio' name='sex_period' id='tidak' value='Tidak Pernah'>
                                <span class='cross'></span>
                                Tidak Pernah
                            </label>

                            <br>
                        @elseif (auth()->user()->jenis_kelamin === 'Perempuan')
                            <span>Apakah sedang menstruasi? : </span><br>
                            <label>
                                <input type='radio' name='sex_period' id='pernah' value='Iya'>
                                <span class='check'></span>
                                Iya
                            </label>
                            <br>
                            <label>
                                <input type='radio' name='sex_period' id='tidak' value='Tidak'>
                                <span class='cross'></span>
                                Tidak
                            </label>

                            <br>
                        @endif
                        <button type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
