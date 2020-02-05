<?php

namespace App\Http\Controllers;

use App\Member;
use App\Nominee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->get('query'))
        {
            $query = $request->get('query');
            $nominees = Nominee::where('name', 'like', '%'.$query.'%')
            ->orWhere('hus_father', 'like', '%'.$query.'%')
            ->orWhere('nid', 'like', '%'.$query.'%')
            ->orWhere('member_id', 'like', '%'.$query.'%')
            ->paginate(20);
        }
        else
        {
            $nominees = Nominee::paginate(20);
        }
        return view('nominees.index', compact('nominees'));
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

        $path = '';
        if ($request->hasFile('picture'))
        {
            $path = Storage::disk('public')->put('nominees', $request->file('picture'));
        }
        $data = [
          'name' => $request->get('name') ,
          'hus_father' => $request->get('hus_father') ,
          'birthday' => $request->get('birthday') ,
          'nid' => $request->get('nid') ,
          'nationality' => $request->get('nationality') ,
          'religion' => $request->get('religion') ,
          'address' => $request->get('address') ,
          'picture' => $path ,
          'member_id' => $request->get('member_id') ,
        ];
        if (Nominee::create($data))
        {
            Toastr::success('Nominee Successfully Created :)' ,'Success');
            return redirect()->back();
        }
        else {
            Toastr::error('Something went wrong!' ,'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        return view('nominees.show', compact('nominee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        $members = Member::all();
        return view('nominees.edit', compact('members', 'nominee'));

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
        $request->validate([
            'name' => 'required|string|max:255',
            'hus_father' => 'required|string|max:255',
            'birthday' => 'required|string|max:255',
            'nid' => 'nullable|numeric|min:17',
            'religion' => 'nullable|string|max:255',
            'nationality' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2800',
            'member_id' => 'required|numeric'
        ]);

        $path = $nominee->picture;
        if ($request->hasFile('picture'))
        {
            $path = Storage::disk('public')->put('nominees', $request->file('picture'));
        }

            $nominee->name = $request->get('name');
            $nominee->hus_father = $request->get('hus_father');
            $nominee->birthday = $request->get('birthday');
            $nominee->nid = $request->get('nid');
            $nominee->nationality = $request->get('nationality');
            $nominee->religion = $request->get('religion');
            $nominee->address = $request->get('address');
            $nominee->picture = $path;
            $nominee->member_id = $request->get('member_id');

        if ($nominee->save())
        {
            Toastr::success('Nominee Updated Successfully :)' ,'Success');
            return redirect()->back();
        }
        else {
            Toastr::error('Something went wrong!' ,'Error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        if ($nominee->delete())
        {
            Toastr::success('Nominee Deleted Successfully :)' ,'Success');
            return redirect()->back();
        }
        else {
            Toastr::error('Something went wrong!' ,'Error');
            return redirect()->back();
        }
    }
}
