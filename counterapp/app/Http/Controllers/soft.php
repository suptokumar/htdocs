<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\record;
use URL;
use Auth;
use DB;
use Hash;
class soft extends Controller
{
    public function pxround($number,$max){
            if($number<$max){
                return $number;
            }
            if($number==$max){
                return 1;
            }
            if($number>$max){
                return ($number%$max)+1;
            }
            
        }
    public function get_result(Request $request)
    {
        if (!Auth::check()) {
            return "Login Error. Please Login and Try Again.";
        }
        $time = time();
        $numbersd = $request->get("number");
        $numbers = explode(",", $numbersd);
        $sm = '';
        for ($jc=0; $jc < count($numbers); $jc++) { 
        $number = str_replace(array("A","a","B","b","C","c","D","d","E","e","F","f","G","g","H","h","I","i","J","j","K","k","L","l","M","m","N","n","O","o","P","p","Q","q","R","r","S","s","T","t","U","u","V","v","W","w","X","x","Y","y","Z","z","0"),array("1","1","2","2","3","3","4","4","5","5","6","6","7","7","8","8","9","9","1","1","2","2","3","3","4","4","5","5","6","6","7","7","8","8","9","9","1","1","2","2","3","3","4","4","5","5","6","6","7","7","8","8","8"),$numbers[$jc]);
    //  $number = str_pad($number, 4, '0', STR_PAD_LEFT);
        $numbercopy = $numbers[$jc];
        $last2 = substr($number, -2);
                $i1 = $this->pxround(intval($last2),100);
                $i2 = 0;
                for($i=0; $i<strlen($number); $i++){
                    $i2+=intval($number[$i]);
                }
                $i3 = substr($number, -4)/80;
                $pt1 = $i1;
                $pt3 = $this->pxround(round(($i3-(floor($i3)))*80),81);
                $pt2 =$this->pxround($i2,81);
                // return $pt1." ".$pt2. " ".$pt3;
                // return ;
                $int1 = file_get_contents(URL::to('/resources/json/int1.json'));
                $int1 = json_decode($int1, true);
                $int2 = file_get_contents(URL::to('/resources/json/int2.json'));
                $int2 = json_decode($int2, true);
                $int3 = file_get_contents(URL::to('/resources/json/int3.json'));
                $int3 = json_decode($int3, true);
                $sm .= "<h2 style='text-align: center; font-family: tahoma; font-size: 18px;'>Entered Number: ".$numbercopy."</h2><br><div class='alert alert-success'>Interpretation 1: ".$int1[$pt1]."</div><div class='alert alert-success'>Interpretation 2: ".$int2[$pt2]."</div><div class='alert alert-success'>Interpretation 3: ".$int3[$pt3]."</div><div class='alert alert-primary'>Overall Interpretation: <br>".$int1[$pt1]."<br>".$int2[$pt2]."<br>".$int3[$pt3]."<br></div>";
                $record = new record;
                $record->email = Auth::user()->email;
                $record->user = Auth::user()->role;
                $record->sid = $time;
                $record->category = $request->get("category");
                $record->number = $numbercopy;
                $record->translate = $number;
                $record->int1 = $int1[$pt1];
                $record->int2 = $int2[$pt2];
                $record->int3 = $int3[$pt3];
                $record->result = "<h2 style='text-align: center; font-family: tahoma; font-size: 18px;'>Entered Number: ".$numbercopy."</h2><br><div class='alert alert-success'>Interpretation 1: ".$int1[$pt1]."</div><div class='alert alert-success'>Interpretation 2: ".$int2[$pt2]."</div><div class='alert alert-success'>Interpretation 3: ".$int3[$pt3]."</div><div class='alert alert-primary'>Overall Interpretation: <br>".$int1[$pt1]."<br>".$int2[$pt2]."<br>".$int3[$pt3]."<br></div>";
                $record->save();

        }
                $sm .="<div style='text-align: center;'><button onclick='back()' class='btn btn-info' style='width: 330px;'>Back</button></div>";
                return $sm;


    }
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view("login");
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
    public function register()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view("register");
    }
    public function users()
    {

        return view("users");
    }
    public function records()
    {
        return view("records");
    }
    public function clouds()
    {
        $int1 = file_get_contents('resources/json/int1.json');
        $int2 = file_get_contents('resources/json/int2.json');
        $int3 = file_get_contents('resources/json/int3.json');
        $files = scandir('resources/json/');
        return view("clouds", ["int"=>["int1"=>$int1,"int2"=>$int2,"int3"=>$int3], "files"=>$files]);
    }
    public function filesaver(Request $request)
    {
        if($file = file_put_contents("resources/json/".$request->get("file"), $request->get("text"))){
        return "Saved";
        }else{
        return "Failed to Save";
        }
    }
    public function createuser()
    {

        return view("createuser");
    }
    public function edituser($id)
    {

        if ($user=User::find($id)) {
        return view("edituser",["user"=>$user]);
        }else{
            return back();
        }
    }

    public function forgetpass()
    {
        return view("forgetpass");
    }
    public function createusers(Request $request)
    {
        $user = new User;
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        $user->name = $request->get("name");
        $user->role = $request->get("role");
        if ($user->save()) {
            return back()->with("success","User $user->name Added successfully.");
        }else{
            return back()->with("message","Failed to add the user.");
        }
    }
    public function registers(Request $request)
    {
        $user = new User;
        $user->email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        $user->name = $request->get("username");
        $user->role = "User";
        if ($user->save()) {
            return back()->with("success","Registered successfully. <a href='login'>Login now</a>.");
        }else{
            return back()->with("message","Failed to register.");
        }
    }
    public function deleteuser(Request $request)
    {
        if ($user=User::find($request->get("id"))) {
            $user->delete();
            return "User Deleted successfully!";
        }else{
            return "User not found.";
        }
    }
    public function del(Request $request)
    {
        if ($Record=record::find($request->get("id"))) {
            $Record->delete();
            return "Record Deleted successfully!";
        }else{
            return "Record not found.";
        }
    }
    public function editusers(Request $request)
    {
        $user = User::find($request->get("id"));
        $user->email = $request->get("email");
        $user->name = $request->get("name");
        $user->role = $request->get("role");
        if ($user->save()) {
            return back()->with("success","User $user->name updated successfully.");
        }else{
            return back()->with("message","Failed to update the user.");
        }
    }

    public function userlist(Request $request)
    {

        $search = $request->get("s");
        $type = $request->get("type");
        if ($type=='') {
        $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%')";
        }else{
        $and = "users WHERE (name LIKE '%$search%' OR email LIKE '%$search%') AND role='$type'";
        }

        $page = $request->get("page");
        $limit = 30;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12 END, name ASC;
            ");
        return json_encode([$result,[count($total),$page,$limit]]);
    
    }

    public function recordlist(Request $request)
    {

        $search = $request->get("s");
        $type = $request->get("type");
        if ($type=='') {
        $and = "records WHERE (email LIKE '%$search%' or number LIKE '%$search%')";
        }else{
        $and = "records WHERE (email LIKE '%$search%' or number LIKE '%$search%') AND category='$type'";
        }

        $page = $request->get("page");
        $limit = 30;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE

WHEN number='$search' THEN 0
WHEN email='$search' THEN 0
WHEN number LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN number LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN number LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN number LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN number LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN number LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN number LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN number LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN number LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN number LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN number LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN number LIKE '___________$search%' THEN 12

WHEN email LIKE '___________$search%' THEN 12 END, id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT * FROM " . $and . " ORDER BY CASE

WHEN number='$search' THEN 0
WHEN email='$search' THEN 0
WHEN number LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN number LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN number LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN number LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN number LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN number LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN number LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN number LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN number LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN number LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN number LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN number LIKE '___________$search%' THEN 12

WHEN email LIKE '___________$search%' THEN 12 END, id DESC;
            ");
        return json_encode([$result,[count($total),$page,$limit]]);
    
    }

    public function logined(Request $request)
    {
        $email = $request->get("email");
        $password = $request->get("password");
        $details = [
            "email" => $email,
            "password"=> $password
        ];
        if (Auth::attempt($details,1)) {
            return redirect()->away($request->get("redirect"));
        }else{
            return back()->with("message","Login Failed");
        }
    }
    public function admin(Request $request)
    {
        $total_user = User::count();
        $total_record = record::count();
        $todays_record= count(DB::select("SELECT id FROM records WHERE day(created_at) = '".date("d")."'"));
        $montyly_record= count(DB::select("SELECT id FROM records WHERE month(created_at) = '".date("m")."'"));
        $yearly_record= count(DB::select("SELECT id FROM records WHERE year(created_at) = '".date("Y")."'"));

        $month_record = DB::select("SELECT * FROM records WHERE month(created_at) = '".date("m")."' ORDER BY created_at ASC");
        $data = [];
        $date = [];
        foreach ($month_record as $key => $record) {
            if (in_array( date("Y-m-d",strtotime($record->created_at)), $date)) {
                
            }else{
            array_push($date, date("Y-m-d",strtotime($record->created_at)));
            array_push($data, count(DB::select("SELECT id FROM records WHERE  month(created_at) = '".date("m")."' AND  day(created_at) = '".date("d",strtotime($record->created_at))."'")));
            }
        }

        $category = [];
        $value = [];
        $month_record = DB::select("SELECT * FROM records WHERE month(created_at) = '".date("m")."' ORDER BY created_at ASC");

        foreach ($month_record as $key => $record) {
            if (in_array( $record->category,$category)) {
                
            }else{
            array_push($category, $record->category);
            array_push($value, count(DB::select("SELECT id FROM records WHERE month(created_at) = '".date("m")."' AND category = '".$record->category."'")));
            }
        }


        return view("index",['total_user'=>$total_user,'total_record'=>$total_record,'todays_record'=>$todays_record,'montyly_record'=>$montyly_record,'yearly_record'=>$yearly_record,'data'=>$data,'date'=>$date,'category'=>$category,'value'=>$value]);
    }


    public function robot()
    {
        $record = record::get();
        $i = 0;
        foreach ($record as $key => $value) {
            $i ++;
            $r = record::find($value->id);
            $r->created_at = "2021-06-0".rand(1,4)." ". date("H:i:s");
            $r->updated_at = "2021-06-0".rand(1,4)." ". date("H:i:s");
            $r->save();
        }
        echo $i ;
    }



    public function view_numbers(Request $request)
    {
        $id = $request->get("id");
        $result = record::find($id);
        return $result->result;
    }
}
