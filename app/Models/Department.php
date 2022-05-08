<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
    ];

    protected $appends = ['class_count'];

    public function classes()
    {
        return $this->hasMany(Class_::class);
    }

    public function getClassCountAttribute()
    {
        return $this->hasMany(Class_::class)->count();
    }
}
