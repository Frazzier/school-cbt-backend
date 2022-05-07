<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Setting};
use File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        $setting->makeHidden(['created_at', 'updated_at']);
        $setting->logo = url($setting->logo);

        return response(['data' => $setting], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'app_name' => 'required|string|max:255',
            'logo' => 'nullable|mimes:png,jpg,jpeg',
            'small_logo' => 'nullable|mimes:png,jpg,jpeg',
            'auth_background' => 'nullable|mimes:png,jpg,jpeg',
        ],[
            'app_name.required' => 'Nama aplikasi harus diisi !',
        ]);

        $setting = Setting::find(1);
        if ($request->hasFile('logo')) {
            $upload_dir = '/uploads/images/setting/';

            $logo = $request->file('logo');
            $name = time() . $logo->getClientOriginalExtension();
            $logo->move(public_path() . $upload_dir, $name);

            $file_path = public_path($setting->logo);

            if (File::exists($file_path)) {
                File::delete($file_path);
            }

            $setting->logo = $upload_dir.$name;
        }

        $setting->app_name = $request->app_name;

        if ($setting->save()) {
            $setting->logo = $setting->logo ? url($setting->logo) : $setting->logo;
            return response(['data' => $setting], 200);
        }
    }
}
