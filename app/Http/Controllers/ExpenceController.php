<?php

namespace App\Http\Controllers;

use App\Expence;
use App\ExpenceHead;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Expence::sum('amount');
        $expenses = Expence::all();
        return view('expenses.manage-expenses', compact('expenses', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heads = ExpenceHead::get();
        return view('expenses.create',compact('heads'));
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
            'expenses_heads_id' => 'required',
            'date' => 'required',
            'amount' => 'required'
        ]);
        $expense = new Expence();
        $expense->expence_head_id = $request->expenses_heads_id;
        $expense->date = $request->date;
        $expense->description = $request->description;
        $expense->note = $request->note;
        $expense->amount = $request->amount;
        $expense->save();
        Toastr::success('Expense Head Created ! :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function show(Expence $expence)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expence::findOrFail($id);
        $heads = ExpenceHead::all();
        return view('expenses.edit', compact('expense', 'heads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expence $expence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expence $expence)
    {
        //
    }
}
