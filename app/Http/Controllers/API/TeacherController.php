<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\{Teacher, User};
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teachers = Teacher::with(['user' => function($q){
            $q->orderBy('name');
        }]);

        if($request->keyword){
            $teachers = $teachers->whereHas('user', function($q) use($request){
                $q->where('name', 'like', '%'.$request->keyword.'%')
                ->orWhere('email', 'like', '%'.$request->keyword.'%');
            });
        }

        if($request->limit){
            if($request->limit == -1){
                $teachers = ['data' => $teachers->get()];
            }else{
                $teachers = $teachers->paginate($request->limit);
            }
        }else{
            $teachers = $teachers->paginate(10);
        }

        return response([
            'teachers' => $teachers,
            'message' => 'Berhasil mengambil data !',
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ],[
            'name.required' => 'Nama harus diisi !',
            'name.string' => 'Nama tidak valid !',
            'name.max' => 'Nama terlalu panjang !',
            'email.required' => 'Email harus diisi !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan',
        ]);

        $user_id = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ])->id;

        $teacher_id = Teacher::create([
            'user_id' => $user_id,
        ])->id;

        $teacher = Teacher::find($teacher_id);

        return response([
            'teacher' => $teacher,
            'message' => 'Berhasi menyimpan data !',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return response([
            'teacher' => $teacher,
            'message' => 'Berhasil mengambil data !',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$teacher->user->id,
        ],[
            'name.required' => 'Nama harus diisi !',
            'name.string' => 'Nama tidak valid !',
            'name.max' => 'Nama terlalu panjang !',
            'email.required' => 'Email harus diisi !',
            'email.email' => 'Email tidak valid !',
            'email.unique' => 'Email sudah digunakan',
        ]);

        $teacher->user->name = $request->name;
        $teacher->user->email = $request->email;
        $teacher->user->save();

        return response([
            'teacher' => $teacher,
            'message' => 'Berhasil menyimpan data !',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->user->delete();

        return response([
            'message' => 'Berhasil menghapus data !',
        ], 200);
    }
}
