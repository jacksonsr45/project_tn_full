<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function thumb()
    {
        return $this->hasOne(Thumbnail::class);
    }

    public function entity_address()
    {
        return $this->hasMany(EntityAddress::class);
    }
}
