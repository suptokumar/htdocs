<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\payment;
use App\Models\report;
use App\Models\client;
use App\Models\requestd;
use App\Mail\email;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Image;
class mainct extends Controller
{
    
    public function login(){
    	if (Auth::check()) {
            return redirect('/');
        
    }
		return view("login",["active"=>"login"]);
    }
    
    
    public function logined(Request $request){
    	if (Auth::check()) {
            return redirect('/');
        }else{
            $this->validate($request,[
                'login'=>'required',
                'pass'=>'required|alphaNum|min:4'
            ]);

            

                $user_details2 = [
                'phone'=>$request->get("login"),
                'password'=>$request->get("pass")
            ];
            if (Auth::attempt($user_details2, true)) {
                    if(Auth::user()->verify==0){
                        Auth::logout();
                        return back()->with('error','You are not varified. Please wait our concern team will contact you soon.');
                    }
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }else{
            $user_details2s = [
                'name'=>$request->get("login"),
                'password'=>$request->get("pass")
            ];
                if (Auth::attempt($user_details2s, true)) {
                     if(Auth::user()->verify==0){
                        Auth::logout();
                        return back()->with('error','You are not varified. Please wait our concern team will contact you soon.');
                    }
                if ($request->get("redirect")=='') {

                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
        }
            }
            return back()->with('error','Wrong Login Details.');
            
    }
    }
    public function create_client(){
        return view("create_client");
    }
    public function create_clients(Request $request){
        $client = new client;
        $client->name = $this->null_pointer($request->get("name"));
        $client->payment = $this->null_pointer($request->get("payment"));
        $client->email = $this->null_pointer($request->get("email"));
        $client->phone = $this->null_pointer($request->get("phone"));
        $client->hours = 0;
        $client->invoice_number = '';
        $client->payment_plan = $this->null_pointer($request->get("payment_plan"));
        $client->payment_usd = '';
        $client->last_payment_date = '';
        $client->rate = $this->null_pointer($request->get("rate"));
        $client->last_paid = '1111-11-11';
        $client->child = 1;
        $key = time().rand(1,100);
        $client->key = $key;
        if ($client->save()) {
            if (Auth::user()->type==2) {
            $me = User::find(Auth::id());
            $me->gurdain_id = $key;
            $me->save();
            return redirect("/student/settings")->with("new_client",__("You created a new client info. Your client id $key."));
            }else{
            return back()->with("new_client",__("You created a new client info. Your client id $key."));
            }
        }
    }

    public function update_client(Request $request){
        $client = client::find($this->null_pointer($request->get("id")));
        $client->name = $this->null_pointer($request->get("name"));
        $client->payment = $this->null_pointer($request->get("payment"));
        $client->email = $this->null_pointer($request->get("email"));
        $client->phone = $this->null_pointer($request->get("phone"));
        $client->hours = $this->null_pointer($request->get("hours"));
        $client->invoice_number = $this->null_pointer($request->get("invoice_number"));
        $client->payment_plan = $this->null_pointer($request->get("payment_plan"));
        $client->payment_usd = $this->null_pointer($request->get("payment_usd"));
        $client->last_payment_date = $this->null_pointer($request->get("last_payment_date"));
        $client->rate = $this->null_pointer($request->get("rate"));
        $client->last_paid = $this->null_pointer($request->get("last_payment_date"));
        if($client->save()){
            return back()->with("success",__("Successfuly Edited."));
        }else{
            return back()->with("message",__("Failed to Edit."));
        }
    }
    public function details($id){
        if ($user = User::find($id)) {
            if ($user->type==2) {
                $course = course::where("s_id","=",$user->id)->get();
                $his_subjects = [];
                $his_clients = [];
                foreach ($course as $key => $value) {
                    if (!in_array($value->subject,$his_subjects)) {
                        array_push($his_subjects, $value->subject);
                    }
                    if (!in_array($value->teacher,$his_subjects)) {
                        array_push($his_clients, $value->teacher);
                    }
                }
                $pre_m = (intval(date("m"))==1?12:intval(date("m"))-1);
                $pre_y = (intval(date("Y"))-1);
                $y = date("Y");
                $m = date("m");
                $report = DB::select("SELECT * FROM `reports` WHERE s_id='".$user->id."' AND month(`starting`)='$pre_m' AND year(`starting`)='$pre_y'");
                $report2 = DB::select("SELECT * FROM `reports` WHERE s_id='".$user->id."' AND month(`starting`)='$m' AND year(`starting`)='$y'");
                foreach ($report2 as $key => $value) {
                $report2[$key]->client = User::find($report2[$key]->t_id)->name;
            }
            foreach ($report as $key => $value) {
                $report[$key]->client = User::find($report[$key]->t_id)->name;
            }

            }else if ($user->type==1) {
                $course = course::where("t_id","=",$user->id)->get();
                $his_subjects = [];
                $his_clients = [];
                foreach ($course as $key => $value) {
                    if (!in_array($value->subject,$his_subjects)) {
                        array_push($his_subjects, $value->subject);
                    }
                    if (!in_array($value->student,$his_subjects)) {
                        array_push($his_clients, $value->teacher);
                    }
                }
                $pre_m = (intval(date("m"))==1?12:intval(date("m"))-1);
                $pre_y = (intval(date("Y"))-1);
                $y = date("Y");
                $m = date("m");
                $report = DB::select("SELECT * FROM `reports` WHERE `t_id`='".$user->id."' AND month(`starting`)='$pre_m' AND year(`starting`)='$pre_y'");
                $report2 = DB::select("SELECT * FROM `reports` WHERE `t_id`='".$user->id."' AND month(`starting`)='$m' AND year(`starting`)='$y'");
                foreach ($report2 as $key => $value) {
                $report2[$key]->client = User::find($report2[$key]->s_id)->name;
            }
            foreach ($report as $key => $value) {
                $report[$key]->client = User::find($report[$key]->s_id)->name;
            }
            }else{
                $his_subjects = [];
                $his_clients = [];
                $report = [];
                $report2 = [];
            }
            
return view("user_details",["user"=> $user,"subjects"=> $his_subjects,"clients"=>$his_clients,"report"=>$report,"report2"=>$report2]);
        }else{
            return back();
        }
    }
    public function logout(){
    	if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }else{
        return back();
        }
    }
    
