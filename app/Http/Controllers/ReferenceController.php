<?php

namespace App\Http\Controllers;

use App\Reference;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $references = Reference::all();
        return view('reference.index', compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'profession' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'mobile' => 'required',
            'religion' => 'required',
            'image' => 'required',
        ]);

        $picture = '';
        if ($request->hasFile('image'))
        {
            $picture = Storage::disk('public')->put('members', $request->file('image'));
        }

        $reference = new Reference();

        $reference->name = $request->name;
        $reference->father_name = $request->father_name;
        $reference->mother_name = $request->mother_name;
        $reference->nid = $request->nid;
        $reference->dob = $request->dob;
        $reference->email = $request->email;
        $reference->profession = $request->profession;
        $reference->permanent_address = $request->permanent_address;
        $reference->present_address = $request->present_address;
        $reference->mobile = $request->mobile;
        $reference->religion = $request->religion;
        $reference->image = $picture;

        $reference->save();

        Toastr::success('Reference Created ! :)' ,'Success');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        return view('reference.show', compact('reference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        return view('reference.edit', compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'nid' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'profession' => 'required',
            'present_address' => 'required',
            'permanent_address' => 'required',
            'mobile' => 'required',
            'religion' => 'required'
        ]);

        $picture = $reference->image;
        if ($request->hasFile('image'))
        {
            $picture = Storage::disk('public')->put('members', $request->file('image'));
        }
        $reference->name = $request->name;
        $reference->father_name = $request->father_name;
        $reference->mother_name = $request->mother_name;
        $reference->nid = $request->nid;
        $reference->dob = $request->dob;
        $reference->email = $request->email;
        $reference->profession = $request->profession;
        $reference->permanent_address = $request->permanent_address;
        $reference->present_address = $request->present_address;
        $reference->mobile = $request->mobile;
        $reference->religion = $request->religion;
        $reference->image = $picture;
        $reference->save();

        Toastr::success('Reference Updated ! :)' ,'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        $reference->delete();

        Toastr::success('Reference Updated ! :)' ,'Success');

        return redirect()->back();
    }
}
