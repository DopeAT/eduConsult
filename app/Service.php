<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Service extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function rates() {
        return $this->hasMany(Rate::class);
    }

    public function pricesFrom()
    {
        $prices = $this->rates->pluck('total');

        return +$prices->min();
    }

}
