<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'entity_id',
        'phone',
        'mobile_phone',
        'description',
        'function'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function entity()
    {
        return $this->hasOne(Entity::class);
    }
}
