<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class systemcontrol extends Model
{
    use HasFactory;
    protected $table = 'systemcontrol';
    protected $fillable = [
        "relay",
    ];
}
