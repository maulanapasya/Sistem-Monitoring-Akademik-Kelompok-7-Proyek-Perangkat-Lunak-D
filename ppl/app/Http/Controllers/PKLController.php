<?php

namespace App\Http\Controllers;

use App\Models\PKL;
use App\Models\MHS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePKLRequest;
use App\Http\Requests\UpdatePKLRequest;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.addpkl", ['mahasiswa' => $mahasiswa]);
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
        DB::table('p_k_l_s')->insert([
            'mahasiswa_id' => $mahasiswa->nim,
            'semester' => $request->input('semester'),
            'scanpkl' => $request->input('scanpkl'),
            'nilaipkl' => $request->input('nilaipkl'),
        ]);


        return redirect('/dashboardmahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePKLRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PKL $pKL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PKL $pKL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePKLRequest $request, PKL $pKL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PKL $pKL)
    {
        //
    }
}