    public function student_register(){
		return view("student_register",["active"=>"register"]);
    	
    }
    public function teacher_register(){
        return view("teacher_register",["active"=>"register"]);
        
    }
    
    public function registered(Request $request){
    	$name = $request->get("name");
    	$email = $request->get("email");
    	$phone = $request->get("phone");
    	$password = $request->get("password");
    	$type = $request->get("type");
        $timezone = $request->get("timezone");
        $country = $request->get("country");
    	$this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'password'=>'required|alphaNum|min:4',
            'timezone'=>'required|min:4',
        ]);
$pre_user = User::where("email","=",$email)->count();
if ($pre_user!=0) {
	return back()->with("message",__('The email is already in.'));
}

$pre_users = User::where("phone","=",$phone)->count();
if ($pre_users!=0) {
	return back()->with("message",__('The phone number is already in.'));
}


    	$user = new User;

    	$user->name = $name;
    	$user->image =  '';
        $user->graduation =  '';
    	$user->phone =  $phone;
    	$user->password= Hash::make($password);
    	$user->type = $type;
    	$user->email = $email;
    	$user->key = 0;
$user->address1 = '';
$user->country = $country;
$user->timezone = $timezone;
$user->gurdain_id = '';
$user->status = '';
$user->reg_evalu = '';
$user->evalu = '';
$user->available_time = '';
$user->hours = '';
$user->education = '';
$user->national_id = '';
$user->national_id_front = '';
$user->national_id_back = '';
$user->cv = '';
$user->bio = '';
$user->calender_link = '';
$user->image = '';
$user->zoom_link = '';
$user->gender = '';
$user->dateofbirth='2020-04-22';
$user->available_time = 0;
    	if ($user->save()) {
            if ($request->refil==1) {
            return back()->with("success",$name.__("'s Account Created Successfuly."));
            }else{

    		return redirect("/login")->with("message",__("Your Account Created Successfuly."));
            }
    	}else{
    		return back()->with("message",__("Failed to create $name 's account."));
    	}
    }










    public function update(Request $request){
        $id = $request->get("id");
        $name = $this->null_pointer($request->get("name"));
        $address1 = $this->null_pointer($request->get("address1"));
        $country = $request->get("country");
        $timezone = $request->get("timezone");
        $user = User::find($id);

        $user->name = $name;
$user->address1 = $address1;
$user->country = $country;
$user->timezone = $timezone;
        $dateofbirth = $request->get("dateofbirth");
$user->dateofbirth=$dateofbirth;
if (Auth::user()->type==2) {
$gurdain_id = $this->null_pointer($request->get("gurdain_id"));
$search_gur = client::where("key","=",$gurdain_id)->count();
if ($search_gur!=0 OR $gurdain_id=='') {
$user->gurdain_id = $gurdain_id;
}else{
    return back()->with("message",__("Your Client not found."));
}
$user->status=$this->null_pointer($request->get("status"));
$user->evalu=$this->null_pointer($request->get("evalu"));
$user->reg_evalu=$this->null_pointer($request->get("reg_evalu"));
$national_id_back = '';
$user->national_id = '';
$user->national_id_front = '';
$user->national_id_back = '';
$user->cv = '';
$user->bio = '';
$user->calender_link = '';
$user->zoom_link ='';
$user->gender = '';
$user->education = '';
$user->graduation = '';



}else{
$education = $this->null_pointer($request->get("education"));
$national_id = $this->null_pointer($request->get("national_id"));
$bio = $this->null_pointer($request->get("bio"));
$calender_link = $this->null_pointer($request->get("calender_link"));
$zoom_link = $this->null_pointer($request->get("zoom_link"));
$gender = $this->null_pointer($request->get("gender"));
$graduation = $this->null_pointer($request->get("graduation"));
$national_id_front = '';
$national_id_back = '';
$cv = '';


if ($request->hasFile('national_id_front')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('national_id_front')->getPathName()));
// Save the image

$path = public_path()."/image/";
$national_id_front = time().rand().".webp";
imagewebp($r, $path."0".$national_id_front);
}else{
    $national_id_front = $user->national_id_front;

}


