<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function user_address()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function entity_address()
    {
        return $this->hasMany(EntityAddress::class);
    }
}
