<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKos extends Model
{
    use HasFactory;
    protected $table = 'user'; // pemanggilan nama table
    protected $primaryKey = 'id'; // pemanggilang id atau pk
    protected $fillable = ['nama']; // pemanggilan kolom
}
