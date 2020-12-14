<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tution;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Intrstcourse;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
   {
        $this->middleware('auth');
    }
    
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
        $apt = new Tution;
        $apt->t_name = $request->input('t_name');
        $apt->t_phone = $request->input('t_phone');
        $apt->t_email = $request->input('t_email');
        $apt->class = $request->input('class');
        $apt->subject = $request->input('subject');
        $apt->p_name = $request->input('p_name');
        $apt->p_phone = $request->input('p_phone');
        $apt->p_email = $request->input('p_email');
        $apt->address = $request->input('address');
        $apt->t_status = $request->input('t_status');
        $apt->user_id = auth()->user()->id;  
        $apt->save();

        return redirect('/bookinginfo');
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
        $teacher = Teacher::find($id);
        $intcourse = Intrstcourse::find($id);
         $user  = User:: all();
        return view('parents.book', compact('teacher', 'id','intcourse','user'));
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
