<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waiting extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_info',
        'contact',
        'reach',
        'follower',
        'time_to_contact',
        'done',
    ];
}
