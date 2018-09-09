<?php namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use App\Http\Requests;

//use Illuminate\Support\Facades\Hash;

class CountryController extends Controller
{
    public function index(){ //Get all records from users table

//		$results = app('db')->select("SELECT SUBSTRING(name,1,1) as init,
//            GROUP_CONCAT(name) as name
//	        FROM countries GROUP BY init");
//		return DB::select("SELECT * FROM countries");
//
//		print_r($results);exit;
//		return view('country.index', ['country' => $results]);

		return Country::orderBy('id','desc')->get();
//
//		return $results;
    }
    public function show($id){ //Get a single record by ID
    	return Country::find($id);
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
			'countryCode'=> 'required',
			'name' 	=> 'required'
		]);
		$country 					= new Country;
		$country->countryCode 		= $request->input('countryCode');
		$country->name 	    		= $request->input('name');
		$country->save();
		return 'Success On Signup';
	}

    public function update(Request $request, $id){ //Update a record
    	$this->validate($request, [
	        'countryCode' 	=> 'required',
	        'name'	=> 'required'
	    ]);
		$country 					= Country::find($id);
		$country->countryCode 		= $request->input('countryCode');
		$country->name 				= $request->input('name');
		$country->save();
		return "Sucess updating this country #" . $country->id;
	}

    public function destroy(Request $request){ //Delete a record
    	$this->validate($request, [
	        'id' => 'required|exists:countries'
	    ]);
		$country = Country::find($request->input('id'));
		$country->delete();
		return "Success deleting this country #".$request->input('id');
    }
}
