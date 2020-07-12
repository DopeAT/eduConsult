<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
