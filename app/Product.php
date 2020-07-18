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

    public function pricesFrom()
    {
        $prices = $this->rates->pluck('total');

        return +$prices->min();
    }
}
