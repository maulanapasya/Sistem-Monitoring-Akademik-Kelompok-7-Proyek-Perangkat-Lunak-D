<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skripsi;
use Illuminate\Support\Facades\DB;

class SkripsiDosenController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('skripsis')
            ->join('mahasiswas', 'skripsis.mahasiswa_id', '=', 'mahasiswas.nim')
            ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
            ->select('mahasiswas.nama', 'skripsis.id', 'skripsis.semester', 'skripsis.tglsidang', 'skripsis.nilaiskripsi', 'skripsis.scansidang', 'skripsis.isverified');

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        // Menambahkan kondisi untuk memfilter berdasarkan isverified
        $query->where('isverified', '=', 0);
        $dataskripsi = $query->paginate(10);

        return view('dosen.skripsiverifikasi', compact('dataskripsi'));
    }



    public function download($id)
    {

        $downloadskripsi = DB::table('skripsis')->where('id', '=', $id)->first();
        $filepath = public_path("file/{$downloadskripsi->scansidang}");
        // Memberikan respons untuk mengunduh file

        // dd(5);
        return response()->file($filepath);
    }

    public function changestatus(Request $request)
    {
        $dataskripsi = Skripsi::find($request->id);

        $dataskripsi->isverified = 1;
        // dd($request);
        $dataskripsi->save();
        return redirect('/dashboarddosen/verifikasiskripsi')->with('success', 'Skripsi setujui');
    }

    public function unchangestatus(Request $request)
    {
        $dataskripsi = Skripsi::find($request->id);
        $dataskripsi->isverified = 0;
        // dd($request);
        $dataskripsi->save();
        return redirect('/dashboarddosen/verifikasiskripsi')->with('gagal', 'Skripsi tidak disetujui');
    }
}
