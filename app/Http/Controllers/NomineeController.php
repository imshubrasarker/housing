<?php

namespace App\Http\Controllers;

use App\Member;
use App\Nominee;
use Illuminate\Http\Request;

class NomineeController extends Controller
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
        $members = Member::all();
        return view('nominees.create', compact('members'));
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
            'name' => 'required|string|max:255',
            'hus_father' => 'required|string|max:255',
            'birthday' => 'required|string|max:255',
            'nid' => 'nullable|numeric|min:17',
            'religion' => 'nullable|string|max:255',
            'nationality' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2800',
            'member_id' => 'required|numeric'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominee $nominee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        //
    }
}
