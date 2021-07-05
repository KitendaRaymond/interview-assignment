<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;

class TransactionsApiController extends Controller
{
    public function index()
    {
         $transactions = DB::select('select t.id as RowId, i.first_name as FirstName, i.last_name as LastName,
                                    s.name as Sacco, s.country as Country, CONCAT("UGX ",t.amount) as Amount, t.type as TranType from transactions t 
                                    inner join individuals i on t.individual_id = i.id
                                    inner join saccos s on s.id = i.sacco_id order by t.id desc limit 100');
        return $transactions; 
       // return Transaction::all();
    }

    public function store()
    {
    
        return Transaction::create([
            'amount' => request('amount'),
            'type' => request('type'),
            'individual_id' => request('individual_id'),
        ]);
    }

    public function show($id)
    {
        $sacco = Transaction::with(['individuals' => function ($query) {
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


    public function update(Transaction $transaction)
    {
        request()->validate([

            'amount' => 'required',
            'type' => 'required',
            'id' => 'required'
        ]);
    
        $newamount = request('amount');
        $newtype = request('type');
        $Id = request('id');

      /*  $success = $transaction -> update([
            'title' => request('title'),
            'content' => request('content'),
        ]); */

        $success = DB::update('update transactions set amount = ? where id = ?',[$newamount,$Id]);
    
        return [
    
            'success' => $success
        ];
    }

    public function destroy(Transaction $transaction)
    {
        $success = $transaction->delete();

        return [
            'success'=>$success
        ];
    }

}
