<?php
namespace App\Services\Messages\Error;

class AbstractErrorMessage
{
    /**
     * @var message
    */
    protected $message = [];

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
