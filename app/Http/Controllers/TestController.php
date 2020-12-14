<?php
namespace App\Http\Controllers;

use App\Tution;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {   
    	$category = Tution::all();
    	return view('home',compact('category'));
    }

    public function update($id)
    {
    	$category = Tution::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }

    public function edit(Request $request, $id)
    {
      Tution::updateOrCreate(
       [
        'id' => $id
       ],
       [
        'name' => $request->name,
       ]
      );

      return response()->json([ 'success' => true ]);

    }
}