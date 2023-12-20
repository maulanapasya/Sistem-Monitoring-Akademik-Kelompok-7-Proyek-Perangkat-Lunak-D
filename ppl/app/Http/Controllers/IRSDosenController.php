<?php

namespace App\Http\Controllers;

use App\Models\IRS;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IRSDosenController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('irs')
            ->join('mahasiswas', 'irs.mahasiswa_id', '=', 'mahasiswas.nim')
            ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
            ->select('mahasiswas.nama', 'irs.id', 'irs.semester', 'irs.jmlsks', 'irs.scansks', 'irs.isverified');

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        // Menambahkan kondisi untuk memfilter berdasarkan isverified
        $query->where('isverified', '=', 0);

        $datairs = $query->paginate(10);

        return view('dosen.verifikasi', compact('datairs'));
    }



    public function download($id)
    {

        $downloadirs = DB::table('irs')->where('id', '=', $id)->first();
        $filepath = public_path("file/{$downloadirs->scansks}");
        // Memberikan respons untuk mengunduh file

        return response()->file($filepath);
    }

    public function changestatus(Request $request)
    {
        $datairs = IRS::find($request->id);

        $datairs->isverified = 1;
        // dd($request);
        $datairs->save();
        return redirect('/dashboarddosen/verifikasiirs')->with('success', 'IRS setujui');
    }

    public function unchangestatus(Request $request)
    {
        $datairs = IRS::find($request->id);

        $datairs->isverified = 0;
        // dd($request);
        $datairs->save();
        return redirect('/dashboarddosen/verifikasiirs')->with('gagal', 'IRS tidak disetujui');
    }
}
