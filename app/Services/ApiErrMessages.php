<?php

namespace App\Services;

class ApiErrMessages
{
    /**
     * @var message
    */
    private $message = [];

    public function __construct($message, array $data = [])
    {
        $this->message['message'] = $message;
        $this->message['errors'] = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
