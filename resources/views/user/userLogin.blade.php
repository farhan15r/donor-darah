<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="/CSS/stylelogin.css">
</head>

<body>
    @if (session()->has('berhasil'))
        <script>
            alert('Register telah berhasil, silahkan login menggunakan akun anda yang baru');
        </script>
    @endif

    @if (session()->has('loginError'))
        <script>
            alert('Maaf USername atau Passowrd anda salah, silahkan coba kembali');
        </script>
    @endif

    <img class="background" src="/img/background.jpeg">
    <img class="logo-tangan" src="/img/background2.png">

    @error('username')
        <script>
            alert('Username sudah dipakai, silahkan menggunakan username lain');
        </script>
    @enderror

    @error('password')
        <script>
            alert('password tidak sama dengan confirmation password, silahkan coba lagi');
        </script>
    @enderror

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
                    <h2>Sudah Punya Akun ?</h2>
                    <button class="signinBtn">Login</button>
                </div>
                <div class="box signup">
                    <h2>Belum Punya Akun ?</h2>
                    <button class="signupBtn">Daftar</button>
                </div>

            </div>
            <div class="formWx">
                <div class="form signinForm">
                    <form action="/login/user" method="post">
                        <h3>Selamat Datang, <i>Pendonor</i> <br> Masukkan username dan password anda : </h3>
                        @csrf
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" class="submit">
                    </form>

                </div>

                <div class="form signupForm">
                    <form action="/register/user" method="post">
                        <h3>Ayo Daftar : </h3>
                        @csrf
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                        <input type="submit" class="submit">
                    </form>

                </div>

            </div>
        </div>

    </div>

    <script>
        const signinBtn = document.querySelector('.signinBtn')
        const signupBtn = document.querySelector('.signupBtn')
        const formWX = document.querySelector('.formWx')
        const wrapper = document.querySelector('.wrapper')

        signupBtn.onclick = function() {
            formWX.classList.add('active')
            wrapper.classList.add('active')
        }

        signinBtn.onclick = function() {
            formWX.classList.remove('active')
            wrapper.classList.remove('active')
        }
    </script>

</body>

</html>
