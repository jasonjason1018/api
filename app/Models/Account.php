<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    const STATUS = [
        'enabled' => 1,
        'disabled' => 0
    ];

    public function checkPassword($password)
    {
        return Hash::check($password, $this->password);
    }

    public function generateAccessToken()
    {
        $params['id_account'] = $this->id_account;
        $params['token_expired_at'] = Carbon::now()->addMinute(15)->format('Y-m-d H:i:s');
        $json = stripslashes(json_encode($params));
        return base64_encode($json);
    }
}
