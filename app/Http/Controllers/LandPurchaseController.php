<?php

namespace App\Http\Controllers;

use App\LandPurchase;
use Illuminate\Http\Request;

class LandPurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function show(LandPurchase $landPurchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(LandPurchase $landPurchase)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LandPurchase  $landPurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandPurchase $landPurchase)
    {
        //
    }
}
