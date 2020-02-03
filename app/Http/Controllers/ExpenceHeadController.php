<?php

namespace App\Http\Controllers;

use App\ExpenceHead;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ExpenceHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('head'))
        {
            $expenses_heads = ExpenceHead::where('id', $request->get('head'))->get();
        }
        else{
            $expenses_heads = ExpenceHead::paginate(10);
        }
        $heads = ExpenceHead::all();
//        $total = Expense::sum('amount');
        return view('expenses.index', compact('expenses_heads', 'heads'));
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
        $request->validate([
            'name' => 'required'
        ]);

        $eh = new ExpenceHead();
        $eh->name = $request->name;
        $eh->slug = Str::slug($request->name, '-');
        $eh->save();
        Toastr::success('Expense Head Created ! :)' ,'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExpenceHead  $expenceHead
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenceHead $expenceHead)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExpenceHead  $expenceHead
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenceHead $expenceHead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExpenceHead  $expenceHead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenceHead $expenceHead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExpenceHead  $expenceHead
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenceHead $expenceHead)
    {
        //
    }
}
