<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    use HasFactory;

    protected $table = 'treasuries';
    protected $fillable = [
        'name',
        'is_master',
        'last_receipt_exchange',
        'last_receipt_collect',
        'added_by',
        'updated_by',
        'com_code',
        'date',
        'active',

    ];
}
