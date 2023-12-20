@extends('layoutmahasiswa.main')
@section('main_content')
<link rel="stylesheet" href="/css/srs2.css">
<h1>IRS Mahasiswa</h1>
<form action="/dashboardmahasiswa/addirs" method="POST">
    @csrf

    <div class="form-group">
        <label for="semester">Semester:</label>
        <select name="semester" id="semester" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
        </select>
    </div>

    <div class="form-group">
        <label for="jumlahsks">SKS:</label>
        <input type="integer" name="jumlahsks" class="form-control" value="{{ old('jumlahsks') }}" required>
    </div>
    <div class="form-group">
        <label for="scansks">Scan IRS:</label>
        <input type="file" name="scansks" accept=".pdf">
    </div>

    <button type="submit" class="btn btn-primary">Unggah Data</button>

</form>
@endsection

<head>
    <title>Pengambilan IRS</title>
</head>