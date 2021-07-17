<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'task_users';

    /**
     * @var string[]
     */
    protected $fillable = ['user_id', 'task_id'];
}
