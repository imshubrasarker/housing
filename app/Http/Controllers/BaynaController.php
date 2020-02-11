<?php

namespace App\Http\Controllers;

use App\Bayna;
use App\LandPurchase;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BaynaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('query');
        if ($query)
        {
            $baynas = Bayna::where('donor_name', 'like', '%'.$query.'%')
                ->orWhere('land_volume', 'like', '%'.$query.'%')
                ->orWhere('stain_number', 'like', '%'.$query.'%')
                ->orWhere('ledger', 'like', '%'.$query.'%')
                ->orWhere('shotok_price', 'like', '%'.$query.'%')
                ->orWhere('total_price', 'like', '%'.$query.'%')
                ->orWhere('paid_amount', 'like', '%'.$query.'%')
            ->paginate(20);
        }
        else
        {
            $baynas = Bayna::paginate(20);
        }
        return view('bayna.index', compact('baynas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bayna.create');
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
            'donor_name' => 'required',
            'land_volume' => 'required',
            'stain_number' => 'required',
            'ledger' => 'required',
            'shotok_price' => 'required',
            'total_price' => 'required',
            'paid_amount' => 'required',
        ]);

        $due_amount = $request->total_price - $request->paid_amount;

        $bayna = new Bayna();
        $bayna->donor_name = $request->donor_name;
        $bayna->land_volume = $request->land_volume;
        $bayna->stain_number = $request->stain_number;
        $bayna->ledger = $request->ledger;
        $bayna->shotok_price = $request->shotok_price;
        $bayna->total_price = $request->total_price;
        $bayna->paid_amount = $request->paid_amount;
        $bayna->deu_amount = $due_amount;
        $bayna->save();

        Toastr::success('Bayna Successfully Saved :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bayna  $bayna
     * @return \Illuminate\Http\Response
     */
    public function show(Bayna $bayna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bayna  $bayna
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayna $bayna)
    {
        return view('bayna.edit', compact('bayna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bayna  $bayna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bayna $bayna)
    {
        $request->validate([
            'donor_name' => 'required',
            'land_volume' => 'required',
            'stain_number' => 'required',
            'ledger' => 'required',
            'shotok_price' => 'required',
            'total_price' => 'required',
            'paid_amount' => 'required',
        ]);

        $due_amount = $request->total_price - $request->paid_amount;

        $bayna->donor_name = $request->donor_name;
        $bayna->land_volume = $request->land_volume;
        $bayna->stain_number = $request->stain_number;
        $bayna->ledger = $request->ledger;
        $bayna->shotok_price = $request->shotok_price;
        $bayna->total_price = $request->total_price;
        $bayna->paid_amount = $request->paid_amount;
        $bayna->deu_amount = $due_amount;
        $bayna->save();

        Toastr::success('Bayna Successfully Saved :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bayna  $bayna
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayna $bayna)
    {
        $bayna->delete();

        Toastr::success('Land Purchase Updated :)' ,'Success');

        return redirect()->back();
    }
}
