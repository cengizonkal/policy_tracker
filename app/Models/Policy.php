<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    public function items()
    {
        return $this->hasMany('\App\Models\Item');
    }

    public function policy_type()
    {
        return $this->belongsTo('\App\Models\PolicyType');
    }
}
