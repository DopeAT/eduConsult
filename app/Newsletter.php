<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Newsletter extends Model
{

    use SoftDeletes;

    protected $fillable = ['email', 'is_new'];
    protected $table    = 'newsletter';
}
