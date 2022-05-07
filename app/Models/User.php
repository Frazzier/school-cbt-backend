<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use File;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'profile_picture',
        'role',
        'name',
        'email',
        'username',
        'password',
    ];

    protected $appends = [
        'profile_picture_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture != NULL) {
            return url($this->profile_picture);
        } else {
            return url('/assets/images/default-profile-picture.png');
        }
    }

    public static function boot() {
        parent::boot();
        
        static::deleting(function($user) {
            if($user->profile_picture != '/assets/images/default-profile-picture.png'){
                $file_path = public_path($user->profile_picture);

                if (File::exists($file_path)) {
                    File::delete($file_path);
                }
            }
        });
    }
}
