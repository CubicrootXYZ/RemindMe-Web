<?php

namespace App\Http\Controllers;

use App\Exceptions\InputValidationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function requireInArray(string $key, array $array, string $type = "string") {
        if (!key_exists($key, $array)) {
            throw new InputValidationException($key, 'field is missing');
        }
        if (gettype($array[$key]) != $type) {
            throw new InputValidationException($key, 'field is wrong format, should be ' . $type);
        }
    }
}