if ($request->hasFile('national_id_back')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('national_id_back')->getPathName()));
// Save the image

$path = public_path()."/image/";
$national_id_back = time().rand().".webp";
imagewebp($r, $path."0".$national_id_back);
}else{
    $national_id_back = $user->national_id_back;
}


if ($request->hasFile('cv')) {
        $r =  $request->file('cv')->getPathName();
// Save the image

$path = public_path()."/image/";
$cv = time().rand().$request->file('cv')->getClientOriginalName();
move_uploaded_file($r, $path."0".$cv);
}else{
    $cv = $user->cv;
}






$user->national_id = $national_id;
$user->national_id_front = $national_id_front;
$user->national_id_back = $national_id_back;
$user->cv = $cv;
$user->bio = $bio;
$user->calender_link = $calender_link;
$user->gurdain_id = '';
$user->graduation = $graduation;
$user->zoom_link = $zoom_link;
$user->gender = $gender;
$user->education = $education;
$user->available_time = ($this->null_pointer($request->get("available_time"))==''?0:$this->null_pointer($request->get("available_time")));


}
$user->hours = $user->hours;
$image = '';
if ($request->hasFile('image')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('image')->getPathName()));
// Save the image
$path = public_path()."/image/";
$image = time().rand().".webp";
imagewebp($r, $path."0".$image);
}else{
    $image = $user->image;
}




