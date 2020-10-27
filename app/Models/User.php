<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $appends = ['_links'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_id',
        'name',
        'email',
        'password',
    ];

    public function getLinksAttribute()
    {
        $entity = $this->entity_id;
        if(!$entity) return null;
        return [
            'Message' => 'Entidade relacionada a usuário',
            'Entity'  => route('entities.entities.show', [
                'entity' => $this->entity_id
            ]),
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'entity_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function entity()
    {
        return $this->hasOne(Entity::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function roles()
    {
        return $this->hasOne(Role::class);
    }

    public function user_address()
    {
        return $this->hasMany(UserAddress::class);
    }
}
