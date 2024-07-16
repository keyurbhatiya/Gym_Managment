<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'curr_date', 'curr_time'];

    public function member()
    {
        return $this->belongsTo(Member::class, 'user_id');
    }
}
