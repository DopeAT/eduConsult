<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyQuestion extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }
}
