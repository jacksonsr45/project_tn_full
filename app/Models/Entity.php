<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'description'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function entity()
    {
        return $this->hasOne(Thumbnail::class);
    }
}
