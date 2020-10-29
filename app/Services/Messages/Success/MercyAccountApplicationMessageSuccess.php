<?php
namespace App\Services\Messages\Success;

class MercyAccountApplicationMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Mercy Account Applications!',
        'store'         => 'Mercy Account Application cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Mercy Account Application!',
        'update'        => 'Mercy Account Application atualizado com sucesso!',
        'destroy'       => 'Mercy Account Application Removido com sucesso!'
    ];
}
