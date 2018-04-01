<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int is_accountable
 */
class CustomerType extends Model
{
    use SoftDeletes;
    //
}
