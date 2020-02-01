<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Deposit;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::all();
        return view('deposit.index', compact('deposits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = Bank::all();
        return view('deposit.create', compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slip_no' => 'required',
            'bank_id' => 'required',
            'amount' => 'required',
        ]);
        $deposit = new Deposit();
        $deposit->slip_no = $request->slip_no;
        $deposit->bank_id = $request->bank_id;
        $deposit->amount = $request->amount;
        $deposit->save();

        Toastr::success('Deposit Created ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        $banks = Bank::all();
        return view('deposit.edit', compact('banks', 'deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        $request->validate([
            'slip_no' => 'required',
            'bank_id' => 'required',
            'amount' => 'required',
        ]);
        $deposit->slip_no = $request->slip_no;
        $deposit->bank_id = $request->bank_id;
        $deposit->amount = $request->amount;

        $deposit->save();

        Toastr::success('Deposit Updated ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        $deposit->delete();

        Toastr::success('Deposit Updated ! :)' ,'Success');

        return redirect()->back();
    }
}
