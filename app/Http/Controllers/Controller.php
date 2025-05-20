<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Classes\ReturnDecorator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function callAction($method, $parameters)
    {
        $result = $this->{$method}(...array_values($parameters));

        $return = new ReturnDecorator($result);

        $response = response($return->decorate());

        if (isset($result['access_token'])) {
            $response = $response->cookie('access_token', $result['access_token'], 60, '/', null, false, true);
        }

        return $response;
    }
}
