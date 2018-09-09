<?php namespace App\Http\Controllers;

use App\Institute;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class InstituteController extends Controller
{
    public function index(){ //Get all records from users table

		return Institute::orderBy('id','desc')->get();
    }

    public function show($id){ //Get a single record by ID
    	return Institute::find($id);
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
			'name'=> 'required',
			'category' 	=> 'required',
			'county'=> 'required',
			'state' 	=> 'required',
			'city'=> 'required'
		]);
		$institute 					    = new Institute;
		$institute->name 	    		= $request->input('name');
		$institute->category 			= $request->input('category');
		$institute->county 	    		= $request->input('county');
		$institute->state 				= $request->input('state');
		$institute->city 	    		= $request->input('city');
		$institute->check 	    		= 0;
		$institute->save();
		return 'Success On Insertion';
	}

    public function update(Request $request, $id){ //Update a record
    	$this->validate($request, [
			'name'=> 'required',
			'category' 	=> 'required',
	    ]);
		$institute 						= Institute::find($id);
		$institute->name 	    		= $request->input('name');
		$institute->category 			= $request->input('category');
		$institute->county 	    		= $request->input('county');
		$institute->state 				= $request->input('state');
		$institute->city 	    		= $request->input('city');
		$institute->save();
		return "Successfully update this institute record #" . $institute->id;
	}

    public function destroy(Request $request, $id){ //Delete a record
//    	$this->validate($request, [
//	        'id' => 'required|exists:institutes'
//	    ]);

        $institute = Institute::find($id)->delete();
        print_r($institute);

        return "Success deleting this institute from DB #".$request->input('id');
    }
}
