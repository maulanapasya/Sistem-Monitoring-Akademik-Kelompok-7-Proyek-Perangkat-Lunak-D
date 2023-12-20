<?php

namespace App\Http\Controllers;

use App\Models\MHS;
use App\Http\Requests\StoreMHSRequest;
use App\Http\Requests\UpdateMHSRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class MHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.update", ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboard()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.index", ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        // $request->validate([
        //     'jalur_masuk' => 'required',
        //     'email' => 'required',
        //     'handphone' => 'required',
        //     // Add other validation rules for your fields
        // ]);
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();

        // Update the fields based on the form data
        $mahasiswa->jalur_masuk = $request->input('jalur_masuk');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->handphone = $request->input('handphone');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->kab_kota = $request->input('kab_kota');
        $mahasiswa->propinsi = $request->input('provinsi');
        $mahasiswa->foto_mahasiswa = $request->input('foto_mahasiswa');

        // Save the changes to the database
        $mahasiswa->save();

        return redirect('/dashboardmahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }


    /**
     * Display the specified resource.
     */
    public function show(MHS $mHS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MHS $mHS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateMHSRequest $request, MHS $mHS)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MHS $mHS)
    {
        //
    }
}
