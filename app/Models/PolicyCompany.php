<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyCompany extends Model
{
    public function policy()
    {
        return $this->hasMany('\App\Models\Policy');
    }
}
