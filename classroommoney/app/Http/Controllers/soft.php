<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\payment;
use App\Models\teacher;
use App\Models\student;
use App\Mail\email;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Image;
class soft extends Controller
{
public function index(){
	if (Auth::user()->type=="1") {
	return view("admin.index");
	}else{
		return view("index");
	}
}
public function teachers(){
	return view("admin.teachers");
}
public function veri_teachers(Request $request){
        $search = $request->get("search");
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `school` LIKE '%$search%' OR `phone` LIKE '%$search%') And verify=0 AND type=2";
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
        $status = [];
        foreach ($result as $c => $value) {
        	$result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers= teacher::where([["email","=",$value->email],["phone","=",$value->phone]])->first();
            array_push($status, $teachers);
        }
    return json_encode([$result,[count($total), $page, $limit],$status]);
}
public function veri_success(Request $request){
    $id = $request->get("id");
    $user = User::find($id);
    $user->verify = 1;
    $user->save();
    return "Verified";
}
public function teacher_registered(Request $request){
$name = $request->get("name");
$email = $request->get("email");
$password = $request->get("password");
$phone = $request->get("phone");
$id_number = $request->get("id_number");
$id_proof = $request->get("id_proof");
$school = $request->get("school");
$school_address = $request->get("school_address");
$educational_qualifications = $request->get("educational_qualifications");
$subject = $request->get("subject");


if ($request->hasFile('id_proof')) {
        $r =  $request->file('id_proof')->getPathName();
// Save the image

$path = public_path()."/image/";
$id_proof = time().rand().$request->file('id_proof')->getClientOriginalName();
move_uploaded_file($r, $path."0".$id_proof);
}else{
	return back()->with("message","Your File is not readable");
}

$teacher = new teacher;
$teacher->name = $name;
$teacher->email = $email;
$teacher->password = $password;
$teacher->phone = $phone;
$teacher->id_number = $id_number;
$teacher->id_proof = $id_proof;
$teacher->school = $school;
$teacher->school_address = $school_address;
$teacher->educational_qualifications = $educational_qualifications;
$teacher->subject = $subject;
if($teacher->save()){
	$user = new User;
$user->type=2;
$user->email=$email;
$user->phone=$phone;
$user->school=$school;
$user->name=$name;
$user->verify=0;
$user->password=Hash::make($password);
$user->save();
	return back()->with("success","Hi $name!\nYour account is waiting for verification. Our team will contact you soon.");
}else{
	return back()->with("message","Your account is waiting for verification. Our team will contact you soon.");
}
}




public function student_registered(Request $request){
$name = $this->null($request->get("name"));
$email = $this->null($request->get("email"));
$password = $this->null($request->get("password"));
$phone = $this->null($request->get("phone"));
$id_number = $this->null($request->get("id_number"));
$id_proof = $this->null($request->get("id_proof"));
$gender = $this->null($request->get("gender"));
$birth = $this->null($request->get("birth"));
$city = $this->null($request->get("city"));
$state = $this->null($request->get("state"));
$country = $this->null($request->get("country"));
$address = $this->null($request->get("address"));
$state = $this->null($request->get("state"));
$f_name = $this->null($request->get("f_name"));
$f_phone = $this->null($request->get("f_phone"));
$f_occupation = $this->null($request->get("f_occupation"));
$m_name = $this->null($request->get("m_name"));
$m_phone = $this->null($request->get("m_phone"));
$m_occupation = $this->null($request->get("m_occupation"));


if ($request->hasFile('id_proof')) {
        $r =  $request->file('id_proof')->getPathName();
// Save the image

$path = public_path()."/image/";
$id_proof = time().rand().$request->file('id_proof')->getClientOriginalName();
move_uploaded_file($r, $path."0".$id_proof);
}else{
    $id_proof = '';
}

$student = new student;
$student->name = $name;
$student->email = $email;
$student->password = $password;
$student->phone = $phone;
$student->id_number = $id_number;
$student->id_proof = $id_proof;
$student->f_name = $f_name;
$student->f_phone = $f_phone;
$student->f_occupation = $f_occupation;
$student->photo = '';
$student->m_name = $m_name;
$student->address = $address;
$student->m_occupation = $m_occupation;
$student->section = '';
$student->class = '';
$student->country = $country;
$student->state = $state;
$student->city = $city;
$student->birth = $birth;
$student->gender = $gender;


if($student->save()){
    $user = new User;
$user->type=3;
$user->email=$email;
$user->phone=$phone;
$user->school='';
$user->name=$name;
$user->verify=1;
$user->password=Hash::make($password);
$user->save();
    return back()->with("success","Hi $name!\nYour account created successfuly. Login and choose your teachers to go on!");
}else{
    return back()->with("message","There is an error to create your account. Please try agian.");
}






}


public function null($val){
if (empty($val)) {
    return "";
}else{
    return $val;
    }
}



// public function teacher_registered(Request $request){
// $name = $request->get("name");
// $email = $request->get("email");
// $password = $request->get("password");
// $phone = $request->get("phone");
// $id_number = $request->get("id_number");
// $id_proof = $request->get("id_proof");
// $school = $request->get("school");
// $school_address = $request->get("school_address");
// $educational_qualifications = $request->get("educational_qualifications");
// $subject = $request->get("subject");


// if ($request->hasFile('id_proof')) {
//         $r =  $request->file('id_proof')->getPathName();
// // Save the image

// $path = public_path()."/image/";
// $id_proof = time().rand().$request->file('id_proof')->getClientOriginalName();
// move_uploaded_file($r, $path."0".$id_proof);
// }else{
// 	return back()->with("message","Your File is not readable");
// }

// $teacher = new teacher;
// $teacher->name = $name;
// $teacher->email = $email;
// $teacher->password = $password;
// $teacher->phone = $phone;
// $teacher->id_number = $id_number;
// $teacher->id_proof = $id_proof;
// $teacher->school = $school;
// $teacher->school_address = $school_address;
// $teacher->educational_qualifications = $educational_qualifications;
// $teacher->subject = $subject;
// if($teacher->save()){
// 	$user = new User;
// $user->type=2;
// $user->email=$email;
// $user->phone=$phone;
// $user->school=$school;
// $user->name=$name;
// $user->verify=0;
// $user->password=Hash::make($password);
// $user->save();
// 	return back()->with("success","Hi $name!\nYour account is waiting for verification. Our team will contact you soon.");
// }else{
// 	return back()->with("message","Your account is waiting for verification. Our team will contact you soon.");
// }

//     }
}
