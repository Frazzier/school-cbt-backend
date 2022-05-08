<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{Student, User};
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::with(['user' => function($q){
            $q->orderBy('name');
        }]);

        if($request->keyword){
            $students = $students->whereHas('user', function($q) use($request){
                $q->where('name', 'like', '%'.$request->keyword.'%')
                ->orWhere('email', 'like', '%'.$request->keyword.'%');
            });
        }

        if($request->limit){
            if($request->limit == -1){
                $students = ['data' => $students->get()];
            }else{
                $students = $students->paginate($request->limit);
            }
        }else{
            $students = $students->paginate(10);
        }

        return response([
            'students' => $students,
            'message' => 'Berhasil mengambil data !',
        ], 200);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:class_,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ],[
            'class_id.required' => 'Pilih kelas !',
            'class_id.exists' => 'Kelas tidak ditemukan',
            'name.required' => 'Nama harus diisi !',
            'name.string' => 'Nama tidak valid !',
            'name.max' => 'Nama terlalu panjang !',
            'email.required' => 'Email harus diisi !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan',
        ]);

        $user_id = User::create([
            'name' => strtolower($request->name),
            'email' => strtolower($request->email),
            'password' => bcrypt('password'),
            'role' => 'student',
        ])->id;

        $student_id = Student::create([
            'user_id' => $user_id,
            'class_id' => $request->class_id,
        ])->id;

        $student = Student::find($student_id);

        return response([
            'student' => $student,
            'message' => 'Berhasi menyimpan data !',
        ]);
    }
    
    public function show(Student $student)
    {
        return response([
            'student' => $student,
            'message' => 'Berhasil mengambil data !',
        ], 200);
    }
    
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'class_id' => 'required|exists:class_,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$student->user->id,
        ],[
            'class_id.required' => 'Pilih kelas !',
            'class_id.exists' => 'Kelas tidak ditemukan',
            'name.required' => 'Nama harus diisi !',
            'name.string' => 'Nama tidak valid !',
            'name.max' => 'Nama terlalu panjang !',
            'email.required' => 'Email harus diisi !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan',
        ]);

        
        $student->user->name = strtolower($request->name);
        $student->user->email = strtolower($request->email);
        $student->user->save();

        $student->class_id = $request->class_id;
        $student->save();

        return response([
            'student' => $student,
            'message' => 'Berhasi menyimpan data !',
        ]);
    }
    
    public function destroy(Student $student)
    {
        $student->user->delete();

        return response([
            'message' => 'Berhasil menghapus data !',
        ], 200);
    }
}
