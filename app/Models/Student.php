<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class_id',
        'test_permission',
    ];

    protected $with = ['user','class_'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class_()
    {
        return $this->belongsTo(Class_::class, 'class_id');
    }
}
