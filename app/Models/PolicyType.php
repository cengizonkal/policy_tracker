<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PolicyType extends Model
{
    protected $casts = ['attributes' => 'json'];
}
