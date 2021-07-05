<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Number;

class NumbersController extends Controller
{
    

    // Insert method that will carry out the 
    public function calculate(Number $number)
    {
        request()->validate([
            'maximum' => 'required'
        ]);

        $max = request('maximum');
        $maximumNumber  = intval($max);
        $comment = "";
        $returnArray = array();

        for($i = 1; $i <= $maximumNumber; $i++)
        {
            if(($i%3==0 and $i%5==0))
            {
                $comment = "fizzbuzz";
            }
            else if($i%3==0)
            {
                $comment = "fizz";
            }
            else if($i%5==0)
            {
                $comment = "buzz";
            }
            else
            {
                $comment = "";
            }

            array_push($returnArray,$comment);
        }

        //$values = json_encode($returnArray);
        return response([ 'comments' => $returnArray, 'message' => 'Numbers Logic Executed Successfully'], 200);
        //return $values;
    }

    
}
