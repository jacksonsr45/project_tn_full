<?php
namespace App\Services\Messages\Success;

class EntityMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Entity!',
        'store'         => 'Entity cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Entity!',
        'update'        => 'Entity atualizado com sucesso!',
        'destroy'       => 'Entity Removido com sucesso!'
    ];
}
