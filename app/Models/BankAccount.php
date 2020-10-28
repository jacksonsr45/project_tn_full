<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = "bank_accounts";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'entity_id',
        'user_id',
        'title',
        'account',
        'description'
    ];

    public function entity()
    {
        return $this->hasMany(Entity::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
