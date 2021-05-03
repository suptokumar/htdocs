<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $fillable = [
'name',
'email',
'password',
'phone',
'id_number',
'id_proof',
'school',
'school_address',
'educational_qualifications',
'subject',

    ];
}
