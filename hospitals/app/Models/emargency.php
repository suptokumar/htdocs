<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emargency extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
        'age',
        'contact',
        'gender',
        'village',
        'thana',
        'district',
        'date',
        'consultant',
        'reffered',
    ];
}
