<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User};
use Hash;
use File;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ],[
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Nama tidak valid !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah terdaftar !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.required' => 'Password tidak valid !',
            'password.min' => 'Password minimal 8 karakter !',
            'password.confirmed' => 'Konfirmasi password tidak cocok !',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash($request->password)
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user,
        ], 201);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
            'email.exists' => 'Email tidak terdaftar !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.string' => 'Password tidak valid !',
            'password.min' => 'Password minimal 8 karakter !',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'The given data was invalid !',
                'errors' => ['password' => ['Password yang anda masukan salah !']]
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'token' => $token,
            'user' => $user,
            'message' => 'Login berhasil !',
        ], 200);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Logout Berhasli !'
        ], 200);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'profile_picture' => 'mimes:png,jpg,jpeg|max:2048',
        ], [
            'name.required' => 'Nama tidak boleh kosong !',
            'name.string' => 'Format nama tidak valid !',
            'name.max' => 'Nama terlalu panjang !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah dipakai !',
            'profile_picture.mimes' => 'Format gambar yang diizinkan hanya PNG, JPG, JPEG',
            'profile_picture.max' => 'Max ukuran gambar adalah 2 MB',
        ]);

        if ($request->hasFile('profile_picture')) {
            $upload_dir = '/uploads/images/profile-picture/';

            $profile_picture = $request->file('profile_picture');
            $name = time() . $profile_picture->getClientOriginalExtension();
            $profile_picture->move(public_path() . $upload_dir, $name);

            if(auth()->user()->profile_picture != '/assets/images/default-profile-picture.png'){
                $file_path = public_path(auth()->user()->profile_picture);
    
                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }

            auth()->user()->profile_picture = $upload_dir . $name;
        }

        auth()->user()->name = $request->name;
        auth()->user()->email = $request->email;
        auth()->user()->save();

        return response([
            'user' => auth()->user(),
            'message' => 'Profile berhasil diupdate !',
        ], 200);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|string|min:8'
        ],[
            'password.required' => 'Password baru harus diisi !',
            'password.confirmed' => 'Password konfirmasi tidak cocok !',
            'password.min' => 'Password minimal 8 karakter !',
        ]);

        auth()->user()->password = Hash::make($request->password);
        auth()->user()->save();

        return response([
            'message' => 'Password berhasil diganti !'
        ], 200);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ],[
            'user_id.required' => 'Pilih akun pengguna !',
            'user_id.exists' => 'Pengguna tidak ditemukan !'
        ]);

        $user = User::find($request->user_id);

        $user->password = bcrypt('password');

        return response([
            'message' => 'Password berhasil direset !',
        ]);
    }
}
