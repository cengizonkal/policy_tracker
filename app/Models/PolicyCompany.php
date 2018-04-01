<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PolicyCompany extends Model
{
    use SoftDeletes;
    public function policy()
    {
        return $this->hasMany('\App\Models\Policy');
    }
}
