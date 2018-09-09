<?php namespace App\Http\Controllers;

use App\Cities;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class CitiesController extends Controller
{
    public function index(){ //Get all records from users table

		return Cities::orderBy('id','desc')->get();
    }

    public function show($id){ //Get a single record by ID
    	return Cities::find($id);
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
            'name' 	=> 'required',
			'country'=> 'required'
		]);
		$cities 					= new Cities;
		$cities->name 	    		= $request->input('name');
		$cities->country 			= $request->input('country');
		$cities->check 			    = 0;

		$cities->save();
		return 'Success On Insertion';
	}

    public function update(Request $request, $id){ //Update a record
    	$this->validate($request, [
	        'country' 	=> 'required',
	        'name'	=> 'required'
	    ]);
		$cities 					= Cities::find($id);
		$cities->name 				= $request->input('name');
		$cities->country			= $request->input('country');
		$cities->save();
		return "Successfully update this city #" . $cities->id;
	}

    public function destroy(Request $request ,$id){ //Delete a record
//    	$this->validate($request, [
//	        'id' => 'required|exists:cities'
//	    ]);
		$cities = Cities::find($id);
		$cities->delete();
		return "Success deleting this city #".$request->input('id');
    }
}