$user->image = $image;
        if ($user->save()) {
            return back()->with("success",__("Your account updated successfuly."));
        }else{
            return back()->with("message",__("Failed to update your account."));
        }
    }









    public function create(Request $request){
        $type = $request->get("type");
        $name = $this->null_pointer($request->get("name"));
        $email = $this->null_pointer($request->get("email"));
        $phone = $this->null_pointer($request->get("phone"));
        $password = $this->null_pointer($request->get("password"));
        $address1 = $this->null_pointer($request->get("address1"));
        $country = $request->get("country");
        $timezone = $request->get("timezone");
        $user = new User;

        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->password = Hash::make($password);
$user->address1 = $address1;
$user->country = $country;
$user->timezone = $timezone;
$user->type = $type;
$user->key = 0;
        $dateofbirth = $request->get("dateofbirth");
$user->dateofbirth=$dateofbirth;
if ($type==2) {
$user->available_time = 0;

$gurdain_id = $this->null_pointer($request->get("gurdain_id"));
$search_gur = client::where("key","=",$gurdain_id)->count();
if ($search_gur!=0 OR $gurdain_id=='') {
$user->gurdain_id = $gurdain_id;
}else{
    return back()->with("message",__("Your Client not found."));
}
$user->status=$this->null_pointer($request->get("status"));
$user->evalu=$this->null_pointer($request->get("evalu"));
$user->reg_evalu=$this->null_pointer($request->get("reg_evalu"));

$national_id_back = '';
$user->national_id = '';
$user->national_id_front = '';
$user->national_id_back = '';
$user->cv = '';
$user->bio = '';
$user->calender_link = '';
$user->zoom_link ='';
$user->gender = '';
$user->education = '';
$user->education = '';
        $user->graduation =  '';



}else{
$education = $this->null_pointer($request->get("education"));
$national_id = $this->null_pointer($request->get("national_id"));
$bio = $this->null_pointer($request->get("bio"));
$calender_link = $this->null_pointer($request->get("calender_link"));
$zoom_link = $this->null_pointer($request->get("zoom_link"));
$gender = $this->null_pointer($request->get("gender"));
$user->graduation =  $this->null_pointer($request->get("graduation"));
$national_id_front = '';
$national_id_back = '';
$cv = '';
$user->status='';
$user->evalu='';
$user->reg_evalu='';


if ($request->hasFile('national_id_front')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('national_id_front')->getPathName()));
// Save the image

$path = public_path()."/image/";
$national_id_front = time().rand().".webp";
imagewebp($r, $path."0".$national_id_front);
}else{
    $national_id_front = '';

}


if ($request->hasFile('national_id_back')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('national_id_back')->getPathName()));
// Save the image

$path = public_path()."/image/";
$national_id_back = time().rand().".webp";
imagewebp($r, $path."0".$national_id_back);
}else{
    $national_id_back = '';
}


if ($request->hasFile('cv')) {
        $r =  $request->file('cv')->getPathName();
// Save the image

$path = public_path()."/image/";
$cv = time().rand().$request->file('cv')->getClientOriginalName();
move_uploaded_file($r, $path."0".$cv);
}else{
    $cv = '';
}






$user->national_id = $national_id;
$user->national_id_front = $national_id_front;
$user->national_id_back = $national_id_back;
$user->cv = $cv;
$user->bio = $bio;
$user->calender_link = $calender_link;
$user->gurdain_id = '';
$user->zoom_link = $zoom_link;
$user->gender = $gender;
$user->education = $education;
$user->available_time = ($this->null_pointer($request->get("available_time"))==''?0:$this->null_pointer($request->get("available_time")));


}
$user->hours = Auth::user()->hours;
$image = '';
if ($request->hasFile('image')) {
        $r =  imagecreatefromstring(file_get_contents($request->file('image')->getPathName()));
// Save the image
$path = public_path()."/image/";
$image = time().rand().".webp";
imagewebp($r, $path."0".$image);
}




$user->image = $image;
        if ($user->save()) {
            return back()->with("success",__("Account Created successfuly."));
        }else{
            return back()->with("message",__("Failed to update your account."));
        }
    }






