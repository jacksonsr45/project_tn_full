<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityAddress extends Model
{
    use HasFactory;

    protected $table = 'entity_addresses';

    protected $fillable = [
        'entity_id',
        'state_id',
        'city_id',
        'address',
        'number',
        'neighborhood',
        'complement',
        'zip_code'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function entity()
    {
        return $this->hasOne(Entity::class);
    }
}
