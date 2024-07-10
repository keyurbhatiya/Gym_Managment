<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname', 'lastname', 'username', 'gender', 'designation', 'email', 'address', 'contact', 'password'
    ];

    // Accessor to get the full name
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
