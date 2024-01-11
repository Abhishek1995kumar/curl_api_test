<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Admin extends Model {
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;
    public $table = "admins";
    protected $guard = "admin";
    protected $fillable = [
        'name',
        'username',
        'address',
        'status',
        'role',
        'email',
        'password',
    ];

    // jab ham controller me select all data karte hai tab bhi password nahi jata hai hai kyoki password yaha model me protected hai
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function isAdmin(): Attribute{
        return new Attribute (
            get : fn ()=> "yes",
        );
    }
}
