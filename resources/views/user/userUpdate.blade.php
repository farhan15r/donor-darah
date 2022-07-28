<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>
    <link rel="stylesheet" href="/CSS/userupdate.css">
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
                    <li onclick="window.location = '/user/profile'">Back</li>
                    <li>
                        <form action="/logout/user" method="POST">
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
                    <form action="/user/update" method="POST">
                        <h3 class="box-title">Update Biodata</h3>
                        @csrf
                        <br>
                        <table cellpadding="20">
                            <tr>
                                <td>Nama</td>
                                <td>:<input type="text" name="nama" value="{{ $user->nama }}" required></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:<input type="number" name="nik" min='0' value="{{ $user->nik }}"
                                        required></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:<input type="tel" name="no_telepon" value="{{ $user->no_telepon }}" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:<input type="text" name="email" value="{{ $user->email }}" required></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:<input type="text" name="tempat_lahir" value="{{ $user->tempat_lahir }}"
                                        required>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:<input type="text" name="alamat_lengkap" value="{{ $user->alamat_lengkap }}"
                                        required>
                                </td>
                            </tr>

                            @if ($user->form_id !== null)
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki"
                                                {{ $user->jenis_kelamin === 'Laki-Laki' ? 'checked' : '' }} />
                                            <span class="check"></span>
                                            Laki-Laki
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                                                {{ $user->jenis_kelamin === 'Perempuan' ? 'checked' : '' }} />
                                            <span class="check"></span>
                                            Perempuan
                                        </label>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>Jenis Kelamin (Yang Terdata)</td>
                                    <td>: {{ $user->jenis_kelamin }}</td>
                                </tr>
                            @endif
                        </table>


                        </table>
                        <p>Jenis kelamin tidak bisa diganti, karena anda sudah mengisi form</p>

                        <button type="submit">UPDATE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
