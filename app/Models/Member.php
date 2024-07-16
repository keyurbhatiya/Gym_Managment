<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'username',
        'password',
        'gender',
        'dor',
        'plan',
        'contact_number',
        'address',
        'service',
        'total_amount',
    ];

    protected $hidden = [
        'password',
    ];
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'user_id');
    }
}
