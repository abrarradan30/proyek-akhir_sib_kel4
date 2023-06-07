<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
</head>
<body>
    <h1 align="center">Data User</h1>

    <table border="1" cellpadding="10" align="center">
    <thead>
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Email</th>
        <th>Role</th>
        <!-- <th>Foto</th> -->
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp;
        @foreach ($user as $u)
        <tr>
        <td>{{$no++}}</td>
        <td>{{$u->nama}}</td>
        <td>{{$u->username}}</td>
        <td>{{$u->password}}</td>
        <td>{{$u->email}}</td>
        <td>{{$u->role}}</td>
            <!-- <td>
                @empty($u->foto)
                <img src="{{url('admin/image/nofoto.png')}}" width="50%">
                @else
                <img src="{{url('admin/image')}}/{{$u->foto}}" width="50%">
                @endempty
            </td> -->
        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>