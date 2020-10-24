<?php

namespace App\Services;

class ApiSuccessMessages
{
    /**
     * @var message
    */
    private $message = [];

    public function __construct( $msg, $data)
    {
        $this->message['message'] = $msg;
        $this->message['data'] = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
