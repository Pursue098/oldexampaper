<?php namespace App\Http\Controllers;

use App\Subjects;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;

//use Illuminate\Support\Facades\Hash;

class SubjectsController extends Controller
{
    public function index(){ //Get all records from users table


        Log::info('Showing user profile for user: ', ['context' => 'Other helpful information']);
//        Log::critical('Showing user profile for user: ');
//        Log::alert('Showing user profile for user: ');
		return Subjects::orderBy('name','desc')->get();
    }

	public function insert(Request $request){ //Insert new record to users table
		$this->validate($request, [
			'name' 	=> 'required'
		]);
		$subject 					= new Subjects;
		$subject->name 	    		= $request->input('name');
		$subject->save();
		return 'Success On Insertion';
	}

    public function update(Request $request){ //Update a record
    	$this->validate($request, [
	        'subject-name'	=> 'required',
            'new-name' 	=> 'required'
        ]);
//		$subject 					= Subjects::find($name);
//		$subject->name 				= $request->input('name');
//		$subject->save();

        print_r($request->input('subject-name'));
        print_r($request->input('new-name'));

        Subjects::where('name', $request->input('subject-name'))
            ->update(['name' => $request->input('new-name')]);

//        $table = 'subjects';
//        $contents = DB::table('subjects')
//            ->join('paper', function($join){
//                $join->on("subjects.name", '=', 'paper.subject');
//            })
//            ->whereIn("subjects.name",$name)
//            ->where("subjects.name",$name)
//            ->whereIn("paper.subject",$name)
//            ->update(array(
//                "subjects.name" => $request->input('name'),
//                "paper.subject" => DB::raw($request->input('name'))
//            ));

//        $users = DB::table('subjects')
//            ->join('paper', 'subjects.name', '=', 'paper.subject')
//            ->where("subjects.name", '=', $request->input('old-name'))
//            ->where("subjects.name", '=', 'paper.subject')
//            ->get();
//            ->update(
//                array(
//                "subjects.name" => $request->input('new-name'),
//                "paper.subject" => DB::raw($request->input('new-name'))
//            )
//    );


//        print_r($users);
//        print_r('==================');

        return "Successfully update this subject #";
	}

    public function destroy(Request $request, $id){ //Delete a record
//    	$this->validate($request, [
//	        'id' => 'required|exists:subjects'
//	    ]);
		$subject = Subjects::find($id);
		$subject->delete();
		return "Successfully delete this subject #".$request->input('id');
    }
}
