<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tution;
use App\Teacher;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Intrstcourse;

class TeacherController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     if(Auth()->user()->status == 0) {
            return redirect('/waiting')->with('error', 'Unauthorize Page');
        }
        else{
              return view('teachers.index');
        } 
      
    }

     public function TutionDetails() {
       
        $freelancers = Tution::all();
        return view('teachers.tutionstatus', compact('freelancers'));
    }


    public function Progress(Request $request) {
        $id = $request->id;
        $user = Tution::find($id);
        $user->t_status  = 'progress';
        $user->save();
    }

    public function Complete(Request $request) {
        $id = $request->id;
        $user = Tution::find($id);
        $user->t_status  = 'complete';
        $user->save();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('teachers.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profile = new Teacher;
        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        $profile->experience = $request->input('experience');
        $profile->user_id = auth()->user()->id; 
         if($request->hasfile('images')) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalName(); //getting image extension
            $filename =$extension;
            $file->move('uploads/teacher/', $filename);
            $profile->images = $filename;

        }      
        $profile->save();

        return redirect('/teacher');
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
        $user = DB::table('teachers')->where('user_id', $id)->first();
        return view('teachers.viewprofile', compact('user'));
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
