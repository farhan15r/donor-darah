<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/landingadmin.css">
    <title>Halaman Admin</title>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-logo">
                <ul>
                    <li><img src="/img/Palang.png"></li>
                    <li>
                        <h1>Donor DARAH</h1>
                    </li>
                </ul>
            </div>
            <div class="header-list">
                <ul>
                    <li onclick="window.location = '/profile'">Profile</li>
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
                    <h3 class="box-title">DATABASE CENTER</h3>
                    <div style="display:flex; justify-content:center">
                        <a href="/generate-pdf" class="box-title"><button>PDF</button></a>
                    </div>
                    <br>
                    <div class="tabel">
                        <table border="1" cellpadding="16">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Jenis Kelamin</th>
                                <th>No.Telepon</th>
                                <th>Email</th>
                                <th>Alamat Lengkap</th>
                                <th>Umur</th>
                                
                            </tr>
                            <?php
                            $nomor = 1;

                            ?>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->nik }}</td>
                                    <td>{{ $user->jenis_kelamin }}</td>
                                    <td>{{ $user->no_telepon }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->alamat_lengkap }}</td>
                                    <td>{{ $user->Umur }}</td>
                                    <td>
                                        <a href="/profile/delete/{{ $user->nik }}" class="delete"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data pada Nama: {{ $user->nama }}?')"><span
                                                class="delete">
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </span>
                                        </a>
                                        <br>
                                        <br>
                                        <a href="/edit/{{ $user->nik }}"> <button>Edit Pengguna</button></a>

                                        @if ($user->id_form)
                                            <a href="/form/show/{{ $user->id_form }}"> <button>Form User</button></a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
