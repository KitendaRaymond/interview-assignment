<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    // Values that are provided from application..

    protected $fillable = [
        'amount', 'type', 'individual_id'
    ];
}
