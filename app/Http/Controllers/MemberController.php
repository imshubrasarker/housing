<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Member;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {//        if ($request->hasFile('image'))
//        {
//            $logo = $request->file('image');
//            $logo_name = uniqid().'.'.strtolower($logo->getClientOriginalExtension());
//            $path = 'reference/';
//            $logo_url = $path.$logo_name;
//            $logo->move($path,$logo_name);
//        }

        return 1;
        $members = Member::paginate(20);
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        $picture = '';
        if ($request->hasFile('picture'))
        {
            $picture = Storage::disk('public')->put('members', $request->file('picture'));
        }
        $data = [
            'name' => $request->get('name'),
            'hus_father' => $request->get('hus_father'),
            'nationality' => $request->get('nationality'),
            'birthday' => $request->get('birthday'),
            'mother' => $request->get('mother'),
            'profession' => $request->get('profession'),
            'religion' => $request->get('religion'),
            'present_address' => $request->get('present_address'),
            'permanent_address' => $request->get('permanent_address'),
            'mobile' => $request->get('mobile'),
            'email' => $request->get('email'),
            'nid' => $request->get('nid'),
            'picture' => $picture,
        ];
        if (Member::create($data))
        {
            Toastr::success('Member Successfully Created :)' ,'Success');
            return redirect()->back();
        }
        else
        {
            return back()->with('error', 'Something went wrong please try again');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $picture = $member->picture;
        if ($request->hasFile('picture'))
        {
            $picture = Storage::disk('public')->put('members', $request->file('picture'));
        }
        $member->name = $request->get('name');
        $member->hus_father = $request->get('hus_father');
        $member->mother = $request->get('mother');
        $member->birthday = $request->get('birthday');
        $member->nid = $request->get('nid');
        $member->nationality = $request->get('nationality');
        $member->religion = $request->get('religion');
        $member->profession = $request->get('profession');
        $member->email = $request->get('email');
        $member->present_address = $request->get('present_address');
        $member->permanent_address = $request->get('permanent_address');
        $member->mobile = $request->get('mobile');
        $member->picture = $picture;

        if ($member->save())
        {
            Toastr::success('Member updated successfully :)' ,'Success');
            return redirect()->back();
        }
        else
        {
            Toastr::error('Something went wrong :(' ,'Error');
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if ($member->delete())
        {
            Toastr::success('Member deleted successfully :)' ,'Success');
            return redirect()->back();
        }
        else{
            Toastr::error('Something went wrong :(' ,'Error');
            return redirect()->back();
        }
    }
}
