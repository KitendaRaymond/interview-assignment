<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
   // use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'gender', 'sacco_id'
    ];


    //Has Many Relationship defined for individuals and transactions
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    } 
}
