<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // only get the users with userType id 1 or 3
        $mentors = User::where('user_type_id', 1)->orWhere('user_type_id', 3)->get();

        return view('mentors.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // send departments to the view
        $departments = Department::all();
        $roles = Role::all();
        return view('mentors.create', compact('departments', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_type_id' => 3]);
        $request->request->add(['password' => bcrypt('password')]);
        User::create($request->all());

        $msg = "New Mentor Created successful! ";
        return redirect('mentors')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mentor = User::find($id);
        $departments = Department::all();
        $roles = Role::all();
        return view('mentors.edit', compact('mentor', 'departments', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mentor = User::find($id);
        $mentor->update($request->all());

        $msg = "Mentor Updated successful! ";
        return redirect('mentors')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = User::find($id);
        $mentor->delete();

        $msg = "Mentor Deleted successful! ";
        return redirect('mentors')->with('msg', $msg);
    }
}
