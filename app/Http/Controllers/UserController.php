<?php
namespace App\Http\Controllers;

use App\DoctorDetails;
use App\Event;
use App\Field;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use DateTime;

class UserController extends Controller
{
    /**
     *  get admin dashboard
     */
    public function getAdminDashboard(){
        return view('admin.dashboard');
    }


    /**
     * log into user account all patient/doctor/admin
     *
     */
    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            $user = Auth::User();
            if($user->isAdmin()){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('welcome')->with('fail', 'Login Failed!');
            }
        }
        else{
            return redirect()->route('welcome')->with('fail', 'Login Failed!');
        }
    }

    /**
     * get doctor register form to admin dashboard
     */
    public function getDoctorRegisterForm(){
        $fields=Field::all();
        return view('admin.registerdoctor',['fields' => $fields,'user'=>Auth::user()]);
    }


    /**
     * add specific field to doctors
     * 
     */
    public function postAddField(Request $request)
    {
        $this->validate($request, [
            'field' => 'required|unique:fields'
        ]);
        $country = new Field();
        $country->field = $request['field'];
        if( $country->save()){
            return response()->json(['messege' => $country->field], 200);
        }
        return redirect()->route('dashboard');
    }


    /**
     * register doctors by taking necessary details
     * 
     */
    public function postRegisterDoctor(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|max:30|unique:users',
            'last_name' => 'required|max:30|unique:users',
            'email' => 'required|max:30|unique:users',
            'password' => 'required|max:30',
            'phone_number' => 'required|max:30|unique:doctor_details',
            'street' => 'required|max:30',
            'city' => 'required|max:30',
            'register_nb' => 'required|max:30|unique:doctor_details',
            'mbbs_uni' => 'required|max:30',
            'notes' => 'required|max:300',
            'gender' => 'required',
            'date' => 'required|date'
        ]);
        $doctor= new User();
        $doctor->first_name= $request['first_name'];
        $doctor->last_name= $request['last_name'];
        $doctor->email= $request['email'];
        $doctor->password= bcrypt($request['password']);
        $doctor->save();
        $doctor->roles()->attach(Role::where('name', 'Doctor')->first());

        $doctordetail = new DoctorDetails();
        $doctordetail->doctor_id=$doctor->id;
        $doctordetail->phone_number= $request['phone_number'];
        $doctordetail->street= $request['street'];
        $doctordetail->city= $request['city'];
        $doctordetail->website= $request['website'];
        $doctordetail->register_nb= $request['register_nb'];
        $doctordetail->mbbs_uni= $request['mbbs_uni'];
        $doctordetail->phd_uni= $request['phduniversity'];
        $doctordetail->field=Input::get('field');
        $doctordetail->notes= $request['notes'];
        $doctordetail->gender=Input::get('gender');
        $doctordetail->date= $request['date'];
        $doctordetail->save();
        
        return redirect()->route('dashboard');
    }
   
}