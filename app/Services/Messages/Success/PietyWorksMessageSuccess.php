<?php
namespace App\Services\Messages\Success;

class PietyWorksMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Piety Works!',
        'store'         => 'Piety Work cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Piety Work!',
        'update'        => 'Piety Work atualizado com sucesso!',
        'destroy'       => 'Piety Work Removido com sucesso!'
    ];
}
