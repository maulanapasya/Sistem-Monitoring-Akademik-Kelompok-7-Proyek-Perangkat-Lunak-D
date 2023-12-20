@extends('layoutmahasiswa.main')
@section('main_content')
<link rel="stylesheet" href="/css/srs2.css">
<h1>Tambah Skripsi</h1>
<form action="/dashboardmahasiswa/addskripsi" method="POST">
    @csrf
    <div class="form-group">
        <label for="semester">Semester:</label>
        <select name="semester" id="semester" required>
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
        <label for="tglsidang">Tanggal Sidang:</label>
        <input type="date" name="tglsidang" class="form-control" value="{{ old('tglsidang') }}">
    </div>

    <div class="form-group">
        <label for="nilaiskripsi">Nilai Skripsi:</label>
        <input type="string" name="nilaiskripsi" class="form-control" value="{{ old('nilaiskripsi') }}">
    </div>

    <div class="form-group">
        <label for="scansidang">Scan Berita Acara Sidang:</label>
        <input type="file" name="scansidang" class="form-control" value="{{ old('scansidang') }}" accept=".pdf">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection

<head>
    <title>Tambah Skripsi</title>
</head>