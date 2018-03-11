<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int policy_id
 * @property string description
 * @property mixed features
 */
class Item extends Model
{
    protected $casts = ['features' => 'array'];
}
