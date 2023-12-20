<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\MHS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSkripsiRequest;
use App\Http\Requests\UpdateSkripsiRequest;

class SkripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.addskripsi", ['mahasiswa' => $mahasiswa]);
    }

    public function dashboard()
    {
        return view('mahasiswa.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        DB::table('skripsis')->insert([
            'mahasiswa_id' => $mahasiswa->nim,
            'semester' => $request->input('semester'),
            'tglsidang' => $request->input('tglsidang'),
            'nilaiskripsi' => $request->input('nilaiskripsi'),
            'scansidang' => $request->input('scansidang'),
        ]);


        return redirect('/dashboardmahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkripsiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Skripsi $skripsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skripsi $skripsi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkripsiRequest $request, Skripsi $skripsi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skripsi $skripsi)
    {
        //
    }
}
