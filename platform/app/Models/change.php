<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class change extends Model
{
    use HasFactory;
    protected $fillable = [
'class_id',
'timezone',
'replacetime',
'status',
'app',
    ];
}
