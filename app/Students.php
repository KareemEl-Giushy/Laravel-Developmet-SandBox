<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    //
    protected $fillable = ['name', 'email', 'degree'];
    public function class() {
        return $this->belongsTo(classes::class, 'class_id');
    }
}
