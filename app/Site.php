<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = ['region','site','pad'];
    
    public function checkpoints() {
        return $this->hasMany('App\Checkpoint');
    }
}
