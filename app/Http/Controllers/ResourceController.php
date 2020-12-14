<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tution;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Intrstcourse;
use App\Resource;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $freelancers = Tution::all();
        return view('teachers.tutionstatus', compact('freelancers'));
    }

    public function ResourceDetails() {
       
        $freelancers = Resource::all();
        return view('teachers.resourceslist', compact('freelancers'));
    }

        public function ParentsResource() {
       
        $freelancers = Resource::all();
        return view('parents.p_resource', compact('freelancers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Resource;
        $profile->p_email = $request->input('p_email');
        $profile->p_name = $request->input('p_name');
        $profile->r_topic = $request->input('r_topic');
        $profile->r_link = $request->input('r_link');
        $profile->comment = $request->input('comment');
        $profile->u_id = auth()->user()->id;
        $profile->u_name = auth()->user()->name; 
        $profile->save();

        return redirect('/resourcelist');
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
         $tution = Tution::find($id);
         $user  = User:: all();
        return view('teachers.resources', compact('tution', 'id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
