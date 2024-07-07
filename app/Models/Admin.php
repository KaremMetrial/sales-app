<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'created_at'.
        'updated_at',
        'added_by',
        'updated_by',
        'com_code',
    ];
    protected $hidden = [
        'password'
    ];
}
