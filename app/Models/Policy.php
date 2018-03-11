<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Policy
 * @property mixed id
 * @property PolicyType policy_type
 * @package App\Models
 */
class Policy extends Model
{

    protected $fillable = ['policy_type_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('\App\Models\Item');
    }

    public function policy_type()
    {
        return $this->belongsTo('\App\Models\PolicyType');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Models\Customer');
    }
}