public function upload(Request $request){

$data = $request->get("as");
    if ($report = report::find($data)) {
    if (Auth::user()->type != 3) {
    if ($report->s_id != Auth::id()) {
        return back()->with("Permission errors!");
    }
    }


if ($request->hasFile('assignment')) {
        $r =  $request->file('assignment')->getPathName();
// Save the image

$path = public_path()."/image/";
$assignment = time().rand().$request->file('assignment')->getClientOriginalName();
move_uploaded_file($r, $path.$assignment);

$report->assignment = $assignment;
$report->save();
return back()->with("success","Successfuly Uploaded Assignment");
}else{
    return back()->with("message","No attached File Found.");
}





    }else{
        return back()->with("message","Failed to transfer data.");
    }
}


public function upload_note(Request $request){

$data = $request->get("as");
    if ($report = report::find($data)) {
    if (Auth::user()->type != 3) {
    if ($report->t_id != Auth::id()) {
        return back()->with("Permission errors!");
    }
    }


if ($request->get('assignment')) {
// Save the image
$assignment = $request->get('assignment');
$report->notes = $assignment;
$report->save();
$user = User::find($report->t_id);
$user->hours = intval($user->hours)+intval($report->duration);
$user->save();
return back()->with("success","Successfuly Created Progress Note");
}else{
    return back()->with("message","No change found or empty note.");
}





    }else{
        return back()->with("message","Failed to transfer data.");
    }
}








    public function users(){
        return view("admin.users");
    }
    public function null_pointer($val){
if (empty($val)) {
    return "";
}else{
    return $val;
    }
}









// functions for the admin

    function user_list(Request $request){
        $search = $request->get("search");
        $order = $request->get("order");
        $and = '';
        if ($order == 0) {
            $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%') AND type!=3";
        }
        if ($order==1) {
            $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%') AND type=2";
        }
        if ($order==2) {
            $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%') AND type=1";
        }
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }




// functions for the admin

    function student_list(Request $request){
        $search = $request->get("search");
        $order = $request->get("order");
        $and = '';
        if ($order == 0) {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND type!=3";
        }
        if ($order==1) {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND type=2";
        }
        if ($order==2) {
            $and = "users WHERE (name LIKE '%$search%' OR country LIKE '%$search%') AND type=1";
        }
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }






// functions for the admin to manage class

    function get_classes(Request $request){
        $search = $request->get("search");
        $and = "courses WHERE (title LIKE '%$search%' OR ras LIKE '%$search%' OR subject LIKE '%$search%' OR teacher LIKE '%$search%' OR student LIKE '%$search%')";
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY title ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY title ASC;
            ");
        $starting_time = [];
        $status = [];
        $utc = [];
        foreach ($result as $key => $value) {
            $result[$key]->repeat = substr($value->repeat, 1);
            date_default_timezone_set($value->timezone);



        $a1 = date("Y-m-d", strtotime(empty($value->lastclass)?$value->starting:$value->lastclass));
        $a2 = date("H:i:s", strtotime($value->starting));
        $a3 = strtotime($a1." ".$a2);

        $lst_c = $a3 + 86400;
        $class_limit = 4;
        $upcoming_class = '';
        $upcoming_class2 = [];
        $repeat = explode(",",$value->repeat);
        while (true) {
            if ($class_limit==0) {
                break;
            }
        $next_class = date("l",$lst_c);
            if(in_array($next_class, $repeat)){
                $class_limit--;
                date_default_timezone_set(Auth::user()->timezone);
               array_push($upcoming_class2, $lst_c-time());
               if ($lst_c-time() < (3600*24*3)) {
                $upcoming_class .= "<span style='border: 1px solid green; padding: 3px; display: block;'>".date("D, Y-m-d h:ia", $lst_c)."</span>";
                   
               }else if ($lst_c-time() < (3600*24*2)) {
                $upcoming_class .= "<span style='border: 1px solid red; padding: 3px; display: block;'>".date("D, Y-m-d h:ia", $lst_c)."</span>";
                   
               }else{
                $upcoming_class .= date("D, Y-m-d h:ia", $lst_c)."<br>";
               }
             date_default_timezone_set($value->timezone);
                $lst_c += 86400;
                continue;
            }else{
                $lst_c += 86400;
                $next_class = date("l",$lst_c);
            }
        }        
            array_push($utc, $upcoming_class);
    





















            $pre_v = strtotime($value->starting);
            $result[$key]->guest = substr($value->guest, 1);
            date_default_timezone_set(Auth::user()->timezone);

            array_push($starting_time, [date("Y-m-d h:ia", $pre_v), date_default_timezone_get()]);
            if ($value->repeat=='' && strtotime($value->starting)==strtotime($value->lastclass)) {
            array_push($status, "Finished");
            }else{
            array_push($status, "Open");
            }



        }
    return json_encode([$result,[count($total), $page, $limit],$starting_time,$status,$utc]);
    }



