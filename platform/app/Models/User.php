<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'key',
        'password',
'address1',
'available_time',
'status',
'cancel_request',
'evalu',
'reg_evalu',
'country',
'timezone',
'gurdain_id',
'hours',
'education',
'national_id',
'national_id_front',
'national_id_back',
'cv',
'graduation',
'bio',
'calender_link',
'image',
'zoom_link',
'gender',
'dateofbirth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
