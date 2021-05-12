<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myresult extends Model
{
    use HasFactory;
    protected $fillable = [
'student',
'teacher',
'mark',
'attend',
'status',
'grades',
'amount',
'subject',
'withstatus',
    ];
}
