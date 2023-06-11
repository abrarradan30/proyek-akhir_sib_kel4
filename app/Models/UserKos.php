<?php
/*
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['nama', 'username', 'password', 'email', 'role', 'foto']; // pemanggilan kolom
} 
*/
?>
<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\UserKos as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UserKos extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //public $timestamps = false;
    protected $table = 'user'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = [
        'nama', 
        'email',
        'password', 
        'role', 
        'foto'
    ]; // pemanggilan kolom

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        //'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
