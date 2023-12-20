@extends('layoutoperator.main')

@section('main_content')
<style>
    .profile-circle {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        margin: 20px auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-circle img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-info {
        text-align: center;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-info p {
        margin: 10px 0;
    }

    .profile-info p strong {
        font-weight: bold;
    }
</style>
<h1>Dashboard Operator</h1>

<body>
    <div class="profile-info">
        <h1>Profile</h1>
        <hr>
        <h2>{{ $dosen->nip }}</h2>
        <p>Nama: {{ $dosen->nama }}</p>
        <p>Email: {{ $dosen->email }}</p>
    </div>

</body>
@endsection