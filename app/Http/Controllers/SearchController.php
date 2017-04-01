<?php
namespace App\Http\Controllers;

use App\DoctorDetails;
use App\Event;
use App\Field;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class SearchController extends Controller

{
    public function getSearhResults(){
        return view('search');
    }

    /**
     * post request for geting name from searchbar and disply doctor on ajax request
     *
     */

    public function postSearch(Request $request)
    {
        $DoctorDetails = array();
        $FurtherDetails=array();
        $EventDetails  = array();
        if($request->ajax()){
           $users=User::where('first_name', 'like', '%'.$request->search.'%')->get();
        }
        foreach ($users as $user){
            if($user->isDoctor()){
                $furtherdetail=DoctorDetails::where('doctor_id',$user->id)->first();
                $eventDetail=Event::where('doctor_id',$user->id)
                             ->where('end_time','>',date('Y-m-d H:i:s'))->first();
                array_push($EventDetails, $eventDetail);
                array_push($FurtherDetails, $furtherdetail);
                array_push($DoctorDetails, $user);
            }
        }
      return View::make('searchresults')->with(['DoctorDetails' => $DoctorDetails, 'FurtherDetails' => $FurtherDetails
          ,'EventDetails' => $EventDetails]);
       //return response()->json($DoctorDetails);
    }

    /**
     * display doctor details on respond to doctor register number
     *
     */

    public function postDoctorEventSheduling(Request $request)
    {
        if($request->ajax()){
            $doctors=DoctorDetails::where('register_nb', 'like', '%'.$request->search.'%')->get();
        }
        foreach ($doctors as $key =>$x){
            $doc=DoctorDetails::where('register_nb',$request->search)->get();
        }
        foreach ($doc as $y){
            $docs=User::where('id', $y->doctor_id)->first( );
        }
        return response()->json($docs);
    }

}