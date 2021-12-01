<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    private $statusCode = 0;
    private $apiMessage = '';

    public function __construct(int $statusCode, string $apiMessage)
    {
        $this->statusCode = $statusCode;
        $this->apiMessage = $apiMessage;
    }

    /**
     * Get the exception's context information.
     *
     * @return array
     */
    public function context()
    {
        return ['statusCode' => $this->statusCode, 'message' => $this->apiMessage];
    }
}
