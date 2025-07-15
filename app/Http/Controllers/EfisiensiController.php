<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Baby;
use App\Models\Mother;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $profil = Auth::user();
            $user = User::with('admin')->where('id', $profil->id)->first();
            $baby = null;
        } else {
            $profil = Auth::user();
            $user = User::with('mother')->where('id', $profil->id)->first();
            $baby = Baby::where('mother_id', $user->mother->id)->first();
        }
        return view('pages.Analisis-Efisiensi-Pasar.index', [
            'profil' => $user,
            'baby' => $baby
        ]);
    }
    public function updateProfile(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $validateDate = $request->validate([
                "id" => "required",
                "nama" => "required",
                "no_hp" => "required",
            ]);
            Admin::where("user_id", $validateDate['id'])->update($validateDate);
            return redirect()->back()->with("success", "User has been Edited!");
        } else {
            $validateDate = $request->validate([
                "id" => "required",
                "nama" => "required",
                "no_hp" => "required",
                "berat_badan" => "required",
                "tinggi_badan" => "required",
                "umur" => "required",
                //bayi
                "nama_bayi" => "required",
                "jenis_kelamin" => "required",
                "berat_badan_bayi" => "required",
                "tinggi_badan_bayi" => "required",
            ]);
            Mother::where("user_id", $validateDate['id'])->update([
                'nama' => $validateDate['nama'],
                'no_hp' => $validateDate['no_hp'],
                'berat_badan' => $validateDate['berat_badan'],
                'tinggi_badan' => $validateDate['tinggi_badan'],
                'umur' => $validateDate['umur'],
            ]);
            Baby::where("mother_id", $request->mother_id)->update([
                'nama' => $validateDate['nama_bayi'],
                'jenis_kelamin' => $validateDate['jenis_kelamin'],
                'berat_badan' => $validateDate['berat_badan_bayi'],
                'tinggi_badan' => $validateDate['tinggi_badan_bayi'],
            ]);

            return redirect()->back()->with("success", "User has been Edited!");
        }
    }
}
