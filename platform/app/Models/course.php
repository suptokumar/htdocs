<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'description',
        'subject',
        'link',
        'duration',
        'timezone',
        'starting',
        'teacher',
        'student',
        't_id',
        's_id',
        'guest',
        'guest_active',
        'repeat',
        'lastclass'
    ];
}
