<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['party_id','task_type','task_date','start_time','end_time','duration','priority','assign_to','zone','area_type','area_id','title','note','status'];
}
