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

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function homeroom_teacher()
    {
        return $this->belongsTo(Teacher::class, 'homeroom_teacher_id');
    }
}
