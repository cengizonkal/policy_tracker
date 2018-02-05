<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function policies()
    {
        return $this->hasMany('\App\Models\Policy');
    }

    public function items()
    {
        return $this->hasManyThrough('\App\Models\Policy', '\App\Models\Items');
    }
}
