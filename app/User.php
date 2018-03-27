<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed name
 */
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getInitials()
    {
        return mb_strtoupper(substr($this->name,0,1));
    }

}
