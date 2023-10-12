<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_group extends Model
{
    use HasFactory;
    protected $fillable = ['task_id','user_id','created_at','updated_at'];
}
