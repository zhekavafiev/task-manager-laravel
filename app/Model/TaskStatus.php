<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
