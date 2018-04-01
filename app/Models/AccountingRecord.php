<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountingRecord extends Model
{
    use SoftDeletes;
    protected $fillable=['debt','credit','description'];
}
