<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\DosenWali;
use App\Models\User;
use App\Models\MHS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layoutoperator.main');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard()
    {
        $user_id = Auth::id();
        $dosen = Operator::where('user_id', $user_id)->firstOrFail();
        return view('operator.index', ['dosen' => $dosen]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function register()
    {
        $data['dosens'] = DosenWali::select('nama', 'nip')->get();
        return view('operator.addmahasiswa', $data, [
            'title' => 'Daftar User Baru'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function submit(Request $request)
    {
        $validatedata = $request->validate([
            'nama' => 'required|max:255',
            'nim' => 'required|unique:mahasiswas,nim',
            'angkatan' => 'required',
            'dosen_wali' => [
                'required',
                Rule::exists('dosenwalis', 'nama') // Validasi keberadaan nama dosen wali di tabel DosenWali
            ],
        ]);
        $user = new User();
        $user->username = $validatedata['nim']; // Menggunakan NIM sebagai username
        $user->password = Hash::make('123'); // Enkripsi password
        $user->level = "mahasiswa";

        // Temukan dosen wali berdasarkan nama yang dipilih
        $dosenWali = DosenWali::where('nama', $validatedata['dosen_wali'])->first();
        // Simpan akun baru
        $user->save();

        // Buat data mahasiswa
        $mahasiswa = new MHS();
        $mahasiswa->nim = $validatedata['nim'];
        $mahasiswa->nama = $validatedata['nama'];
        $mahasiswa->angkatan = $validatedata['angkatan'];
        $mahasiswa->status = "1";
        $mahasiswa->dosen_wali = $dosenWali->nip;
        $mahasiswa->user_id = $user->id; // Hubungkan dengan id user yang baru dibuat
        $mahasiswa->save();
        // Tambahkan field lainnya sesuai kebutuhan


        return redirect('/dashboardoperator/addmahasiswa')->with('success', 'Registrasi Berhasil');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOperatorRequest $request, Operator $operator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        //
    }
}
