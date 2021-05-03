<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_list extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name',
        'shedule',
        'repeat',
        'priority',
        'category',
        'user',
        'month',
        'year',
        'time',
        'status',
    ];
}
