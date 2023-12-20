<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PKL;
use Illuminate\Support\Facades\DB;

class PKLDosenController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('p_k_l_s')
            ->join('mahasiswas', 'p_k_l_s.mahasiswa_id', '=', 'mahasiswas.nim')
            ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
            ->select('mahasiswas.nama', 'p_k_l_s.id', 'p_k_l_s.semester', 'p_k_l_s.nilaipkl', 'p_k_l_s.scanpkl', 'p_k_l_s.isverified');

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        // Menambahkan kondisi untuk memfilter berdasarkan isverified
        $query->where('isverified', '=', 0);
        $datapkl = $query->paginate(10);

        return view('dosen.pklverifikasi', compact('datapkl'));
    }



    public function download($id)
    {

        $downloadpkl = DB::table('p_k_l_s')->where('id', '=', $id)->first();
        $filepath = public_path("file/{$downloadpkl->scanpkl}");
        // Memberikan respons untuk mengunduh file

        // dd(5);
        return response()->file($filepath);
    }

    public function changestatus(Request $request)
    {
        $datapkl = PKL::find($request->id);

        $datapkl->isverified = 1;
        // dd($request);
        $datapkl->save();
        return redirect('/dashboarddosen/verifikasipkl')->with('success', 'PKL setujui');
    }

    public function unchangestatus(Request $request)
    {
        $datairs = PKL::find($request->id);

        $datairs->isverified = 0;
        // dd($request);
        $datairs->save();
        return redirect('/dashboarddosen/verifikasipkl')->with('gagal', 'PKL tidak disetujui');
    }
}
