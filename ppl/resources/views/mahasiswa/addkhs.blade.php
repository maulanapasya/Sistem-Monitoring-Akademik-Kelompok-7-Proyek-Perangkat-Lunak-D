@extends('layoutmahasiswa.main')

@section('main_content')
<h1>Input KHS Mahasiswa</h1>
<link rel="stylesheet" href="/css/srs2.css">
<form action="/dashboardmahasiswa/addkhs" method="POST">
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
        <label for="skssemester">SKS:</label>
        <input type="integer" name="skssemester" class="form-control" value="{{ old('skssemester') }}" required>
    </div>

    <div class="form-group">
        <label for="skskumulatif">SKS Kumulatif:</label>
        <input type="integer" name="skskumulatif" class="form-control" value="{{ old('skskumulatif') }}" required>
    </div>

    <div class="form-group">
        <label for="ipsemester">IP Semester:</label>
        <input type="integer" name="ipsemester" class="form-control" value="{{ old('ipsemester') }}" step="0.01"
            required>
    </div>

    <div class="form-group">
        <label for="ipkumulatif">IP Kumulatif:</label>
        <input type="integer" name="ipkumulatif" class="form-control" value="{{ old('ipkumulatif') }}" step="0.01"
            required>
    </div>

    <div class="form-group">
        <label for="scankhs">Scan KHS:</label>
        <input type="file" name="scankhs" accept=".pdf">
    </div>

    <button type="submit" class="btn btn-primary">Unggah Data</button>

</form>
@endsection

<head>
    <title>Input KHS</title>
</head>