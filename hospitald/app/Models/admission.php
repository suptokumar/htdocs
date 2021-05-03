<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admission extends Model
{
    use HasFactory;
    protected $fillable = [
'em_id',
'name',
'age',
'contact',
'gender',
'village',
'thana',
'district',
'date',
'consultant',
'con_id',
'reffered',
'room_id',
'room',
'total',
'paid',
'discharge',
    ];
}
