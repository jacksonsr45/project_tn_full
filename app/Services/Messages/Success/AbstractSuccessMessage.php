<?php
namespace App\Services\Messages\Success;

class AbstractSuccessMessage
{
    /**
     * @var message
    */
    private $message = [];

    protected $messages = [
        'index'         => 'Listando todo o conteúdo!',
        'store'         => 'Novo cadastro realizado com sucesso!',
        'show'          => 'Listando conteúdo!',
        'update'        => 'Atualizado com sucesso!',
        'destroy'       => 'Removido com sucesso!'
    ];

    public function __construct( $type, $data)
    {
        $this->message['message'] = $this->messages[$type];
        $this->message['data'] = $data;
    }

    public function getMessage()
    {
        return $this->message;
    }
}
