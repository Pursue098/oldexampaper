<?php namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class PaperController extends Controller
{
    public function index(){ //Get all records from users table

		return Paper::orderBy('id','desc')->get();
    }

    public function show($id){ //Get a single record by ID
    	return Paper::find($id);
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
			'institute'=> 'required',
			'class' 	=> 'required',
			'subject' 	=> 'required',
		]);
		$paper 					    = new Paper;
		$paper->institute 	    	= $request->input('institute');
		$paper->class 			    = $request->input('class');
		$paper->subject 			= $request->input('subject');
		$paper->save();
		return 'Success On Insertion';
	}

    public function update(Request $request, $id){ //Update a record
    	$this->validate($request, [
			'institute'=> 'required',
			'class' 	=> 'required',
			'subject' 	=> 'required',
        ]);
		$paper 					    = Paper::find($id);
		$paper->institute 	    	= $request->input('institute');
		$paper->class 			    = $request->input('class');
		$paper->subject 			= $request->input('subject');
		$paper->save();
		return "Successfully update this page  #" . $paper->id;
	}

    public function destroy(Request $request, $id){ //Delete a record
//    	$this->validate($request, [
//	        'id' => 'required|exists:Paper'
//	    ]);
		$paper = Paper::find($id);
		$paper->delete();
		return "Success deleting this page #".$request->input('id');
    }
}
