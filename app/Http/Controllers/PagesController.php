<?php namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    public function index(){ //Get all records from users table

		return Pages::orderBy('id','desc')->get();
    }

    public function show($id){ //Get a single record by ID
    	return Pages::find($id);
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
			'paper'=> 'required',
			'image' 	=> 'required',
			'order' 	=> 'required'
		]);
		$page 					= new Pages;
		$page->paper 	    	= $request->input('paper');
		$page->image 			= $request->input('image');
		$page->order 			= $request->input('order');
		$page->save();
		return 'Success On Insertion';
	}

    public function update(Request $request, $id){ //Update a record
    	$this->validate($request, [
			'paper'=> 'required',
			'image' 	=> 'required',
			'order' 	=> 'required'
	    ]);
		$page 					= Pages::find($id);
		$page->paper 	    	= $request->input('paper');
		$page->image 			= $request->input('image');
		$page->order 			= $request->input('order');
		$page->save();
		return "Successfully update this page  #" . $page->id;
	}

    public function destroy(Request $request, $id){ //Delete a record
//    	$this->validate($request, [
//	        'id' => 'required|exists:pages'
//	    ]);
		$page = Pages::find($id);
		$page->delete();
		return "Success deleting this page #".$request->input('id');
    }
}
