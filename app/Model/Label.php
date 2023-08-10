<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['text', 'text_color', 'color'];

    public function task()
    {
        return $this->belongsToMany('App\Model\Task');
    }
}
