<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'description', 'user_id',
    ];

    public function user (){
        return $this->belongsTo('App\User');
    }

    public function tags (){
        return $this->belongsToMany('App\Tag');
    }
}
