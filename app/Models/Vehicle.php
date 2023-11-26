<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'license_plate',
        'brand',
        'model',
        'year',
        'img_url'
    ];

    protected $casts = [
        'year' => 'integer',
    ];

    public function vehicleDamageEvents()
    {
        return $this->belongsToMany(VehicleDamageEvent::class);
    }

    public static function storeImage($image)
    {
        return $image->store('public/images');
    }
}
