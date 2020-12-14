<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Intrstcourse;

class DashboardController extends Controller
{
        public function index()
    {
        return view('index');
    }

     public function teacherdetails(Request $request)
    {

        $search = $request->input('search');

            if($request->has('search') && $search != null) {
            $intcourse = Intrstcourse::where('course_name', 'like', '%'.$search.'%')
            ->orWhere('course_name', 'like', '%'.$search.'%')
            ->orderby('created_at', 'desc')
            ->paginate(100)
            ->appends([
                'search' => request('search')
            ]);

            $teacher = Teacher::all();
        }
        else
        {
            $intcourse = Intrstcourse::all();
             $teacher = Teacher::all();
        }
 
        return view('pages.teacherlist', compact('teacher','intcourse','search'));
    }
}
