<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminpanel_coursepreregistration;
use DB;
use App\Student;
use App\User;
use App\Tution;
use App\Message;
use App\Feedback;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
   
    
   public function teacherdetails(Request $request)
    {
        $teacher = User::all()
                 ->where("role",'teacher');
        return view('admin.allteacher', compact('teacher'));
    }

     public function parentdetails(Request $request)
    {
        $parent = User::all()
                 ->where("role",'parents');
        return view('admin.allparent', compact('parent'));
    }

    public function addteacher() {
       
        $freelancers = User::where(function ($query) {
                        $query->where('role', 'teacher');
                         })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('admin.addteacher', compact('freelancers'));
    }
    
 public function showFreelancers() {
       
        $freelancers = User::where(function ($query) {
                        $query->where('role', 'teacher');
                         })
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        return view('admin.teacherlist', compact('freelancers'));
    }
    
    public function banFreelancer(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->status = '0';
        $user->save();
    }

    public function unbanFreelancer(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->status = '1';
        $user->save();
    }

    public function showTution() {
       
        $freelancers = Tution::all();
        return view('admin.tutionlist', compact('freelancers'));
    }
    
    public function banTution(Request $request) {
        $id = $request->id;
        $user = Tution::find($id);
        $user->status = '0';
        $user->save();
    }

    public function unbanTution(Request $request) {
        $id = $request->id;
        $user = Tution::find($id);
        $user->status = '1';
        $user->save();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index4($id)
    {
         $student = Student::find($id);
        $students = Student::all();
        $message = Message::all();
        return view('admin.showinfo', compact('student', 'id', 'message','students'));
    }
    
    public function show($id)
    {
         $student = Student::find($id);
        $students = Student::all();
        $message = Message::all();
        return view('admin.studentinfo', compact('student', 'id', 'message','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
   public function edit1($id)
    {
         $student = Student::find($id);
         $user  = User:: all();
        return view('admin.edit', compact('student', 'id','user'));
    }
    
    
     
     
    public function edit($id)
    {
         $student = Student::find($id);
         $user  = User:: all();
        return view('admin.view', compact('student', 'id','user'));
    }

    /
    

    
    public function destroy($id)
    {
        //
    }
}
