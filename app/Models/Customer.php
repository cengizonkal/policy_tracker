<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed first_name
 * @property mixed last_name
 */
class Customer extends Model
{
    public function policies()
    {
        return $this->hasMany('\App\Models\Policy');
    }

    public function items()
    {
        return $this->hasManyThrough( '\App\Models\Items','\App\Models\Policy');
    }
}
