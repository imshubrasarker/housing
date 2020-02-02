<?php

namespace App\Http\Controllers;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'password' => 'required|string|min:6',
            'role' => 'required',
            'email' => 'required|email'
        ]);
        $data = [
            'name' => $request->get('name'),
            'password' => bcrypt($request->get('password')),
            'role' => $request->get('role'),
            'email' => $request->get('email'),
        ];
        if (User::create($data))
        {
            Toastr::success('User Successfully Created :)' ,'Success');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->get('password'))
        {
            $user->password = bcrypt($request->get('password'));
        }
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->name = $request->get('name');

        if ($user->save())
        {
            Toastr::success('User Successfully Updated :)' ,'Success');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->id == Auth::id())
        {
            Toastr::error('The user cannot be deleted as you are logged in using this user.' ,'Error');
            return redirect()->back();
        }
             if ($user->delete())
             {
                 Toastr::success('User Successfully Deleted :)' ,'Success');
                 return redirect()->back();
             }
             else {
                 Toastr::error('Something went wrong!' ,'Error');
                 return redirect()->back();
             }
    }
}
