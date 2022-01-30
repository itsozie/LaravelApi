<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Transaction::all();

        return view('pages.transaction.index')->with([
            'item' => $item
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $item = Transaction::with('details.product')->findOrFail($id);
        // return view('pages.transaction.show')->with([
        //     'item' => $item
        // ]);
        $transaction = Transaction::query()->where('id',$id)->first();
        /*
        SELECT p.name,p.type,p.price FROM transaction_details as td LEFT JOIN products as p ON p.id = td.products_id
        WHERE transactions_id = 1;;
        */
        $items = TransactionDetail::query()
            ->leftJoin('products as p','p.id','transaction_details.products_id')
            ->select('p.type','p.name','p.price')
            ->where('transaction_details.transactions_id',$id)
            ->get();
        return view('pages.transaction.show',compact('transaction','items'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
