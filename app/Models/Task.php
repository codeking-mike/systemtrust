<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['client_name', 'location','task_type', 
    'task_description', 'fse_assigned', 'task_status'];
}
