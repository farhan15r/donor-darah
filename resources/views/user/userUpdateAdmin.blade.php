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
                    <form action="/edit/{{ $user[0]->nik }}" method="POST">
                        <h3 class="box-title">Update Biodata</h3>
                        @csrf
                        <br>
                        <table cellpadding="20">
                            <tr>
                                <td>Nama</td>
                                <td>:<input type="text" name="nama" value="{{ $user[0]->nama }}" required></td>
                            </tr>
                            <tr>
                                <td>Nik</td>
                                <td>:<input type="number" name="nik" min='0' value="{{ $user[0]->nik }}"
                                        required></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:<input type="tel" name="no_telepon" value="{{ $user[0]->no_telepon }}"
                                        required>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:<input type="text" name="email" value="{{ $user[0]->email }}" required></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:<input type="text" name="tempat_lahir" value="{{ $user[0]->tempat_lahir }}"
                                        required>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:<input type="text" name="alamat_lengkap" value="{{ $user[0]->alamat_lengkap }}"
                                        required>
                                </td>
                            </tr>

                            @if (!$user[0]->id_form)
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="laki" value="Laki-Laki"
                                                {{ $user[0]->jenis_kelamin === 'Laki-Laki' ? 'checked' : '' }} />
                                            <span class="check"></span>
                                            Laki-Laki
                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"
                                                {{ $user[0]->jenis_kelamin === 'Perempuan' ? 'checked' : '' }} />
                                            <span class="check"></span>
                                            Perempuan
                                        </label>
                                    </td>
                                </tr>
                        </table>
                    @else
                        <tr>
                            <td>Jenis Kelamin (Yang Terdata)</td>
                            <td>: {{ $user[0]->jenis_kelamin }}</td>
                        </tr>
                        </table>
                        <p>Jenis kelamin tidak bisa diganti, karena anda sudah mengisi form</p>
                        @endif

                        <button type="submit">UPDATE</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
