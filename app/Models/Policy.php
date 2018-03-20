<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Policy
 * @property mixed id
 * @property Customer customer
 * @property PolicyType policyType
 * @package App\Models
 */
class Policy extends Model
{

    protected $fillable = ['policy_type_id'];
    protected $appends = ['total_price'];
    protected $dates = ['valid_until'];


    public function items()
    {
        return $this->hasMany('\App\Models\Item');
    }

    public function policyType()
    {
        return $this->belongsTo('\App\Models\PolicyType');
    }

    public function customer()
    {
        return $this->belongsTo('\App\Models\Customer');
    }

    public function getTotalPriceAttribute()
    {
        return $this->items()->sum('price');
    }
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format( 'd-m-Y H:i:s'); // Use your own format here
    }

}
