<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed resolved_at
 * @property mixed result
 */
class Followup extends Model
{
    use SoftDeletes;
    protected $dates = ['processed_at', 'deleted_at'];

    public function policy()
    {
        return $this->belongsTo('\App\Models\Policy');
    }
}
