<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadModule extends Model
{
    use HasFactory;

    protected $table = 'read_modules_log';
    protected $fillable = [
        'user_id',
        'module_id',
        'description',
    ];
}
