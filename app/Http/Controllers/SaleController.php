<?php

namespace App\Http\Controllers;

use App\Member;
use App\Plot;
use App\Sale;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::select('serial_id', 'name', 'id')->get();
        $plots = Plot::all();
        return view('sales.create', compact('members', 'plots'));
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
            'member_id' => 'required',
            'plot_id' => 'required',
            'due_amount' => 'required',
            'date' => 'required',
        ]);

        $sale = new Sale();
        $sale->member_id = $request->member_id;
        $sale->plot_id = $request->plot_id;
        $sale->date = $request->date;
        $sale->discount = $request->discount;
        $sale->paid = $request->paid_amount;
        $sale->due_amount = $request->due_amount;
        $sale->installment = $request->installment_number;
        $sale->installment_amount = $request->installment_amount;
        $sale->save();
        Toastr::success('Sales Created ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::findOrFail($id);
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
