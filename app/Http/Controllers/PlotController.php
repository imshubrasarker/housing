<?php

namespace App\Http\Controllers;

use App\Plot;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PlotController extends Controller
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
            $plots = Plot::where('plot_size', 'like', '%'.$query.'%')
            ->orWhere('plot_size', 'like', '%'.$query.'%')
            ->orWhere('rate', 'like', '%'.$query.'%')
            ->orWhere('road', 'like', '%'.$query.'%')
            ->orWhere('block', 'like', '%'.$query.'%')
            ->orWhere('face', 'like', '%'.$query.'%')
            ->orWhere('quantity', 'like', '%'.$query.'%')
            ->paginate(20);
        }
        else
        {
            $plots = Plot::paginate(20);
        }
        return view('plot.index', compact('plots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plot.create');
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
            'plot_size' => 'required',
            'rate' => 'required',
            'road' => 'required',
            'block' => 'required',
            'face' => 'required',
            'quantity' => 'required',
        ]);

        $plot = new Plot();
        $plot->plot_size = $request->plot_size;
        $plot->rate = $request->rate;
        $plot->road = $request->road;
        $plot->block = $request->block;
        $plot->face = $request->face;
        $plot->quantity = $request->quantity;
        $plot->save();

        Toastr::success('Plot Created ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function show(Plot $plot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(Plot $plot)
    {
        return view('plot.edit', compact('plot'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plot $plot)
    {
        $request->validate([
            'plot_size' => 'required',
            'rate' => 'required',
            'road' => 'required',
            'block' => 'required',
            'face' => 'required',
            'quantity' => 'required',
        ]);
        $plot->plot_size = $request->plot_size;
        $plot->rate = $request->rate;
        $plot->road = $request->road;
        $plot->block = $request->block;
        $plot->face = $request->face;
        $plot->quantity = $request->quantity;
        $plot->save();

        Toastr::success('Plot Updated ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plot $plot)
    {
        $plot->delete();

        Toastr::success('Plot Updated ! :)' ,'Success');

        return redirect()->back();
    }
}
