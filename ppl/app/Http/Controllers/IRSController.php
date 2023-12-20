<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use App\Models\MHS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreIRSRequest;
use App\Http\Requests\UpdateIRSRequest;

class IRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $mahasiswa = MHS::where('user_id', $user_id)->firstOrFail();
        return view("mahasiswa.addirs", ['mahasiswa' => $mahasiswa]);
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
        DB::table('irs')->insert([
            'mahasiswa_id' => $mahasiswa->nim,
            'semester' => $request->input('semester'),
            'jmlsks' => $request->input('jumlahsks'),
            'scansks' => $request->input('scansks')
        ]);


        return redirect('/dashboardmahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIRSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(IRS $iRS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IRS $iRS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIRSRequest $request, IRS $iRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IRS $iRS)
    {
        //
    }
}
