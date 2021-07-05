<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Sacco;
use DB;

class SaccosApiController extends Controller
{
    public function index()
    {
        $saccos = Sacco::all();

        return response([ 'saccos' => $saccos, 'message' => 'Retrieved successfully'], 200);

    }

    public function store()
    {
    
        $sacco = Sacco::create([
            'name' => request('sacconame'),
            'country' => request('country'),
        ]);

        return response([ 'sacco' => $sacco, 'message' => 'Sacco Registered successfully'], 201);
    }

    public function show($id)
    {
        $sacco = Sacco::with(['individuals' => function ($query) {
          //$query->where('gender', 'Male');
        }])->find($id);
        return $sacco->toJson();

     /*   if (Sacco::where('id', $id)->exists()) 
        {
            $sacco = Sacco::where('id', $id)->get();
            return $sacco->toJson();
        }
        else
        {
            return response()->json([
                "message" => "Sacco not found"
              ], 404);
        } */

        
    }

    public function update(Sacco $sacco)
    {
        request()->validate([

            'name' => 'required',
            'country' => 'required'
        ]);
    
        $newname = request('name');
        $newcountry = request('country');

        $success = $sacco -> update([
            'name' => request('name'),
            'country' => request('country'),
        ]); 

       // $success = DB::update('update transactions set amount = ? where id = ?',[$newamount,$Id]);
    
        return [
    
            'success' => $success
        ];
    }

    public function destroy(Sacco $sacco)
    {
        $success = $sacco->delete();

        return [
            'success'=>$success
        ];
    }
}
