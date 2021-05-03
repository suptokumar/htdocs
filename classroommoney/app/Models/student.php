<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
     protected $fillable = [
'name',
'gender',
'birth',
'address',
'email',
'phone',
'password',
'city',
'state',
'country',
'id_number',
'id_proof',
'class',
'section',
'photo',
'f_name',
'f_phone',
'f_occupation',
'm_name',
'm_occupation',

    ];
}
