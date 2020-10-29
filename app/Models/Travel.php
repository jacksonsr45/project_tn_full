<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = "travels";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'entity_id',
        'user_id',
        'account_id',
        'title',
        'collection',
        'delivered',
        'complement',
        'deposit',
        'loot',
        'returned',
        'expenses',
        'total'
    ];

    public function entity()
    {
        return $this->hasMany(Entity::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function account()
    {
        return $this->hasOne(BankAccount::class);
    }
}
