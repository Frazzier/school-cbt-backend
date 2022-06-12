<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_ extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'homeroom_teacher_id',
        'degree',
        'name',
    ];

    protected $with = ['department','homeroom_teacher'];

    protected $appends = ['student_count'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function homeroom_teacher()
    {
        return $this->belongsTo(Teacher::class, 'homeroom_teacher_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function getStudentCountAttribute()
    {
        return Student::where('class_id', $this->id)->count();
    }
    
    public static function boot() {
        parent::boot();

        static::deleting(function($class) {
            foreach ($class->students as $student) {
                $student->delete();
            }
        });
    }
}
