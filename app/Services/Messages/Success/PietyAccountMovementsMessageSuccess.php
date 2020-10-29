<?php
namespace App\Services\Messages\Success;

class PietyAccountMovementsMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Bank Piety Account Movements!',
        'store'         => 'Piety Account Movement cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Piety Account Movement!',
        'update'        => 'Piety Account Movement atualizado com sucesso!',
        'destroy'       => 'Piety Account Movement Removido com sucesso!'
    ];
}
