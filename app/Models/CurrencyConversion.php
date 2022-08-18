<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyConversion extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_currency',
        'destination_currency',
        'rate',        
    ];

    protected $casts = [
        'rate' => 'double',
    ];        
}
