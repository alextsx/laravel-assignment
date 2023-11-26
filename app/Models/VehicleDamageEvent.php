<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleDamageEvent extends Model
{
    use HasFactory;


    protected $fillable = [
        'location',
        'date',
        'description',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class)->withTimestamps();
    }
}
