<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed features
 */
class PolicyType extends Model
{
    use SoftDeletes;
    protected $casts = ['features' => 'json'];
}
