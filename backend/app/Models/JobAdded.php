<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAdded extends Model
{
    use HasFactory;

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'type',
        'title',
        'description',
        'salary',
        'location',
        'company_name',       // Assuming you want to store the company name
        'company_description', // Assuming you want to store the company description
        'contact_email',      // Assuming you want to store the contact email
        'contact_phone',      // Assuming you want to store the contact phone
        'user_id', // Add this line
    ];

    // Define the relationship to the Account model
    public function user()
    {
        return $this->belongsTo(Account::class);
    }
}
