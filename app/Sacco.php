<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sacco extends Model
{

    protected $fillable = [
        'name', 'country'
    ];

    //Has Many Relationship defined for individuals and transactions
    public function individuals()
    {
        return $this->hasMany('App\Individual');
    }
}
