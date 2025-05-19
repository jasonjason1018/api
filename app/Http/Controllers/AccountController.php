<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createAccount(Request $request)
    {
        $accountService = new AccountService();
        $accountData = $request->input();

        $validator = Validator::make($accountData, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            throw new \Exception('Invalid Parameter Request');
        }

        return $accountService->createAccount($accountData);
    }
}
