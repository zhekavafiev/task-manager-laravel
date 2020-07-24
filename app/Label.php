<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public $timestamps = false;
    protected $fillable = ['text', 'text_color', 'color'];

    public function task()
    {
        return $this->belongsToMany('App\Task');
    }
}
