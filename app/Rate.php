<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }
}
