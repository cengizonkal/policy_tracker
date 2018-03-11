<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed features
 */
class PolicyType extends Model
{
    protected $casts = ['features' => 'json'];
}
