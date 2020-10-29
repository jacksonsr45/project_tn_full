<?php
namespace App\Services\Filters;

class BankAccountsFilters extends AbstractFilters
{
    public function getResultIndexBankAccounts($request)
    {
        $this->model = $this->model->where('entity_id', 'LIKE',
                                    $request->entity_id );
    }
}
