<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;


    protected $fillable = [
        'search_term',
        'search_date',
    ];

    protected $casts = [
        'search_date' => 'datetime',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
