<?php

namespace App;
use App\User;
use App\Riquest;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = ['response','riquest_id','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function riquest()
    {
        return $this->belongsTo('App\Riquest');
    }


}
