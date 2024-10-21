<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $fillable = [
        'name',
        'url_name',
        'description',
        'tailwind_code',
    ];
}
