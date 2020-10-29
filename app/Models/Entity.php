<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $appends = ['_links'];

    protected $fillable = [
        'name',
        'type',
        'description'
    ];

    protected $hidden = [
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function getLinksAttribute()
    {
        /**
         * Recebendo valor de entity->id
         * Validando caso de nulo retornando nulo
        */
        $entity = $this->id;
        if(!$entity) return null;
        return [
            'Message' => 'Usuários e tabelas relacionados a Entidade pelo ID!',
            'Entity'  => route('users.users.index', [
                'entity_id' => $this->id
            ]),

            'BankAccount'  => route('bank-accounts.bank-accounts.index', [
                'entity_id' => $this->id
            ]),

            'PietyWorks'  => route('piety-works.piety-works.index', [
                'entity_id' => $this->id
            ]),

            'MercyAccountApplication'  => route('account-application.account-application.index', [
                'entity_id' => $this->id
            ]),

            'PietyAccountMovements'  => route('account-movements.account-movements.index', [
                'entity_id' => $this->id
            ]),

            'Travel'  => route('travel.travel.index', [
                'entity_id' => $this->id
            ]),
        ];
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function thumb()
    {
        return $this->hasOne(Thumbnail::class);
    }

    public function entity_address()
    {
        return $this->hasMany(EntityAddress::class);
    }

    public function bank_account()
    {
        return $this->hasOne(BankAccount::class);
    }

    public function piety_work()
    {
        return $this->hasOne(PietyWork::class);
    }

    public function mercy_account_application()
    {
        return $this->hasOne(MercyAccountApplication::class);
    }

    public function piety_account_movements()
    {
        return $this->hasOne(PietyAccountMovements::class);
    }

    public function travel()
    {
        return $this->hasOne(Travel::class);
    }
}
