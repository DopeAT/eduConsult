<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id','payment_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function extra_services() {
        return $this->belongsToMany(Product::class)->select(['name']);
    }

    public function surveys() {
        return $this->hasMany(Survey::class);
    }
}
