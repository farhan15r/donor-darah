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
                    <form action="/form" method="POST">
                        <h3 class="box-title">SCREENING PENDONOR</h3> <br>
                        @csrf
                        <h5>NOTES: Tolong anda isi form ini berdasarkan kebenaran dan keadaan yang terjadi, karena
                            keputusan anda akan berdampak kepada orang lain !</h5> <br>

                        <span>Apakah anda sehat hari ini? : </span><br>
                        <label>
                            <input type="radio" name="sehat" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="sehat" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>

                        <br>

                        <span>Apakah anda sedang minum obat hari ini? : </span><br>
                        <label>
                            <input type="radio" name="minum_obat" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="minum_obat" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda mengalami sakit kepala/demam? : </span><br>
                        <label>
                            <input type="radio" name="demam" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="demam" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda mencabut gigi dalam 1 minggu ini? : </span><br>
                        <label>
                            <input type="radio" name="cabut_gigi" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="cabut_gigi" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda mengidap HIV/AIDS? : </span><br>
                        <label>
                            <input type="radio" name="hiv" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="hiv" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda atau pasangan pernah melakukan kontak dengan seseorang yang memiliki hepatitis
                            B atau C? : </span><br>
                        <label>
                            <input type="radio" name="kontak_hepatitis" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="kontak_hepatitis" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br />
                        <span>Apakah pernah melakukan oral atau anal seks tanpa menggunakan pengaman (kondom)? :
                        </span><br>
                        <label>
                            <input type='radio' name='sex_period' id='ya' value='1'>
                            <span class='check'></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type='radio' name='sex_period' id='tidak' value='0'>
                            <span class='cross'></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda mendonorkan darah dalam 2 bulan terakhir? : </span><br>
                        <label>
                            <input type="radio" name="riwayat_donor" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="riwayat_donor" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>
                        <span>Apakah anda sudah sarapan hari ini? : </span><br>
                        <label>
                            <input type="radio" name="sarapan" id="ya" value="1">
                            <span class="check"></span>
                            Ya
                        </label>
                        <br />
                        <label>
                            <input type="radio" name="sarapan" id="tidak" value="0">
                            <span class="cross"></span>
                            Tidak
                        </label>
                        <br>

                        @if (auth()->user()->jenis_kelamin === 'Perempuan')
                            <span>Apakah andasedang hamil? : </span><br>
                            <label>
                                <input type='radio' name='hamil' id='ya' value='1'>
                                <span class='check'></span>
                                Ya
                            </label>
                            <br>
                            <label>
                                <input type='radio' name='hamil' id='tidak' value='0'>
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
