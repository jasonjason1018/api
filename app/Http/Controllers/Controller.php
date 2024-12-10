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

        return $return->decorate();
    }
}
