<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class live extends Model
{
    use HasFactory;
    protected $fillable = [
"user",
"time",
"description",
"zoomlink",
"duration",
"subject",
"grade",
"status",
"thumbnail",
];
}
