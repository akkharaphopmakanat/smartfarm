<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fielddata extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'fielddata';
    protected $fillable = [
        "plant_id",
        "moise",
        "hum",
        "temp",
        "light",
        "nutrient",
    ];
}
