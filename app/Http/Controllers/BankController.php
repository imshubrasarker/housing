<?php

namespace App\Http\Controllers;

use App\Bank;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();
        return view('bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.create');
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
            'name' => 'required',
            'ac_number' => 'required',
        ]);

        $bank = new Bank();
        $bank->name = $request->name;
        $bank->ac_number = $request->ac_number;
        $bank->save();

        Toastr::success('Bank Created :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'name' => 'required',
            'ac_number' => 'required',
        ]);

        $bank->name = $request->name;
        $bank->ac_number = $request->ac_number;
        $bank->save();

        Toastr::success('Bank Updated :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        Toastr::success('Bank Deleted :)' ,'Success');

        return redirect()->back();
    }
}
