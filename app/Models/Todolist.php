<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'todolist';
    protected $primaryKey = 'id_todolist';
    protected $fillable = [
        'status',
        'task_content'
    ];

    const STATUS = [
        'unprocess' => 0,
        'confirming' => 1,
        'complete' => 2
    ];
}
