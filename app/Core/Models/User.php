<?php

namespace fooCart\Core\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'role_id',
        'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Determine if user is registered.
     *
     * @return bool
     */
    public function isRegisteredUser()
    {
        return ($this->role_id > 1) ? true : false;
    }

    /**
     * Determine if this is a temporary (unregistered) user.
     *
     * @return bool
     */
    public function isTempUser()
    {
        return (1 === $this->role_id) ? true : false;
    }
}
