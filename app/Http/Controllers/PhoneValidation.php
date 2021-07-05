<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;

class PhoneValidation extends Controller
{

    function validatePhone($number)
    {

        //
        // It wouldve been easier to use str_starts_with however the php version in the container is 7.1
        // and that function is in php 8.0 so i had to use substring instead.....
        //


        /*if(str_starts_with(trim($phoneNumber,''), '256') && strlen(trim($phoneNumber)) == 15)
        {
            return true;
        }
        else if(str_starts_with(trim($phoneNumber,''), '0') && strlen(trim($phoneNumber)) == 10)
        {
            return true;
        }
        else
        {
            return false;
        }
        */

         // I chose the  valid numbers to start with 256 and 0...I could not use 07 or 2567 because some numbers begin with 039....

        $status = false;
       if(substr(trim($number), 0, 3) == "256" && strlen(trim($number)) == 12)
       {
           $status = true;
       }
       else if(substr(trim($number), 0, 1) == "0"&& strlen(trim($number)) == 10)
       {
           $status = true;
       }
       else
       {
           $status = false;
       }

       return $status;

    }

    function getReadablePhoneFormat($inputNumber)
    {

       
        // I chose the  valid numbers to start with 256 and 0...I could not use 07 or 2567 because some numbers begin with 039....
        // If it is 256, we split the chuncks immediately ad add a + but if it is 0, we replace the 0 with 256 and then split the chunks....


       if(substr(trim($inputNumber), 0, 3) == "256")
       {
            $newNumber =  chunk_split($inputNumber, 3, ' ');
            return "+".$newNumber;
       }
       else if(substr(trim($inputNumber), 0, 1) == "0")
       {
           $newNumber = ltrim($inputNumber, $inputNumber[0]);
           $newNumber = "256".$newNumber;
           $newNumber = chunk_split($newNumber, 3, ' ');
            return "+".$newNumber;
       }
       else
       {
            return $inputNumber;
       }
    }

    public function isValidPhone(Phone $Phone)
    {
        request()->validate([
            'phoneNumber' => 'required'
        ]);

        $phoneNumber = request('phoneNumber');

        $newObj = new PhoneValidation();

        $status =  $newObj->validatePhone($phoneNumber);
        $code = 200;

        if(!$status)
        {
            $code = 400;
        }

        return response(['phoneStatus' => $status], $code);

    }

    public function formatPhone(Phone $Phone)
    {
        request()->validate([
            'phoneNumber' => 'required'
        ]);

        $phoneNumber = request('phoneNumber');

        $newObj = new PhoneValidation();
        $status = $newObj->validatePhone($phoneNumber);
        $code = 200;

        if(!$status)
        {
            $code = 400;
        }

        if(!$status)
        {
            return response(['phoneStatus' => $status, 'phoneNumber' => $phoneNumber, 'message' => 'Phone Number is invalid'], $code);
        }
        else
        {
            $readableNumber = $newObj->getReadablePhoneFormat($phoneNumber);
            return response(['phoneStatus' => $status, 'phoneNumber' => $readableNumber, 'message' => 'Phone Number is Valid'], $code);
        }


    }

}
