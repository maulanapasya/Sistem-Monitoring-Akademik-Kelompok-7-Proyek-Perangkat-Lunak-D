@extends('layoutmahasiswa.main')
@section('main_content')
<link rel="stylesheet" href="/css/srs2.css">
<form action="/dashboardmahasiswa/addpkl" method="POST">
    @csrf

    <h1>Tambah PKL</h1>
    <div class="form-group">
        <label for="semester">Semester:</label>
        <select name="semester" id="semester" required>
            <option value="6">5</option>
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
        <label for="nilaipkl">Nilai PKL</label>
        <input type="integer" name="nilaipkl" class="form-control" value="{{ old('nilaipkl') }}">
    </div>

    <div class="form-group">
        <label for="scanpkl">Scan Berita Acara Seminar</label>
        <input type="file" name="scanpkl" class="form-control" value="{{ old('scanpkl') }}" accept=".pdf">
    </div>

    <button type="submit" class="btn btn-primary">submit</button>

</form>
@endsection

<head>
    <title>Tambah PKL</title>
</head>