// functions for the admin to get client
function editclient($id){
    if ($client = client::find($id)) {
        return view("admin.client_edit",["client"=>$client]);
    }else{
        return back();
    }
}
    function get_clients(Request $request){
        $search = $request->get("search");
        $and = "clients WHERE (`key` LIKE '%$search%' OR `name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `phone` LIKE '%$search%')";
        

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
            $childs= User::where("gurdain_id","=",$value->key)->get();
            $mg = '';
            foreach ($childs as $child) {
                $mg.=",".$child->email;
            }
            $mg = substr($mg, 1);
            $last_paid = payment::where("user","=",$value->key)->orderBy("id","DESC")->first();
            if ($last_paid) {
                $date = $last_paid->date;
            }else{
                $date = "Not Yet Paid.";
            }
            array_push($status, [$mg,$date]);
        }
    return json_encode([$result,[count($total), $page, $limit],$status]);
    }





// functions for the admin

  public  function notifications(Request $request){
        $search = $request->get("search");
        if (Auth::user()->type==3) {
            $role = "Admin";
        }else{

            $role = Auth::user()->id;
        }
        $and = "notifications WHERE user='".$role."' AND content LIKE '%$search%'";
        

        // $page = 1;
        $page = $request->get("page");
        $limit = 20;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");

        foreach ($result as $key => $value) {
            $noti = notification::find($value->id);
            $noti->read=1;
            $noti->save();
        }
    return json_encode([$result,[count($total), $page, $limit]]);
    }

public function delete_noti(Request $request){
$noti = notification::find($request->get("id"));
$noti->delete();
return 0;
}

public function manage_class(){
return view("admin.manage_class");
}

public function block(Request $request){
    $id =  $request->get("id");

    $user = User::find($id);

    if ($user->key==0) {
        $user->key=1;
        $user->save();
        return "Unblock";
    }else{
        $user->key=0;
        $user->save();
        return "Block";
    }
}




public function settings(){
    return view("settings");
}




public function add_class(){
    return view("admin.add_class");
}









    function user_get(Request $request){
        $search = $request->get("s");
        $type = $request->get("type");
            $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%') AND type='$type'";
        
        $page = 1;
        $limit = 25;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN phone LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
    return json_encode($result);
    }




