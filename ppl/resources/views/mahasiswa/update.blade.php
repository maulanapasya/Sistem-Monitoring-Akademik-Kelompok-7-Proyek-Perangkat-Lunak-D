<form class="form-detail" role="form" action="/update" method="post" id="myform">
    <link rel="stylesheet" href="/css/srs2.css">
    @csrf
    @method('PUT')
    <div class="form-left">
        <h2> Update Informasi Mahasiswa</h2>
        <div class="form-row">
            <label for="nama">NAMA</label>
            <input type="text" name="nama" id="nama" class="input-text" value="{{ $mahasiswa->nama }}" disabled>
        </div>
        <div class="form-row">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="nim" id="nim" value="{{  $mahasiswa->nim }}" disabled>
        </div>
        <div class="form-row">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="alamat" id="alamat" value="{{ $mahasiswa->alamat }}" required>
        </div>
        <div class="form-row">
            <label for="kab_kota">Kab/Kota</label>
            <input type="text" name="kab_kota" class="kab_kota" id="kab_kota" value="{{ $mahasiswa->kab_kota }}"
                required>
        </div>
        <div class="form-row">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" class="provinsi" id="provinsi" value="{{ $mahasiswa->propinsi }}"
                required>
        </div>
        <div class="form-row">
            <label for="angkatan">ANGKATAN</label>
            <input type="text" name="angkatan" class="angkatan" id="angkatan" placeholder="{{ $mahasiswa->angkatan }}"
                disabled>
        </div>
        <div class="form-row">
            <label for="jalur_masuk">Jalur_Masuk</label>
            <select name="jalur_masuk" id="jalur_masuk" required>
                <option value="{{ $mahasiswa->jalur_masuk }}">Jalur Masuk</option>
                <option value="SNMPTN">SNMPTN</option>
                <option value="SBMPTN">SBMPTN</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="LAINNYA">LAINNYA</option>
            </select>
        </div>
        <div class="form-group">
            <div class="form-row form-row-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="email" id="email" value="{{ $mahasiswa->email }}"
                    placeholder="name@gmail.com">
            </div>
            <div class="form-row">
                <label for="handphone">No_Telepon</label>
                <input type="text" name="handphone" class="handphone" id="handphone" value="{{ $mahasiswa->handphone }}"
                    placeholder="No telp" required>
            </div>
        </div>
        <div class="form-row">
            <label for="status">STATUS</label>
            <input type="text" name="status" class="status" id="status" value="{{ $mahasiswa->status}}" disabled>
        </div>
        <div class="form-row">
            <label for="foto_mahasiswa">Foto Mahasiswa</label>
            <input type="file" name="foto_mahasiswa" class="foto_mahasiswa" id="foto_mahasiswa"
                value="{{ $mahasiswa->foto_mahasiswa}}">
        </div>
    </div>
    <div class="form-right">
        <div class="form-row-last">
            <input type="submit" name="submit" class="submit" value="Submit">
        </div>
    </div>
</form>