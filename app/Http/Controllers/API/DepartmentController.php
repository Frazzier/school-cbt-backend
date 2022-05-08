<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();

        return response([
            'departments' => $departments,
            'message' => 'Berhasil mengambil data !',
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:departments,name',
            'abbreviation' => 'required|string|max:10|unique:departments,abbreviation',
        ],[
            'name.required' => 'Nama jurusan harus diisi !',
            'name.string' => 'Nama jurusan tidak valid !',
            'name.max' => 'Nama jurusan maksimal 20 karakter !',
            'name.unique' => 'Nama jurusan sudah ada !',
            'abbreviation.required' => 'Singkatan jurusan harus diisi !',
            'abbreviation.string' => 'Singkatan jurusan tidak valid !',
            'abbreviation.max' => 'Singkatan jurusan maksimal 10 karakter !',
            'abbreviation.unique' => 'Singkatan jurusan sudah ada !',
        ]);

        $department = Department::create([
            'name' => strtolower($request->name),
            'abbreviation' => strtolower($request->abbreviation),
        ]);

        return response([
            'department' => $department,
            'message' => 'Berhasil menyimpan data !',
        ]);
    }
    
    public function show(Department $department)
    {
        return response([
            'department' => $department,
            'message' => 'Berhasil mengambil data !',
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:20|unique:departments,name,'.$department->id,
            'abbreviation' => 'required|string|max:10|unique:departments,abbreviation,'.$department->id,
        ],[
            'name.required' => 'Nama jurusan harus diisi !',
            'name.string' => 'Nama jurusan tidak valid !',
            'name.max' => 'Nama jurusan maksimal 20 karakter !',
            'name.unique' => 'Nama jurusan sudah ada !',
            'abbreviation.required' => 'Singkatan jurusan harus diisi !',
            'abbreviation.string' => 'Singkatan jurusan tidak valid !',
            'abbreviation.max' => 'Singkatan jurusan maksimal 10 karakter !',
            'abbreviation.unique' => 'Singkatan jurusan sudah ada !',
        ]);

        $department->name = strtolower($request->name);
        $department->abbreviation = strtolower($request->abbreviation);
        $department->save();

        return response([
            'department' => $department,
            'message' => 'Berhasil menyimpan data !',
        ]);
    }
    
    public function destroy(Department $department)
    {
        $department->delete();

        return response([
            'message' => 'Berhasil menghapus data !',
        ]);
    }
}
