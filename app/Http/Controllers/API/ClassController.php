<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Class_;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(Request $request)
    {
        $classes = Class_::orderBy('department_id')->orderBy('degree')->orderBy('name');

        if($request->keyword){
            $classes = $classes->whereHas('department', function($q) use($request){
                $q->where('name', 'like', '%'.$request->keyword.'%')
                ->orWhere('abbreviation', 'like', '%'.$request->keyword.'%');
            })->orWhere('degree', 'like', '%'.$request->keyword.'%')
            ->orWhere('name', 'like', '%'.$request->keyword.'%');
        }

        if($request->limit){
            if($request->limit == -1){
                $classes = ['data' => $classes->get()];
            }else{
                $classes = $classes->paginate($request->limit);
            }
        }else{
            $classes = $classes->paginate(10);
        }

        return response([
            'classes' => $classes,
            'message' => 'Berhasil mengambil data !',
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'homeroom_teacher_id' => 'required|exists:teachers,id|unique:class_,homeroom_teacher_id',
            'degree' => 'required|in:x,xi,xii',
            'name' => 'required|string|max:15',
        ],[
            'department_id.required' => 'Pilih jurusan !',
            'department_id.exists' => 'Jurusan tidak ditemukan !',
            'homeroom_teacher_id.required' => 'Pilih wali kelas !',
            'homeroom_teacher_id.exists' => 'Wali kelas tidak ditemukan !',
            'homeroom_teacher_id.unique' => 'Guru sudah menjadi wali kelas lain !',
            'degree.required' => 'Pilih tingkat kelas !',
            'degree.in' => 'Tingkat kelas tidak valid !',
            'name.required' => 'Masukan nama kelas !',
            'name.string' => 'Nama kelas tidak valid !',
            'name.max' => 'Nama kelas maksimal 15 karakter !',
        ]);

        $isClassExists = Class_::where([
            ['department_id', $request->department_id],
            ['degree', $request->degree],
            ['name', strtolower($request->name)],
        ])->first();

        if($isClassExists){
            return response([
                "message" => "The given data was invalid.",
                "errors" => [
                    "kelas" => ["Kelas sudah ada !"]
                ]
            ], 422);
        }

        $class = Class_::create([
            'department_id' => $request->department_id,
            'homeroom_teacher_id' => $request->homeroom_teacher_id,
            'degree' => $request->degree,
            'name' => strtolower($request->name),
        ]);
        
        return response([
            'class' => Class_::find($class->id),
            'message' => 'Berhasil menyimpan data !',
        ]);
    }

    public function show(Class_ $class)
    {
        return response([
            'class' => $class,
            'message' => 'Berhasil mengambil data !',
        ]);
    }
    
    public function update(Request $request, Class_ $class)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'homeroom_teacher_id' => 'required|exists:teachers,id|unique:class_,homeroom_teacher_id,'.$class->id,
            'degree' => 'required|in:x,xi,xii',
            'name' => 'required|string|max:15',
        ],[
            'department_id.required' => 'Pilih jurusan !',
            'department_id.exists' => 'Jurusan tidak ditemukan !',
            'homeroom_teacher_id.required' => 'Pilih wali kelas !',
            'homeroom_teacher_id.exists' => 'Wali kelas tidak ditemukan !',
            'homeroom_teacher_id.unique' => 'Guru sudah menjadi wali kelas lain !',
            'degree.required' => 'Pilih tingkat kelas !',
            'degree.in' => 'Tingkat kelas tidak valid !',
            'name.required' => 'Masukan nama kelas !',
            'name.string' => 'Nama kelas tidak valid !',
            'name.max' => 'Nama kelas maksimal 15 karakter !',
        ]);

            $class->department_id = $request->department_id;
            $class->homeroom_teacher_id = intVal($request->homeroom_teacher_id);
            $class->degree = $request->degree;
            $class->name = strtolower($request->name);
            $class->save();
        
        return response([
            'class' => Class_::find($class->id),
            'message' => 'Berhasil menyimpan data !',
        ]);
    }
    
    public function destroy(Class_ $class)
    {
        $class->delete();

        return response([
            'message' => 'Berhasil menghapus data !',
        ]);
    }
}
