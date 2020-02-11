<?php

namespace App\Http\Controllers;

use App\LandPurchase;
use App\Plot;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class LandPurchaseController extends Controller
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
            $landPurchases = LandPurchase::where('donor_name', 'like', '%'.$query.'%')
                ->orWhere('land_volume', 'like', '%'.$query.'%')
                ->orWhere('stain_number', 'like', '%'.$query.'%')
                ->orWhere('ledger', 'like', '%'.$query.'%')
                ->orWhere('shotok_price', 'like', '%'.$query.'%')
                ->orWhere('total_price', 'like', '%'.$query.'%')
                ->orWhere('paid_amount', 'like', '%'.$query.'%')
                ->orWhere('deu_amount', 'like', '%'.$query.'%')
                ->paginate(20);
        }
        else
        {
            $landPurchases = LandPurchase::paginate(20);
        }
        return view('land-purchase.index', compact('landPurchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('land-purchase.create');
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
            'due_amount' => 'required',
        ]);

        $land_purchase = new LandPurchase();
        $land_purchase->donor_name = $request->donor_name;
        $land_purchase->land_volume = $request->land_volume;
        $land_purchase->stain_number = $request->stain_number;
        $land_purchase->ledger = $request->ledger;
        $land_purchase->shotok_price = $request->shotok_price;
        $land_purchase->total_price = $request->total_price;
        $land_purchase->paid_amount = $request->paid_amount;
        $land_purchase->deu_amount = $request->due_amount;
        $land_purchase->save();

        Toastr::success('Category Successfully Saved :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(LandPurchase $landPurchase)
    {
        return $landPurchase;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(LandPurchase $landPurchase)
    {
        return view('land-purchase.edit', compact('landPurchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LandPurchase $landPurchase)
    {
        $request->validate([
            'donor_name' => 'required',
            'land_volume' => 'required',
            'stain_number' => 'required',
            'ledger' => 'required',
            'shotok_price' => 'required',
            'total_price' => 'required',
            'paid_amount' => 'required',
            'due_amount' => 'required',
        ]);

        $landPurchase->donor_name = $request->donor_name;
        $landPurchase->land_volume = $request->land_volume;
        $landPurchase->stain_number = $request->stain_number;
        $landPurchase->ledger = $request->ledger;
        $landPurchase->shotok_price = $request->shotok_price;
        $landPurchase->total_price = $request->total_price;
        $landPurchase->paid_amount = $request->paid_amount;
        $landPurchase->deu_amount = $request->due_amount;
        $landPurchase->save();

        Toastr::success('Land Purchase Updated :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandPurchase $landPurchase)
    {
        $landPurchase->delete();

        Toastr::success('Land Purchase Updated :)' ,'Success');

        return redirect()->back();
    }
}
