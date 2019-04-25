<?php

namespace App\Http\Controllers\Validator;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfileController extends Controller
{
    public function indexProfile()
    {
        $user = User::where([
            'id' => auth('user')->user()->id
        ])->get()->first();

        return view('Validator/editProfile', compact('user'));
    }

    public function editProfile(Request $request)
    {


        $this->validate($request, [
            'username' => 'required|max:30|min:6',
            'password' => 'max:30',
            'validatePassword' => 'max:30',
        ], [
            'required' => ':Attribute tidak boleh kosong !',
            'max' => 'Panjang :Attribute maksimal 30 Karakter!',
            'min' => 'Panjang :Attribute minimal 6 Karakter!',
        ]);

        if ($request->password || $request->validatePassword) {
            if ($request->password != $request->validatePassword) {
                return redirect()->route('validator-indexProfile')
                    ->with([
                        'status' => 'danger',
                        'message' => 'Password tidak sesuai dengan password validasi!'
                    ])->withInput();
            }
        }

        if (auth('user')->user()->username != $request->username) {
            $checkUsername = DB::table('user')->where([
                ['username', $request['username']],
            ])->get()->count();
            if ($checkUsername != 0) {
                return redirect()->route('validator-indexProfile', ['id' => $request->id])
                    ->with([
                        'status' => 'danger',
                        'message' => 'Username' . $request->user . ' sudah terpakai!'
                    ]);
            }
        }
        $user = $user = User::where([
            'id' => auth('user')->user()->id
        ])->get()->first();

        if ($request->password) {
            $user->update([
                'username' => $request->username,
                'password' => bcrypt($request->password)
            ]);

        } else {
            $user->update([
                'username' => $request->username,
            ]);
        }

        return redirect()->route('validator-indexProfile')
            ->with([
                'status' => 'success',
                'message' => 'Profile berhasil diupdate!'
            ]);

    }
}
