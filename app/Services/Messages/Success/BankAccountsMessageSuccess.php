<?php
namespace App\Services\Messages\Success;

class BankAccountsMessageSuccess extends AbstractSuccessMessage
{
    protected $messages = [
        'index'         => 'Listando todo o conteúdo de Bank Accounts!',
        'store'         => 'Bank Account cadastrado com sucesso!',
        'show'          => 'Listando conteúdo de Bank Account!',
        'update'        => 'Bank Account atualizado com sucesso!',
        'destroy'       => 'Bank Account Removido com sucesso!'
    ];
}
