<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyAnswer extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}
