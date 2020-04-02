<?php

namespace App;
use App\User;
use App\Response;
use App\Statuse;
use Illuminate\Database\Eloquent\Model;

class Riquest extends Model
{
    protected $fillable = ['request','description','user_id','statuse_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function response()
    {
        return $this->hasMany('App\Response');
    }

    public function statuse(){
        return $this->belongsTo('App\Statuse');
    }

}
