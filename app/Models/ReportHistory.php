<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportHistory extends Model
{
    use HasFactory;
    protected $table = 'report_histories';
    public $timestamps = true;
    protected $fillable = [
        "plant_id",
        "moise",
        "hum",
        "temp",
        "light",
        "nutrient",
    ];
}
