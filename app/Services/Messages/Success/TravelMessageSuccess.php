<?php
namespace App\Services\Messages\Success;

class TravelMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Travels!',
        'store'         => 'Travel cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Travel!',
        'update'        => 'Travel atualizado com sucesso!',
        'destroy'       => 'Travel Removido com sucesso!'
    ];
}
