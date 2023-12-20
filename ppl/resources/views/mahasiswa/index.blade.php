@extends('layoutmahasiswa.main')
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

<h1>Dashboard Mahasiswa</h1>
<hr>
<body>
    <div>
        <h2 style="text-align: center ;">Profile</h2>
    </div>
    <hr>
    <div class="profile-circle">
        <img src="{{ asset('img/'.$mahasiswa->foto_mahasiswa) }}" alt="Profile Image">
    </div>

    <div class="profile-info">
        <h2>{{ $mahasiswa->nama }}</h2>
        <p>NIM: {{ $mahasiswa->nim }}</p>
        <p>Angkatan: {{ $mahasiswa->angkatan }}</p>
        <p>Dosen Wali: {{ $mahasiswa->dosen_wali }}</p>
    </div>

</body>
@endsection