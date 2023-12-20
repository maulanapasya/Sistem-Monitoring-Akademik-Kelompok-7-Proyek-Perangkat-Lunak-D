<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\MHS;
use App\Models\PKL;
use App\Models\Skripsi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function dashboard()
    {
        $user_id = Auth::id();
        $department = Department::where("user_id", $user_id)->firstOrFail();
        return view('department.index', ['department' => $department]);
    }

    // public function rekap()
    // {
    //     return view('department.rekappkl');
    // }

    public function rekap()
    {
        $tahun_skrng = date("Y");

        for ($i = $tahun_skrng - 6; $i < $tahun_skrng + 1; $i++) {
            $jumlah_angkatan = MHS::where("angkatan", $i)->count();

            if ($jumlah_angkatan > 0) {
                $cek_pkl = PKL::select('i.*')
                    ->from('p_k_l_s as i')
                    ->join('mahasiswas as m', 'm.nim', '=', 'i.mahasiswa_id')
                    ->where('m.angkatan', '=', $i)
                    ->where('i.isverified', '=', 1)
                    ->count();

                session(['sudahpkl' . $i => $cek_pkl, 'belumpkl' . $i => $jumlah_angkatan - $cek_pkl]);
            } else {
                session(['sudahpkl' . $i => '-', 'belumpkl' . $i => '-']);
            }
        }
        return view('department.rekappkl');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun_skrng = date("Y");

        for ($i = $tahun_skrng - 6; $i < $tahun_skrng + 1; $i++) {
            $jumlah_angkatan = MHS::where("angkatan", $i)->count();

            if ($jumlah_angkatan > 0) {
                $cek_skripsi = Skripsi::select('i.*')
                    ->from('skripsis as i')
                    ->join('mahasiswas as m', 'm.nim', '=', 'i.mahasiswa_id')
                    ->where('m.angkatan', '=', $i)
                    ->where('i.isverified', '=', 1)
                    ->count();

                session(['sudahskripsi' . $i => $cek_skripsi, 'belumskripsi' . $i => $jumlah_angkatan - $cek_skripsi]);
            } else {
                session(['sudahskripsi' . $i => '-', 'belumskripsi' . $i => '-']);
            }
        }
        return view('department.rekapskripsi');
    }

    // function list_sudah_pkl($angkatan)
    // {
    //     dd($angkatan);
    // }
    // function list_belum_pkl($angkatan)
    // {
    //     dd($angkatan);
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
    public function sudahpkl($tahun)
    {
        // dd($tahun);
        $mhs = MHS::select('m.*')
            ->from("mahasiswas as m")
            ->join("p_k_l_s as p", "p.mahasiswa_id", "=", "m.nim")
            ->where("m.angkatan", '=', $tahun)
            ->where("p.isverified", '=', 1)
            ->get();
        return view('department.listsudahpkl', ['mhs' => $mhs]);
    }
    public function belumpkl($tahun)
    {
        // dd($tahun);
        $mhs = MHS::select('m.*')
            ->from('mahasiswas as m')
            ->join('p_k_l_s as p', 'p.mahasiswa_id', '=', 'm.nim')
            ->where('m.angkatan', '=', $tahun)
            ->where('p.isverified', '=', 0)
            ->get();
        return view('department.listbelumpkl', ['mhs' => $mhs]);
    }
    public function sudahskripsi($tahun)
    {
        // dd($tahun);
        $mhs = MHS::select('m.*')
            ->from("mahasiswas as m")
            ->join("skripsis as p", "p.mahasiswa_id", "=", "m.nim")
            ->where("m.angkatan", '=', $tahun)
            ->where("p.isverified", '=', 1)
            ->get();
        return view('department.listsudahskripsi', ['mhs' => $mhs]);
    }
    public function belumskripsi($tahun)
    {
        // dd($tahun);
        $mhs = MHS::select('m.*')
            ->from('mahasiswas as m')
            ->join('skripsis as p', 'p.mahasiswa_id', '=', 'm.nim')
            ->where('m.angkatan', '=', $tahun)
            ->where('p.isverified', '=', 0)
            ->get();
        return view('department.listbelumskripsi', ['mhs' => $mhs]);
    }

    public function halamanstatusmahasiswa()
    {

        $status = DB::table('status')->get();
        $mhs = MHS::select('m.*','s.nama_status as status_mhs')
        ->from('mahasiswas as m')
        ->join('status as s','s.id_status','=', 'm.status')
        ->get();
        return view('department.rekapstatusmahasiswa', ['status' => $status ,'mhs' => $mhs,'jml_mhs' => $mhs->count()]);
    }
    public function statusmahasiswa(Request $request)
    {
        $status = DB::table('status')->get();

        $mhs = MHS::select('m.*', "s.nama_status as status_mhs")
            ->from("mahasiswas as m")
            ->join("status as s", "s.id_status", "=", "m.status")
            ->where("m.angkatan", "=", $request->angkatan)
            ->where("m.status", "=", $request->status)
            ->get();
        return view('department.rekapstatusmahasiswa', ['status' => $status ,'mhs' => $mhs ,'jml_mhs' => $mhs->count()]);
    }
}
