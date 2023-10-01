<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrys extends Model
{
    use HasFactory;

    protected $fillable = ['ID', 'ASSET_ID', 'EMP_NAME', 'ITEM_TYPE', 'BRAND', 'EMAIL', 'LOCATION', 'EXT'];
}
