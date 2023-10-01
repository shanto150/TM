<?php

namespace App\Models\feedback;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['additional_discount', 'airline_id', 'area_id', 'area_type', 'channel', 'days', 'discount_value', 'f_date', 'f_type', 'from_date', 'note', 'offer_category', 'party_id', 'to_date', 'Validity_type'];
}
