<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'equipment',
        'description',
        'dop',
        'quantity',
        'vendor',
        'address',
        'contact_number',
        'cost_per_item'
    ];
}
