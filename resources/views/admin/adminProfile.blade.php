<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Admin</title>
    <link rel="stylesheet" href="/CSS/profileadmin.css">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-logo">
                <ul>
                    <li><img src="/img/logo1.png"></li>
                    <li>
                        <h1>Donor Darah</h1>
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
                    <h3 class="box-title">Biodata ADMIN</h3>
                    <br>
                    <table cellspacing="25">
                        <tr>
                            <td>Nama</td>
                            <td>
                                <p>: {{ $user->nama }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>No.Telepon</td>
                            <td>
                                <p>: {{ $user->no_telepon }}</p>
                            </td>
                        </tr>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
