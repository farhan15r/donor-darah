<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi User</title>
    <link rel="stylesheet" href="/CSS/styleregister.css">
</head>

<body>

    <img class="background" src="/img/background.jpeg">
    <img class="logo-tangan" src="/img/background2.png">

    <div class="header">
        <div class="header-logo">
            <ul>
                <li><img src="/img/logo1.png"></li>
                <li>
                    <h1>AYO DONOR</h1>
                </li>
            </ul>
        </div>
    </div>

    <div class="wrapper">

        <div class="container">
            <div class="whitebg">

                <div class="box signin">
                </div>
                <div class="box signup">
                </div>

            </div>
            <div class="formWx">
                <div class="form signinForm">
                    <form action="/register/user/form" method="post">
                        <h3>Halo NAMA USER<br> Mari bantu kami <br> melengkapi data dirimu : </h3>
                        @csrf
                        <input type="hidden" name="username" value="{{ $username }}">
                        <input type="hidden" name="password" value="{{ $password }}">
                        <input type="text" name="nama" placeholder="Nama" required>
                        <input type="number" name="nik" placeholder="NIK" required>
                        <input type="tel" name="no_telepon" placeholder="Nomor Telepon" required>
                        <input type="text" name="email" placeholder="Email" required>
                        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
                        <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap" required>
                        <p>Jenis Kelamin :</p>
                        <label>
                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki">
                            <span class="check"></span>
                            Laki-Laki
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                            <span class="check"></span>
                            Perempuan
                        </label>

                        <input type="submit" class="submit">
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
