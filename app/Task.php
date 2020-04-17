<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // table
    public $table = "task";

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
