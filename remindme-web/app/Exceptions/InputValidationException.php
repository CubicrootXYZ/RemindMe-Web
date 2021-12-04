<?php

namespace App\Exceptions;

use Exception;

class InputValidationException extends Exception
{
    private $field = 0;
    private $additionalInformation = '';

    public function __construct(string $field, string $additionalInformation = "")
    {
        $this->field = $field;
        $this->additionalInformation = $additionalInformation;
    }

    /**
     * Get the exception's context information.
     *
     * @return array
     */
    public function context()
    {
        return ['field' => $this->field, 'message' => $this->additionalInformation];
    }
}
