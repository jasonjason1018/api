<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AccountControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_account_success()
    {
        $params = [
            'username' => 'test',
            'password' => 'test1234'
        ];

        $response = $this->call('POST', '/api/account', $params);
        $response->assertStatus(200);

        $account = Account::where('username', '=', $params['username']);

        $this->assertTrue($account->exists());
        $this->assertTrue(Hash::check($params['password'], $account->first()->password));
    }

    public function test_create_account_username_already_exists()
    {
        $params = [
            'username' => 'test',
            'password' => 'test1234'
        ];

        Account::create($params);

        $response = $this->call('POST', '/api/account', $params);
        $response->assertStatus(500);

        $expected = '{"success":false,"code":999,"message":"username already exists."}';
        $this->assertEquals($expected, $response->getContent());
    }
}
