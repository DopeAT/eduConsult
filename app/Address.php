<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function fullAddress()
    {
        return $this->address1. ' '. $this->address2;
    }
}
