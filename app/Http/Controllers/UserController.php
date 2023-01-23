<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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
        $users = User::orderBy('id','desc')->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $roles = Role::orderBy('id','desc')->paginate(10);
        return view('users.create', compact('roles'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'entry_date' => 'required',
            'date_of_birth' => 'required',
        ]);
        
        User::create($request->post());

        return redirect()->route('users.index')->with('success','User has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\User  $user
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'entry_date' => 'required',
            'date_of_birth' => 'required',
        ]);
        
        $user->fill($request->post())->save();

        return redirect()->route('users.index')->with('success','User Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\User  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success','User has been deleted successfully');
    }
}
