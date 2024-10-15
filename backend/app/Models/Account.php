<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use Authenticatable
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable implements MustVerifyEmail // Extend Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    // Define the fillable fields
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Optionally, if you want to hide the password in API responses
    protected $hidden = [
        'password',
    ];

     // Define the relationship to JobAdded
     public function jobs()
     {
         return $this->hasMany(JobAdded::class);
     }

    
}
