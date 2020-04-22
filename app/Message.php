<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{

    protected $fillable = ['name','email','phone','message'];

    use SoftDeletes;

}
