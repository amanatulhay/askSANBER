<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(){
        $iduser = Auth::id();

        $detailProfile = Profile::where('user_id', $iduser)->first();

        return view('profile.index', ['detailProfile'=> $detailProfile]);

    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'umur' => 'required',
            'bio' => 'required',
            'alamat' => 'required'
        ]);

        $profile = Profile::find($id);

        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->bio = $request->bio;

        $profile->save();

        
        Alert::success('SUCCESS', 'Profile Update completed');

        return redirect('/profile');
    }
}
