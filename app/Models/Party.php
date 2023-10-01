<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = ['address', 'category', 'city', 'contact_name', 'country', 'created_at', 'designation', 'district', 'division', 'email', 'established', 'mobile', 'name', 'note', 'party_type'];
}
