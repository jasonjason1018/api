<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\Account;

class AccountService
{
    public function createAccount($accountData)
    {
        $isUserNameExists = Account::where('username', '=', $accountData['username'])->exists();

        if ($isUserNameExists) {
            throw new \Exception('username already exists.');
        }

        $accountData['password'] = Hash::make($accountData['password']);

        return Account::create($accountData);
    }
}
