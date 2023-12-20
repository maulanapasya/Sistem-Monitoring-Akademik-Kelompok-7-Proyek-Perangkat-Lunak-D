<?php

namespace App\Http\Controllers;

use App\Models\DosenWali;
use App\Models\MHS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDosenWaliRequest;
use App\Http\Requests\UpdateDosenWaliRequest;

class DosenWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(StoreDosenWaliRequest $request)
    {
        //
    }
    public function index()
    {
        $user_id = Auth::id();
        $dosen = DosenWali::where('user_id', $user_id)->fmahasiswastOrFail();
        return view("dosen.search", ['dosen' => $dosen]);
    }

    public function dashboard()
    {
        return view('dosen.verifikasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $mahasiswa = DB::table('mahasiswas')
                ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
                ->where(function ($query) use ($request) {
                    $query->where('nama', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('nim', 'LIKE', '%' . $request->search . '%');
                })
                ->paginate(10);
        } else {
            $mahasiswa = DB::table('mahasiswas')
                ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
                ->paginate(10);
        }

        return view('dosen.search', compact('mahasiswa'));
    }

    public function detail(Request $request, $nim)
    {
        $mahasiswa = MHS::where('nim', $nim)
            ->where('dosen_wali', auth()->user()->dosenWali->nip)
            ->with('irs', 'khs', 'pkl', 'skripsi')
            ->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan atau tidak terkait dengan perwalian Anda.');
        }

        $semesterStatus = [];

        // Loop untuk setiap semester
        for ($i = 1; $i <= 14; $i++) {
            $semesterStatus[$i] = 'red'; // Set default status merah

            // IRS
            $irsStatus = $mahasiswa->irs ? $mahasiswa->irs->where('semester', $i)->first() : null;

            // KHS
            $khsStatus = $mahasiswa->khs->where('semester', $i)->first();

            // PKL
            $pklStatus = $mahasiswa->pkl ? $mahasiswa->pkl->where('semester', $i)->first() : null;

            // Skripsi
            $skripsiStatus = $mahasiswa->skripsi ? $mahasiswa->skripsi->where('semester', $i)->first() : null;

            if ($irsStatus && $irsStatus->isverified && $khsStatus && $khsStatus->isverified && $pklStatus && $pklStatus->isverified) {
                $semesterStatus[$i] = 'yellow';
            } elseif ($irsStatus === null && $khsStatus === null && $pklStatus === null) {
                $semesterStatus[$i] = 'red'; // Jika IRS *dan* KHS disetujui, maka warna biru
            } elseif ($irsStatus && $irsStatus->isverified && $khsStatus && $khsStatus->isverified && $skripsiStatus && $skripsiStatus->isverified) {
                $semesterStatus[$i] = 'green'; // Jika Skripsi disetujui, maka warna hijau
            } elseif ($irsStatus === null && $khsStatus === null && $skripsiStatus === null) {
                $semesterStatus[$i] = 'red';
            } elseif ($irsStatus && $irsStatus->isverified && $khsStatus && $khsStatus->isverified) {
                $semesterStatus[$i] = 'blue';
            } elseif ($irsStatus === null && $khsStatus === null) {
                $semesterStatus[$i] = 'red'; // Jika PKL disetujui, maka warna kuning
            }
        }
        return view('dosen.detail', compact('mahasiswa', 'semesterStatus'));
    }
    /**
     * Display the specified resource.
     */

    public function show(DosenWali $dosenWali)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DosenWali $dosenWali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenWaliRequest $request, DosenWali $dosenWali)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DosenWali $dosenWali)
    {
        //
    }
}
