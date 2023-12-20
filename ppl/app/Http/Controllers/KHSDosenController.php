<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KHS;


class KHSDosenController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('k_h_s')
            ->join('mahasiswas', 'k_h_s.mahasiswa_id', '=', 'mahasiswas.nim')
            ->where('dosen_wali', '=', auth()->user()->dosenWali->nip)
            ->select('mahasiswas.nama', 'k_h_s.id', 'k_h_s.semester', 'k_h_s.skssemester', 'k_h_s.skskumulatif', 'k_h_s.ipsemester', 'k_h_s.ipkumulatif', 'k_h_s.scankhs', 'k_h_s.isverified');

        if ($request->has('search')) {
            $query->where('nama', 'LIKE', '%' . $request->search . '%');
        }

        // Menambahkan kondisi untuk memfilter berdasarkan isverified
        $query->where('isverified', '=', 0);
        $datakhs = $query->paginate(10);

        return view('dosen.khsverifikasi', compact('datakhs'));
    }



    public function download($id)
    {

        $downloadkhs = DB::table('k_h_s')->where('id', '=', $id)->first();
        $filepath = public_path("file/{$downloadkhs->scankhs}");
        // Memberikan respons untuk mengunduh file

        // dd(5);
        return response()->file($filepath);
    }

    public function changestatus(Request $request)
    {
        $datakhs = KHS::find($request->id);

        $datakhs->isverified = 1;
        // dd($request);
        $datakhs->save();
        return redirect('/dashboarddosen/verifikasikhs')->with('success', 'KHS setujui');
    }

    public function unchangestatus(Request $request)
    {
        $datakhs = KHS::find($request->id);

        $datakhs->isverified = 0;
        // dd($request);
        $datakhs->save();
        return redirect('/dashboarddosen/verifikasikhs')->with('gagal', 'KHS tidak disetujui');
    }
}
