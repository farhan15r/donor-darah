<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding-right: 5px;
            padding-left: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">DATA PENDONOR DARAH</h1>


    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>No. telp</th>
            <th>Email</th>
            <th>Umur</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nik }}</td>
                <td>{{ $user->jenis_kelamin }}</td>
                <td>{{ $user->no_telepon }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->Umur }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
