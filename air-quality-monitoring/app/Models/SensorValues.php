<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorValues extends Model
{
    use HasFactory;
    protected $fillable=['id','location','time','temperatureValue',' humidityValue'] ; 
}
