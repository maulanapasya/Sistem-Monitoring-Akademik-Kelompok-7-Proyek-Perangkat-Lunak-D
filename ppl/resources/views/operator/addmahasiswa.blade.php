@extends('layoutoperator.main')

@section('main_content')

<form action="/dashboardoperator/addmahasiswa" method="POST">
    <link href="/css/srs1.css" rel="stylesheet">
    @csrf
    <div class="mb-1 row mt-3">
        <label for="nama" class="col-form-label">Nama <sup class="text-danger"></sup></label>
        <div class="form-group col-sm-12">
            <input type="text" name="nama" autocomplete="off"
                class="form-control mb-2  @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Mahasiswa"
                required value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="mb-1 row">
        <label for="nim" class="col-form-label">NIM <sup class="text-danger"></sup>
        </label>
        <div class="form-group col-sm-12">
            <input type="text" name="nim" autocomplete="username"
                class="form-control mb-2     @error('nim') is-invalid @enderror" id="nim" placeholder="NIM" required
                value="{{ old('nim') }}">
            @error('nim')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="mb-1 row">
        <label for="angkatan" class="col-form-label">Angkatan <sup class="text-danger"></sup></label>
        <div class="form-group col-sm-12">
            <input type="text" name="angkatan" autocomplete="off"
                class="form-control mb-2 @error('angkatan') is-invalid @enderror" id="angkatan" placeholder="Angkatan"
                required value="{{ old('angkatan') }}">
            @error('angkatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="mb-1 row">
        <label for="dosen_wali" class="col-form-label">Dosen Wali<sup class="text-danger"></sup></label>
        <div class="form-group col-sm-12 mt-2">
            <select class="form-control mb-2  @error('dosen_wali')
                                        is-invalid    
                                        @enderror" name="dosen_wali" id="dosen_wali" required>
                <option selected disabled>Dosen Wali</option>
                @foreach ($dosens as $dosen)
                <option value="{{ $dosen->nama }}">{{ $dosen->nama }}</option>
                @endforeach
            </select>
            @error('dosen_wali_nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <!-- <div class="mb-1 row">
        <label for="level" class="col-form-label">Level User<sup class="text-danger"></sup></label>
        <div class="form-group col-sm-12">
            <select class="form-control mb-2 @error('level') is-invalid @enderror" name="level" id="level" required>
                <option selected disabled>Level User</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
            @error('level')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div> -->
    <!-- <div class="mb-1 row">
        <label for="status" class="col-form-label">Status<sup class="text-danger"></sup></label>
        <div class="form-group col-sm-12">
            <select class="form-control mb-2 @error('status') is-invalid @enderror" name="status" id="status" required>
                <option selected disabled>Status</option>
                <option value="aktif">Aktif</option>
            </select>
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div> -->
    <div class="col-md-12 text-center my-3">
        <button type="submit" name="submit" class="btn btn-primary  ps-5 pe-5 pb-2 pt-2 text-center"
            style="background-color: #101E31;">Register</button>
    </div>
</form>


@endsection