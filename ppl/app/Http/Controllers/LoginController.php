<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MHS;
use App\Models\DosenWali;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->level == "mahasiswa") {
                $user_id = auth()->id();
                $mahasiswa = MHS::where('user_id', $user_id)->first();
                if ($mahasiswa && empty($mahasiswa->alamat) && empty($mahasiswa->kab_kota) && empty($mahasiswa->provinsi) && empty($mahasiswa->foto_mahasiswa)) {
                    return redirect()->intended('/update');
                } else {
                    return redirect()->intended('/dashboardmahasiswa');
                }
            } else if (auth()->user()->level == "operator") {
                return redirect()->intended('/dashboardoperator');
            } else if (auth()->user()->level == "dosen") {
                return redirect()->intended('/dashboarddosen');
            } else if (auth()->user()->level == "department") {
                return redirect()->intended('/dashboarddepartment');
            }
        }

        return back()->with('logingagal', 'Login gagal!');
        // return $credentials;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

