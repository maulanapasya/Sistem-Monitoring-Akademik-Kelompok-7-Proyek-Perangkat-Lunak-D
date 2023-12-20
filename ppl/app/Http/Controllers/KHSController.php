<?php

namespace App\Http\Controllers;

use App\Models\KHS;
use App\Models\MHS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKHSRequest;
use App\Http\Requests\UpdateKHSRequest;


class KHSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.addkhs", ['mahasiswa' => $mahasiswa]);
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
        DB::table('k_h_s')->insert([
            'mahasiswa_id' => $mahasiswa->nim,
            'semester' => $request->input('semester'),
            'skssemester' => $request->input('skssemester'),
            'skskumulatif' => $request->input('skskumulatif'),
            'ipsemester' => $request->input('ipsemester'),
            'ipkumulatif' => $request->input('ipkumulatif'),
            'scankhs' => $request->input('scankhs')
        ]);


        return redirect('/dashboardmahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKHSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KHS $kHS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KHS $kHS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKHSRequest $request, KHS $kHS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KHS $kHS)
    {
        //
    }
}
