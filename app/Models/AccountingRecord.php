<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountingRecord extends Model
{
    protected $fillable=['debt','credit','description'];
}
