<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'status_id', 'description', 'assigned_to_id'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'creator_by_id');
    }

    public function assigner()
    {
        return $this->belongsTo('App\User', 'assigned_to_id');
    }

    public function status()
    {
        return $this->belongsTo('App\TaskStatus', 'status_id');
    }

    public function label()
    {
        return $this->belongsToMany('App\Label');
    }
}
