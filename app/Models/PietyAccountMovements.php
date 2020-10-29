<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PietyAccountMovements extends Model
{
    use HasFactory;
    protected $table = "piety_account_movements";

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'entity_id',
        'user_id',
        'account_id',
        'historic',
        'deb',
        'cred',
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
