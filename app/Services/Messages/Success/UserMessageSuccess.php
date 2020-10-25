<?php
namespace App\Services\Messages\Success;

class UserMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de User!',
        'store'         => 'User cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de User!',
        'update'        => 'User atualizado com sucesso!',
        'destroy'       => 'User Removido com sucesso!'
    ];
}
