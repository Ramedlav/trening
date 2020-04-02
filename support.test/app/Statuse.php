<?php

namespace App;
use App\Riquest;
use Illuminate\Database\Eloquent\Model;

class Statuse extends Model
{
    protected $fillable = ['status','riquest_id'];

    public function riquest(){
        return $this->hasOne('App\Riquest');
    }
}
