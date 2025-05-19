<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $primaryKey = 'id_account';
    protected $fillable = [
        'username',
        'password',
        'status'
    ];

}