public function add_classes(Request $request){
    $title = $request->get("title");
    $link = $request->get("link");
    $subject = $request->get("subject");
    $duration = $request->get("duration");
    $description = $request->get("description");
    $timezone = $request->get("timezone");
    $time = $request->get("time");
    $date = $request->get("date");
    $teacher = $request->get("teacher");
    $student = $request->get("student");
    $guest = $request->get("guest");
    $repeat = $request->get("repeat");
    if (empty($guest)) {
        $guest = "";
    }
    if (empty($repeat)) {
        $repeat = "";
    }
    date_default_timezone_set($timezone);
    $data = array(
        "title" => $title,
        "link" => $link,
        "duration" => $duration,
        "description" => $description,
        "time" => $time,
        "date" => $date,
        "timezone" => $timezone,
        "teacher" => $teacher,
        "student" => $student,
        "guest" => $guest,
        "admin" => Auth::user()->name,
        "repeat" => $repeat );

    // Mail::to($student)->send(New email($data));
    // Mail::to($teacher)->send(New email($data));

$course = new course;
$course->title= $title;
$course->link= $link;
$course->subject= $subject;
$course->duration= $duration;
$course->description= $description;
$course->timezone= $timezone;
$course->starting= date("Y-m-d H:i:s",strtotime($date." ".$time.":00"));
$course->student= $student;
$course->teacher= $teacher;
$course->title= $title;
$g1 = "";
$g2 = "";
$ras = time().rand();
if ($guest!="") {
    $gu = explode(",", $guest);
    foreach ($gu as $key => $g) {
    $data = array(
        "title" => $title,
        "link" => $link,
        "duration" => $duration,
        "description" => $description,
        "time" => $time,
        "date" => $date,
        "timezone" => $timezone,
        "teacher" => $teacher,
        "student" => $student,
        "guest" => $guest,
        "accept" => "http://localhost/school/accept/$ras/".$key,
        "admin" => Auth::user()->name,
        "repeat" => $repeat );

       $g1.=",".$g; 
       $g2.=",0"; 
    // Mail::to($g)->send(New email($data));
    }
}
$course->guest=$g1;
$course->guest_active= $g2;
$m1 = User::where("email","=",$teacher)->get();
$m2 = User::where("email","=",$student)->get();
$course->t_id= $m1[0]->id;
$course->s_id= $m2[0]->id;
$course->ras= $ras;
$course->repeat= $repeat;
if ($course->save()) {
    $doe= strtotime($date." ".$time.":00");
    date_default_timezone_set($m2[0]->timezone);
    $dt = date("Y-m-d H:i:s",$doe);
$date = date("Y-m-d", $doe);
$time = date("h:ia", $doe);
    $content = "<b>".Auth::user()->name."</b> added a class for you. <br> <b>".$title."</b><br>"."<p>$description</p><br> Class Duration: $duration <br>Class Link: <a href='$link'>$link</a> <br>Class Starting at: $date <br>Class Time: $time <br>Repeat:".($repeat=='' ? "No Repeat" : substr($repeat,1))." <br>guests: ".($guest=='' ? "No Guests" : $guest)." <br>Assigned Teacher: ".$m1[0]->name."<br>Students name: ".$m2[0]->name;


    $this->send($m1[0]->id, $content);
    $this->send($m2[0]->id, $content);
    $this->send("Admin", $content);
    return "Successfuly Added Class";
}
}
public static function send($user, $content){
     $notification = new notification;
    $notification->user =$user;
    $notification->content = $content;
    if ($user!="Admin") {
    date_default_timezone_set(User::find($user)->timezone);
    }else{
    date_default_timezone_set(Auth::user()->timezone);
    }
    $notification->time = date("Y-m-d h:ia");
    $notification->read = 0;
    $notification->save();
    return;
}

public function delete_class(Request $request){
    $id = $request->get("id");
    $class = course::find($id);
    $this->send("Admin",$class->title." was deleted by ". Auth::user()->name);
    $this->send($class->t_id,$class->title." was deleted by ". Auth::user()->name);
    $this->send($class->s_id,$class->title." was deleted by ". Auth::user()->name);
    $class->delete();
    return;
}
public function payment(){
    return view("admin.payment");
}
public function notification(){
    return view("admin.notification");
}

public function accept($class, $index){
    if ($classes = course::where("ras","=",$class)->first()) {
        $handle = $classes->guest_active;
        $handles = $classes->guest;
        $handle =  explode(",", substr($handle, 1));
        $handles =  explode(",", substr($handles, 1));
        $handle[$index] = 1;
        $data = ",".implode(",", $handle);
        $classes->guest_active=$data;
        if ($classes->save()) {
            $this->send($classes->t_id,$handles[$index]." has accepted the guest request for ". $classes->title);
            $this->send($classes->s_id,$handles[$index]." has accepted the guest request for ". $classes->title);
            $this->send("Admin",$handles[$index]." has accepted the guest request for ". $classes->title);
    $msg = __("Thank you for accepting the guest Request.");   
        }else{

    $msg = __("Sorry failed to proccess the request.");   
        }
    }else{
    $msg = __("Sorry failed to find the class.");   
    }
    return view("accept_class",["msg"=>$msg]);
}

}
