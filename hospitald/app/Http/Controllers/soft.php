<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\imagetest;
use App\Models\pathology;
use App\Models\service;
use App\Models\test;
use App\Models\testpayment;
use App\Models\emargency;
use App\Models\apoinment;
use App\Models\addpayment;
use App\Models\admission;
use App\Models\room;
use App\Models\adtest;
use App\Models\expense;
use App\Models\User;
use DB;
use Hash;
use Auth;
class soft extends Controller
{
    public function menu(){
    	if (Auth::check()) {
    		return view("menu");
    	}else{
    		return redirect("login");
    	}
    }
    public function reports(){
        if (Auth::check()) {
            $testee = service::get();
            $User = User::get();
            $t1 = 0;
            $s1 = 0;
            $t12 = 0;
            $s12 = 0;
            $t31 = 0;
            $s31 = 0;



$apoinment = apoinment::where("past","=","")->get();
foreach ($apoinment as $key => $value) {
    $t1+= intval($value->total);
    $s1+= intval($value->paid);
}


$expense = expense::get();
foreach ($expense as $key => $value) {
    $t1-= intval($value->amount);
    $s1-= intval($value->amount);
}



$test = test::get();
foreach ($test as $key => $value) {
    $t1+= intval($value->test_total);
    $s1+= intval($value->test_paid);
}


$test = adtest::get();
foreach ($test as $key => $value) {
if ($value->date!='') {
$em_id = $value->em_id;
if($ad = admission::find($em_id)){

if ($ad->discharge==1) {
$day = floor((strtotime($ad->updated_at)-strtotime($value->date))/86400)+1;
}else{
$day = floor((time()-strtotime($value->date))/86400)+1;
}
}else{
    $day = 1;
}
$t1+= $value->test_total*$day;
}else{
$t1+= intval($value->test_total);
}

    $s1+= intval($value->test_paid);
}










            return view("reports",['test'=>$testee,'user'=>$User,'t1'=>$t1,'s'=>$s1]);
        }else{
            return redirect("login");
        }
    }
    public function login(){
    	if (!Auth::check()) {
            $admin = User::where("role","=","Admin")->get();
    		return view("login",['admin'=>$admin]);
    	}else{
    		return redirect("/");
    	}
    }
    public function logout(){
    	if (!Auth::check()) {
    		return redirect("/login");
    	}else{
    		Auth::logout();
    		return redirect("/");
    	}
    }
    public function apptoken($id){
        if($app = apoinment::find($id)){
            return view("apptoken",["app"=>$app]);
        }else{
            return back();
        }

    }
    public function apppay(Request $req){
        if($app = apoinment::find($req->get("id"))){
            $app->past = date("Y-m-d h:i:s");
            $app->save();
            return "success";
        }else{
            return back();
        }

    }
    public function apppay2(Request $req){
        if($app = apoinment::where([["con_id",'=',$req->get("date")],["date",'=',$req->get("doctor")]])->get()){
            foreach ($app as $a => $appis) {
                if ($appis->past=='' && intval($appis->total-$appis->paid)==0) {
                    $g = apoinment::find($appis->id);
            $g->past = date("Y-m-d h:i:s");
            $g->save();
                }
            }
            return $app;
        }else{
            return back();
        }

    }
    public function tests($user){
        if($users = emargency::find($user)){
            $tests = service::get();
            return view("test",["user"=>$users,"tests"=>$tests]);
        }else{
            return back();
        }
    }
    public function accountsedit($user){
        if($users = User::find($user)){
            return view("accounts",["doctor"=>$users]);
        }else{
            return back();
        }
    }
    public function expensedit($user){
        if($users = expense::find($user)){
            return view("expense",["doctor"=>$users]);
        }else{
            return back();
        }
    }
    public function accounts(){
            return view("accounts");

    }
    public function memo1($user){
        if($tests = test::find($user)){
            $users = emargency::find($tests->em_id);
            return view("ememo",["user"=>$users,"tests"=>$tests]);
        }else{
            return back();
        }
    }
    public function em_memo($user){
        if($users = emargency::find($user)){
            $tests = test::where("em_id","=",$users->id)->get();
            return view("ememod4",["user"=>$users,"testst"=>$tests]);
        }else{
            return back();
        }
    }
    public function memo2($user){
        if($tests = adtest::find($user)){
            $users = admission::find($tests->em_id);
            $test = explode('```', $tests->test_name);
            $amount = explode(',', $tests->test_amount);
            foreach ($test as $key => $tst) {
                if ($tests->date!='') {
                    $day = floor((time()-strtotime($tests->date))/86400)+1;
                    
                    $am =  intval($amount[$key])*$day;
            $tests->test_amount=",".$am;
            $tests->test_total = $am;
                }
            }
            return view("ememo2",["user"=>$users,"tests"=>$tests]);
        }else{
            return back();
        }
    }

    public function memo3($user){
        if($users = admission::find($user)){
            $testsa = adtest::where("em_id","=",$users->id)->get();
            // foreach ($testsa as $key => $tests) {
            // $test = explode('```', $tests->test_name);
            // $amount = explode(',', $tests->test_amount);
            // foreach ($test as $key => $tst) {
            //     if ($tests->date!='') {
            //         $day = floor((time()-strtotime($tests->date))/86400)+1;
                    
            //         $am =  intval($amount[$key])*$day;
            // $tests->test_amount=",".$am;
            // $tests->test_total = $am;
            //     }
            // }
            // }
            return view("ememo3",["user"=>$users,"tests"=>$testsa]);
        }else{
            return back();
        }
    }
    public function admtests($user){
        if($users = admission::find($user)){
            $tests = service::get();
            return view("admtest",["user"=>$users,"tests"=>$tests]);
        }else{
            return back();
        }
    }
    public function load_token(Request $request){
        $doctor = $request->get("doctor");
        $date = $request->get("date");
        $find = doctor::find($doctor);
        $new = apoinment::where([['con_id','=',$doctor],['date','=',$date]])->get();
        $token = 1;
        foreach ($new as $a => $e) {
            if ($e->token>=$token) {
                $token = ($e->token)+1;
            }
        }
        return json_encode([$token,$find->fees]);
    }
    public function doctor(){
    	return view("doctor");
    }
    public function collect($user){
        if($users =  emargency::find($user)){

        $sql = DB::select("SELECT * FROM tests WHERE em_id='$user'");
        $count1 = 0;
        foreach ($sql as $s) {
            $v = explode(",", $s->test_amount);
            $count1+= count($v);
        }
        $total = DB::select("SELECT total FROM testpayments WHERE em_id='$user'");
        $paid = DB::select("SELECT paid FROM testpayments WHERE em_id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            $t+=intval($value->total);
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->paid);
        }

        return view("collect",["total"=>$t,"paid"=>$p,"user"=>$users]);
        }else{
            return back();
        }
    }

    public function appcollect($user){
        if($users =  apoinment::find($user)){
        $total = DB::select("SELECT total FROM apoinments WHERE id='$user'");
        $paid = DB::select("SELECT paid FROM apoinments WHERE id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            $t+=$value->total;
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->paid);
        }
        $doctors = doctor::get();
        return view("appcollect",["total"=>$t,"doc"=>$doctors,"paid"=>$p,"user"=>$users,"id"=>$user]);
        }else{
            return back();
        }
    }

    public function admissioncollect($user){
        if($users =  admission::find($user)){
        $total = DB::select("SELECT test_total,date FROM adtests WHERE em_id='$user'");
        $paid = DB::select("SELECT test_paid FROM adtests WHERE em_id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            if ($value->date!='') {
                $day = floor((time()-strtotime($value->date))/86400)+1;
                $t+=intval($value->test_total) * $day;
            }else{
            $t+=intval($value->test_total);
            }
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->test_paid);
        }
        $doctors = doctor::get();
        return view("addcollect",["total"=>$t,"doc"=>$doctors,"paid"=>$p,"user"=>$users,"id"=>$user]);
        }else{
            return back();
        }
    }

    public function admissiondischarge($user){
        if($users =  admission::find($user)){
        $total = DB::select("SELECT test_total,date FROM adtests WHERE em_id='$user'");
        $paid = DB::select("SELECT test_paid FROM adtests WHERE em_id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            if ($value->date!='') {
                $day = floor((time()-strtotime($value->date))/86400)+1;
                $t+=intval($value->test_total) * $day;
            }else{
            $t+=intval($value->test_total);
            }
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->test_paid);
        }
        $doctors = doctor::get();
        return view("adddischarged",["total"=>$t,"doc"=>$doctors,"paid"=>$p,"user"=>$users,"id"=>$user]);
        }else{
            return back();
        }
    }

    public function appcollected(Request $request){
        $user = $request->get("id");
        $app = $request->get("app");
        $total = $request->get("total");
        $p = intval($request->get("paid"));

        $appo  = apoinment::find($app);
        $appo->paid = intval($appo->paid)+$p;
        $appo->save();
        return back()->with("success","Collected succcessful.");
    }


    public function discharge(Request $request){
        $user = $request->get("id");
        $appo  = admission::find($user);
        $appo->discharge = 1;
        $room_id = $appo->room_id;
        $appo->save();

        $room = room::find($room_id);
        $room->book = '';
        $room->save();
        return back()->with("success","Discharged succcessful.");
    }

    public function test(){
        return view("test");
    }
    public function imagetest(){
        return view("imagetest");
    }
    public function expense(){
        return view("expense");
    }
    public function pathology(){
        return view("pathology");
    }
    public function service(){
        return view("service");
    }
    public function emargency(){   
    $doctor = doctor::get();

        return view("emargency",["doc"=>$doctor]);
    }
    public function appoinment(){   
    $doctor = doctor::get();

        return view("apoinment",["doc"=>$doctor]);
    }
    public function admission(){   
    $doctor = doctor::get();
    $room = room::where('book','=','')->get();

        return view("admission",["doc"=>$doctor,"room"=>$room]);
    }
    public function collected(Request $request){
        $user = $request->get("id");
        $total = intval($request->get("total"));
       

        $p = intval($request->get("paid"));
        $p = intval($request->get("paid"));
        $paid = intval($request->get("paid"));
        $duet = test::where([["test_total","<","test_paid"],["em_id","=",$user]])->get();
        foreach ($duet as $key => $dues) {
            $due = intval($dues->test_total)-intval($dues->test_paid);
            if ($due>$paid OR $due==$paid) {
                $test = test::find($dues->id);
                $test->test_paid = ( intval($test->test_paid)+$paid);
                $test->save();               
                break;
            }else{
                $test = test::find($dues->id);
                $test->test_paid = intval($test->test_total);
                $test->save();
                $paid=($paid)-($due);
            }
        }


         $testpayment = new testpayment;
                $testpayment->em_id=$user;
                $testpayment->adder=Auth::user()->name;
                $testpayment->total= 0;
                $testpayment->paid=$p;
                $testpayment->save();


        $total = DB::select("SELECT total FROM testpayments WHERE em_id='$user'");
        $paid = DB::select("SELECT paid FROM testpayments WHERE em_id='$user'");
        $t = 0;
        $ps = 0;
        foreach ($total as $key => $value) {
            $t+=$value->total;
        }
        foreach ($paid as $key => $value) {
            $ps+=$value->paid;
        }

        $f = ($t-$ps);

        if($request->get("fullpayment")=='on'){
            $duet = test::where([["test_total","<","test_discount"],["em_id","=",$user]])->get();
        foreach ($duet as $key => $dues) {
            $due = intval($dues->test_total)-intval($dues->test_paid);
            if ($due>$f OR $due==$f) {
                $test = test::find($dues->id);
                $test->test_discount = ( intval($test->test_discount)+$f);
                $test->test_total = ( intval($test->test_total)-$f);
                $test->save();    
                break;
            }else{
                $test = test::find($dues->id);
                $test->test_discount = $due;
                $test->test_total = intval($test->test_paid);
                $test->save();
                $f=($f)-($due);
            }
        }

        $testpayment = new testpayment;
                $testpayment->em_id=$user;
                $testpayment->adder=Auth::user()->name;
                $testpayment->total= -$f;
                $testpayment->paid=0;
                $testpayment->save();



                return back()->with("success", "Collected Money $p Taka. discount $f Taka.");

       }
                return back()->with("success", "Collected Money $p Taka. Now due $f Taka");
    }
    public function admissioncollected(Request $request){
        $user = $request->get("id");
        $total = $request->get("total");
        $p = $request->get("paid");
        $paid = $request->get("paid");
        $duet = adtest::where("em_id", "=", $user)->get();
        foreach ($duet as $key => $dues) {
            if ($dues->date=='') {
            $due = ($dues->test_total)-($dues->test_paid);
            }else{
            $day = floor((time()-strtotime($dues->date))/86400)+1;
                $t=intval($dues->test_total) * $day;
                $due = $t -intval($dues->test_paid);
            }
            if ($due>$paid OR $due==$paid) {
                $test = adtest::find($dues->id);
                $test->test_paid = (intval($test->test_paid)+$paid);
                $test->save();               
                break;
            }else{
                $test = adtest::find($dues->id);
                if ($dues->date=='') {
                $test->test_paid = intval($test->test_total);
            }else{
            $day = floor((time()-strtotime($dues->date))/86400)+1;
                $t=$dues->test_total * $day;
                $test->test_paid = $t;
           }


                $test->save();
                $paid=($paid)-($due);
            }
        }
         $testpayment = new addpayment;
                $testpayment->em_id=$user;
                $testpayment->adder=Auth::user()->name;
                $testpayment->total= 0;
                $testpayment->room_register= 0;
                $testpayment->date= '';
                $testpayment->paid=$p;
                $testpayment->save();

        $total = DB::select("SELECT total,room_register,date FROM addpayments WHERE em_id='$user'");
        $paid = DB::select("SELECT paid FROM addpayments WHERE em_id='$user'");
        $t = 0;
        $ps = 0;
        foreach ($total as $key => $value) {
            if ($value->room_register!=0) {
                $day = floor((time()-strtotime($value->date))/86400)+1;
                $t+=intval($value->total) * $day;
            }else{
            $t+=intval($value->total);
            }
        }
        foreach ($paid as $key => $value) {
            $ps+=intval($value->paid);
        }

        $f = ($t-$ps);
                return back()->with("success", "Collected Money $p Taka. Now due $f Taka");
    }
    public function testsadd(Request $request){
        if (empty($request->get("names"))) {
            return back()->with("message","No tests selected!");
        }
        $em_id = $request->get("em_id");
        $name = $request->get("names");
        $discount = $request->get("discount");
        $paid = $request->get("paid");
        $rates = $request->get("rates");
        $due = $request->get("due");
        $total = $request->get("total");
        $test = new test;
        $test->em_id = $em_id;
        $test->adder = Auth::user()->name;
        $test->test_name = $name;
        $test->test_discount = $discount;
        $test->test_paid = intval($paid);
        $test->test_amount = $rates;
        $test->test_total = intval($total);
        $test->test_time = date("D, M d, Y h:i a");
        if($test->save()){
            $testpayment = new testpayment;
            $testpayment->total = intval($total);
            $testpayment->paid = intval($paid);
            $testpayment->em_id = $em_id;
            $testpayment->adder = Auth::user()->name;
            $testpayment->save();
            return back()->with("success","New Test Added");
        }else{
            return back()->with("message","Failed to add Tests");
        }
    }
    public function adtestsadd(Request $request){
        if (empty($request->get("names"))) {
            return back()->with("message","No tests selected!");
        }
        $em_id = $request->get("em_id");
        $name = $request->get("names");
        $discount = $request->get("discount");
        $paid = $request->get("paid");
        $rates = $request->get("rates");
        $due = $request->get("due");
        $total = $request->get("total");
        $test = new adtest;
        $test->em_id = $em_id;
        $test->adder = Auth::user()->name;
        $test->test_name = $name;
        $test->test_discount = $discount;
        $test->test_paid = intval($paid);
        $test->test_amount = $rates;
        $test->test_total = intval($total);
        $test->date = '';
        $test->test_time = date("D, M d, Y h:i a");
        if($test->save()){
            $testpayment = new addpayment;
            $testpayment->total = intval($total);
            $testpayment->paid = intval($paid);
            $testpayment->em_id = $em_id;
            $testpayment->room_register = 0;
            $testpayment->date = '';
            $testpayment->adder = Auth::user()->name;
            $testpayment->save();
            return back()->with("success","New Test Added");
        }else{
            return back()->with("message","Failed to add Tests");
        }
    }
    public function doctoredit($id){
        $doctor = doctor::find($id);
        return view("doctor",['doctor'=>$doctor]);
    }
    public function emargencyedit($id){
        $doctor = emargency::find($id);
        $doctors = doctor::get();
        return view("emargency",['doctor'=>$doctor,'doc'=>$doctors]);
    }
    public function appoinmentedit($id){
        $doctor = apoinment::find($id);
        $doctors = doctor::get();
        return view("apoinment",['doctor'=>$doctor,'doc'=>$doctors]);
    }
    public function admissionedit($id){
        $doctor = admission::find($id);
        $doctors = doctor::get();
        $room = room::get();
        return view("admission",['doctor'=>$doctor,'doc'=>$doctors,'room'=>$room]);
    }
    public function serviceedit($id){
        $doctor = service::find($id);
        return view("service",['doctor'=>$doctor]);
    }
    public function imageedit($id){
        $doctor = imagetest::find($id);
        return view("imagetest",['doctor'=>$doctor]);
    }
    public function pathologyedit($id){
        $doctor = room::find($id);
        return view("pathology",['doctor'=>$doctor]);
    }
    public function delete_doctor(Request $request){
        $doctor = doctor::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_account(Request $request){
        $doctor = User::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_expense(Request $request){
        $doctor = expense::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_app(Request $request){
        $doctor = apoinment::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_admission(Request $request){
        $doctor = admission::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_imagetest(Request $request){
        $doctor = imagetest::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_emergency(Request $request){
        $doctor = emargency::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_pathology(Request $request){
        $doctor = room::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }
    public function delete_service(Request $request){
        $doctor = service::find($request->get("id"));
        $doctor->delete();
        return "deleted";
    }

    public function logined(Request $request){
    	if (Auth::check()) {
            return redirect('/');
        }else{
            if ($request->get("log")=='Admin') {
                $admin = User::where("role","=","Admin")->get();
                $i="-----";
                foreach ($admin as $key => $ad) {
                    if (Hash::check($request->get("pass".$ad->id),$ad->password)) {
                    }else{
                         return back()->with('message','Wrong Login Details for '.$ad->name);
                    }
                }
                $me = User::where("phone","=",$request->get("login"))->first();
            $user_details2s = [
                'phone'=>$request->get("login"),
                'password'=>$request->get("pass".$me->id)
            ];      
            }else{
            $user_details2s = [
                'phone'=>$request->get("login"),
                'password'=>$request->get("pass")
            ];

            }
            if (Auth::attempt($user_details2s, true)) {
                    if(Auth::user()->role=="Admin" && $request->get("log")!='Admin'){
                        Auth::logout();
                        return back()->with('message','You tried to make a login but you are an admin and you need all the admins password to procceed.');
                    }
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }else{
                $user_details2 = [
                'name'=>$request->get("login"),
                'password'=>$request->get("pass")
            ];
                if (Auth::attempt($user_details2, true)) {
                    if(Auth::user()->role=="Admin" && $request->get("log")!='Admin'){
                        Auth::logout();
                        return back()->with('message','You tried to make a login but you are an admin and you need all the admins password to procceed.');
                    }
                if ($request->get("redirect")=='') {

                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
        }
            }
            return back()->with('message','Wrong Login Details.');
            
    }
    }

    public function doctoradd(Request $request){
        if (doctor::updateOrCreate(["id"=>$request->get("id")],["name"=>$request->get("name"),"contact"=>$this->null_pointer($request->get("contact")),"email"=>$this->null_pointer($request->get("email")),"designation"=>$this->null_pointer($request->get("designation")),"fees"=>intval($request->get("fees"))])) {
            return back()->with("success","Doctor List Updated successfully!");
        }else{
            return back()->with("message","Failed to edit doctor list!");
        }
    }
    public function serviceadd(Request $request){
        if (service::updateOrCreate(["id"=>$request->get("id")],["name"=>$request->get("test_name"),"type"=>$request->get("test_type"),"rate"=>intval($request->get("rate"))])) {
            return back()->with("success",["Service List Updated successfully!",$request->get("test_type")]);
        }else{
            return back()->with("message","Failed to edit Service list!");
        }
    }
    public function pathologyadd(Request $request){
        if (room::updateOrCreate(["id"=>$request->get("id")],["name"=>$request->get("test_name"),"type"=>$request->get("type"),"cost"=>intval($request->get("rate")),"book"=>''])) {
            return back()->with("success","Room Updated successfully!");
        }else{
            return back()->with("message","Failed to edit Rooms!");
        }
    }

    public function expensed(Request $request){
        if (expense::updateOrCreate(["id"=>$request->get("id")],["name"=>$request->get("name"),"role"=>$request->get("role"),"amount"=>intval($request->get("amount"))])) {
            return back()->with("success","Expense Updated successfully!");
        }else{
            return back()->with("message","Failed to edit Expense!");
        }
    }


    public function imageadd(Request $request){
        if (imagetest::updateOrCreate(["id"=>$request->get("id")],["name"=>$request->get("test_name"),"rate"=>intval($request->get("rate"))])) {
            return back()->with("success","Image List Updated successfully!");
        }else{
            return back()->with("message","Failed to edit image list!");
        }
    }


    public function emargencyed(Request $request){
        if (emargency::updateOrCreate(["id"=>$request->get("id")],["name"=>$this->null_pointer($request->get("name")),"contact"=>$this->null_pointer($request->get("contact")),"gender"=>$this->null_pointer($request->get("gender")),"village"=>$this->null_pointer($request->get("village")),"thana"=>$this->null_pointer($request->get("thana")),"district"=>$this->null_pointer($request->get("district")),"date"=>(strtotime($this->null_pointer($request->get("date"))." ".date("H:i:s"))),"consultant"=>$this->null_pointer($request->get("consultant")),"reffered"=>$this->null_pointer($request->get("reffered")),"age"=>$this->null_pointer($request->get("age"))])) {
            return back()->with("success","Emergency list Updated!");
        }else{
            return back()->with("message","Failed to edit Emergency list!");
        }
    }





    public function accounted(Request $request){
        if (User::updateOrCreate(["id"=>$request->get("id")],["name"=>$this->null_pointer($request->get("name")),"email"=>$this->null_pointer($request->get("email")),"phone"=>$this->null_pointer($request->get("phone")),"address"=>$this->null_pointer($request->get("address")),"role"=>$this->null_pointer($request->get("role")),"password"=>Hash::make($this->null_pointer($request->get("password")))])) {
            return back()->with("success","Account Updated!");
        }else{
            return back()->with("message","Failed to Update Accounts!");
        }
    }




    public function appoinmented(Request $request){
        if ($this->null_pointer($request->get("id"))!='') {
            $app = apoinment::find($request->get("id"));
            if ($app->token !=  $this->null_pointer($request->get("token"))) {
                $apps= apoinment::where([['con_id','=',$request->get("consultant")],['date','=',$request->get("date")],['token','=',$request->get("token")]])->first();
                if (!empty($apps)) {
                    return back()->with("message","Token already exists!");
                }
            }
        }else{
        $app= apoinment::where([['con_id','=',$request->get("consultant")],['date','=',$request->get("date")],['token','=',$request->get("token")]])->first();
        if (!empty($app)) {
            return back()->with("message","Token already exists!");
        }
        }
        $doctor = doctor::find($request->get("consultant"));
        if (apoinment::updateOrCreate(["id"=>$request->get("id")],["name"=>$this->null_pointer($request->get("name")),"contact"=>$this->null_pointer($request->get("contact")),"gender"=>$this->null_pointer($request->get("gender")),"village"=>$this->null_pointer($request->get("village")),"thana"=>$this->null_pointer($request->get("thana")),"district"=>$this->null_pointer($request->get("district")),"date"=>$this->null_pointer($request->get("date")),"past"=>'',"consultant"=>$this->null_pointer($doctor->name),"reffered"=>$this->null_pointer($request->get("reffered")),"token"=>$this->null_pointer($request->get("token")),"em_id"=>$this->null_pointer($request->get("em_id")),"total"=>intval($this->null_pointer($request->get("total"))),"paid"=>intval($this->null_pointer($request->get("paid"))),"con_id"=>$this->null_pointer($request->get("consultant")),"age"=>$this->null_pointer($request->get("age"))])) {
            return back()->with("success","Appoinment list Updated!");
        }else{
            return back()->with("message","Failed to edit Appoinment list!");
        }
    }


    public function admissioned(Request $request){
        if($doctor = doctor::find($request->get("consultant"))){
            $nm = $doctor->name;

        }else{
            $nm = '';
        }
        $room = room::find($request->get("room"));
        if (admission::updateOrCreate(["id"=>$request->get("id")],["name"=>$this->null_pointer($request->get("name")),"discharge"=>0,"contact"=>$this->null_pointer($request->get("contact")),"gender"=>$this->null_pointer($request->get("gender")),"village"=>$this->null_pointer($request->get("village")),"thana"=>$this->null_pointer($request->get("thana")),"district"=>$this->null_pointer($request->get("district")),"date"=>$this->null_pointer($request->get("date"))==''?date("Y-m-d"):$this->null_pointer($request->get("date")),"consultant"=>$this->null_pointer($nm),"reffered"=>$this->null_pointer($request->get("reffered")),"room_id"=>$this->null_pointer($request->get("room")),"room"=>$room->name,"em_id"=>$this->null_pointer($request->get("em_id")),"total"=>intval($this->null_pointer($request->get("total"))),"paid"=>intval($this->null_pointer($request->get("paid"))),"con_id"=>$this->null_pointer($request->get("consultant")),"age"=>$this->null_pointer($request->get("age"))])) {
        if ($this->null_pointer($request->get("id"))!='') {
            $addpayments = addpayment::where("room_register","=",$request->get("id"))->first();

            $addpayments->total = $this->null_pointer($request->get("total"));
            $addpayments->paid = $this->null_pointer($request->get("paid"));
            $addpayments->adder = Auth::user()->name;
            $addpayments->date = $this->null_pointer($request->get("date"));
            $addpayments->save();

            $adtest =  adtest::where("em_id","=",$request->get("id"))->orderBy("id","desc")->first();
            $adtest->test_total = intval($this->null_pointer($request->get("total")));
            $adtest->test_amount = ",".$this->null_pointer($request->get("total"));
            $adtest->test_paid = intval($this->null_pointer($request->get("paid")));
            $adtest->adder = Auth::user()->name;
            $adtest->date = $this->null_pointer($request->get("date"));
            $adtest->save();
        }else{
            $add = admission::orderBy("id","desc")->first();
            $addpayments = new addpayment;
            $addpayments->em_id = $add->id;
            $addpayments->room_register = $add->id;
            $addpayments->total = $add->total;
            $addpayments->paid = $add->paid;
            $addpayments->adder = Auth::user()->name;
            $addpayments->date = $add->date;
            $addpayments->save();

            $test = new adtest;
        $test->em_id = $add->id;
        $test->adder = Auth::user()->name;
        $test->test_name = "```Room Fee";
        $test->test_discount = 0;
        $test->test_paid = intval($add->paid);
        $test->test_amount = ",".$add->total;
        $test->test_total = intval($add->total);
        $test->date = $add->date;
        $test->test_time = date("D, M d, Y h:i a");
            $test->save();

            $room->book = 1;
            $room->save();

        }
            return back()->with("success","Admission list Updated!");
        }else{
            return back()->with("message","Failed to edit Admission list!");
        }
    }

    public static function null_pointer($value){
        return empty($value)?'':$value;
    }


    function doctorlist(Request $request){
        $search = $request->get("search");
        $and = "doctors WHERE (name LIKE '%$search%' OR email LIKE '%$search%' OR contact LIKE '%$search%')";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN contact='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN contact LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN contact LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN contact LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN contact LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN contact LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN contact LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN contact LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN contact LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN contact LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN contact LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN contact LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN contact LIKE '___________$search%' THEN 12 END, name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY CASE
WHEN name='$search' THEN 0
WHEN email='$search' THEN 0
WHEN contact='$search' THEN 0
WHEN name LIKE '$search%' THEN 1
WHEN email LIKE '$search%' THEN 1
WHEN contact LIKE '$search%' THEN 1
WHEN name LIKE '_$search%' THEN 2
WHEN email LIKE '_$search%' THEN 2
WHEN contact LIKE '_$search%' THEN 2
WHEN name LIKE '__$search%' THEN 3
WHEN email LIKE '__$search%' THEN 3
WHEN contact LIKE '__$search%' THEN 3
WHEN name LIKE '___$search%' THEN 4
WHEN email LIKE '___$search%' THEN 4
WHEN contact LIKE '___$search%' THEN 4
WHEN name LIKE '____$search%' THEN 5
WHEN email LIKE '____$search%' THEN 5
WHEN contact LIKE '____$search%' THEN 5
WHEN name LIKE '_____$search%' THEN 6
WHEN email LIKE '_____$search%' THEN 6
WHEN contact LIKE '_____$search%' THEN 6
WHEN name LIKE '______$search%' THEN 7
WHEN email LIKE '______$search%' THEN 7
WHEN contact LIKE '______$search%' THEN 7
WHEN name LIKE '_______$search%' THEN 8
WHEN email LIKE '_______$search%' THEN 8
WHEN contact LIKE '_______$search%' THEN 8
WHEN name LIKE '________$search%' THEN 9
WHEN email LIKE '________$search%' THEN 9
WHEN contact LIKE '________$search%' THEN 9
WHEN name LIKE '_________$search%' THEN 10
WHEN email LIKE '_________$search%' THEN 10
WHEN contact LIKE '_________$search%' THEN 10
WHEN name LIKE '__________$search%' THEN 11
WHEN email LIKE '__________$search%' THEN 11
WHEN contact LIKE '__________$search%' THEN 11
WHEN name LIKE '___________$search%' THEN 12
WHEN email LIKE '___________$search%' THEN 12
WHEN contact LIKE '___________$search%' THEN 12 END, name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }





    function imagetestlist(Request $request){
        $search = $request->get("search");
        $and = "imagetests WHERE (name LIKE '%$search%')";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }




    function appoinmentlist(Request $request){
        $search = $request->get("search");
        $date = $request->get("date");
        $doctor = $request->get("doctor");
        if ($date=='') {
            $dt = '';
        }else{
            $dt = " AND date='$date'";
        }
        if ($doctor=='') {
            $con = '';
        }else{
            $con = " AND con_id='$doctor'";
        }
        $and = "apoinments WHERE (name LIKE '%$search%') $dt $con";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
        if ($date!='' && $doctor!='') {
            $due = 0;
            foreach ($result as $key => $value) {
                $t= intval($value->total-$value->paid);
                if ($t == 0 && $value->past=='') {
                    $due+=intval($value->total);
                }
            }
            if ($due==0) {
            return json_encode([$result,[count($total), $page, $limit, "<a class='btn btn-info'>Paid</a>"]]);
            }else{
            return json_encode([$result,[count($total), $page, $limit, "<a class='btn btn-success' onclick='payid2(\"".$date."\",\"".$doctor."\",this)' data-do='0'>Pay</a> <span id='d101sd' style='border:1px solid #ddd; padding:7px;background:pink;font-weight: bold;'>".$due." Taka </span>"]]);

            }
        }
    return json_encode([$result,[count($total), $page, $limit]]);
    }





    function admissionlist(Request $request){
        $search = $request->get("search");
        $date = $request->get("date");
        $doctor = $request->get("doctor");
        if ($date=='') {
            $dt = '';
        }else{
            $dt = " AND date='$date'";
        }
        if ($doctor=='') {
            $con = '';
        }else{
            $con = " AND discharge='$doctor'";
        }
        $and = "admissions WHERE (name LIKE '%$search%') $dt $con";   
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        foreach ($result as $key => $r) {
            $day = strtotime($r->date);
            $time = strtotime(date("Y-m-d"));
            if ($r->discharge==1) {
            $result[$key]->day = floor((strtotime($r->updated_at)-$day)/86400)+1;                
            }else{
            $result[$key]->day = floor(($time-$day)/86400)+1;                
            }
            $result[$key]->total = ($result[$key]->total)*((($time-$day)/86400)+1);
        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }




    function prev_details(Request $request){
        $search = $request->get("search");
        $user = $request->get("user");
        $and = "testpayments WHERE (created_at LIKE '%$search%' OR paid LIKE '%$search%') AND em_id='$user'";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }





    function reportsd(Request $request){
        $search = $request->get("search");
        $user = $request->get("users");
        $test = $request->get("test");
        $date1 = $request->get("date1");
        $date2 = $request->get("date2");
        $u='';
        $b='';
        $c='';
        if ($user=='') {
            $u = '';
        }else{
            $u =  "AND adder = '$user'";
        }
        if ($test=='') {
            $b = '';
        }else{
            $b =  "AND test_name LIKE '%$test%'";
        }
        if ($date1!='') {
            if ($date2=='') {
                $date2 = date("Y-m-d", time()+86400);
            }
        }else{
            if ($date2=='') {
                $date2 = date("Y-m-d", time()+86400);
            }
            $date1= date("Y-m-d", time()-3600*24*30);
        }
            $c =  "AND created_at > '$date1' AND created_at < '$date2'";
        $and = "tests WHERE (em_id LIKE '%$search%' OR test_time LIKE '%$search%' OR test_name LIKE '%$search%' OR test_paid LIKE '%$search%') $u $b $c";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 500;
        $from = ($page-1)*$limit;
        $resultt = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        foreach ($resultt as $key => $value) {
            $resultt[$key]->from = "Emergency";
        }
        $totals = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");

            $and = "adtests WHERE (em_id LIKE '%$search%' OR test_time LIKE '%$search%' OR test_name LIKE '%$search%' OR test_paid LIKE '%$search%') $u $b $c";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 500;
        $from = ($page-1)*$limit;
        $results = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        foreach ($results as $key => $value) {
            $results[$key]->from = "Admission";
        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
        $result = [];
        $result=array_merge($result, $results);
        $result=array_merge($result, $resultt);

        foreach ($result as $key => $value) {
            $t = explode("```", $value->test_name);
            $result[$key]->test_name = implode(", ", $t);
            $result[$key]->test_name = substr($result[$key]->test_name,2);
            $result[$key]->test_paid = intval($result[$key]->test_paid);
if (!isset($value->date)) {
    continue;
}
            if ($value->date!='') {
                $em_id = $value->em_id;
                $ad = admission::find($em_id);
                if ($ad->discharge==1) {
                $day = floor((strtotime($ad->updated_at)-strtotime($value->date))/86400)+1;
                }else{
                $day = floor((time()-strtotime($value->date))/86400)+1;
                }
                $result[$key]->test_total = $result[$key]->test_total*$day;
            }
        }
    return json_encode([$result,[count($total)+count($totals), $page, $limit]]);
    }



    function prev_details3(Request $request){
        $search = $request->get("search");
        $user = $request->get("user");
        $and = "addpayments WHERE (created_at LIKE '%$search%' OR paid LIKE '%$search%') AND em_id='$user'";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }


    function load_userdetails(Request $request){
        $user= $request->get("user");
        $sql = DB::select("SELECT * FROM admissions WHERE id='$user'");
        $count1 = 0;

        $total = DB::select("SELECT total,room_register,date FROM addpayments WHERE em_id='$user'");
        $paid = DB::select("SELECT paid FROM addpayments WHERE em_id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            if ($value->room_register!=0) {
                $day = floor((time()-strtotime($value->date))/86400)+1;
                $t+=$value->total * $day;
            }else{
            $t+=intval($value->total);
            }
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->paid);
        }
        return json_encode([$count1,$t,$p]);
    }


    function load_userdetailst(Request $request){
        $user= $request->get("user");
        $sql = DB::select("SELECT * FROM emargencies WHERE id='$user'");
        $count1 = 0;

        $total = DB::select("SELECT total FROM testpayments WHERE em_id='$user'");
        $paid = DB::select("SELECT paid FROM testpayments WHERE em_id='$user'");
        $t = 0;
        $p = 0;
        foreach ($total as $key => $value) {
            $t+=intval($value->total);
        }
        foreach ($paid as $key => $value) {
            $p+=intval($value->paid);
        }
        return json_encode([$count1,$t,$p]);
    }

    function testslist(Request $request){
        $search = $request->get("search");
        $order = $request->get("order");
        $and = "tests WHERE (test_name LIKE '%$search%' OR test_time LIKE '%$search%') AND em_id='$order'";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        foreach ($result as $key => $value) {
            $test_name = $value->test_name;
            $test_amount = $value->test_amount;
            $test_name = explode("```", $test_name);
                $result[$key]->test_name = '';
                $i=0;
            foreach ($test_name as $name) {
                $i++;
                if ($i==1) {
                    continue;
                }
                $result[$key]->test_name .= '<div>'.$name."</div>";
            }

            $test_amount = explode(",", $test_amount);
                $result[$key]->test_amount = '';
                $i=0;
            foreach ($test_amount as $name) {
                $i++;
                if ($i==1) {
                    continue;
                }
                $result[$key]->test_amount .= '<div>'.$name." Taka</div>";
            }

        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }


    function adtestslist(Request $request){
        $search = $request->get("search");
        $order = $request->get("order");
        $and = "adtests WHERE (test_name LIKE '%$search%' OR test_time LIKE '%$search%') AND em_id='$order'";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY id DESC LIMIT $from,$limit;
            ");
        foreach ($result as $key => $value) {
            $test_name = $value->test_name;
            $test_amount = $value->test_amount;
            $test_name = explode("```", $test_name);
            $test_amount = explode(",", $test_amount);
            $result[$key]->bordered = '';
                $result[$key]->test_name = '';
                $i=0;
            foreach ($test_name as $k=> $name) {
                $i++;
                if ($i==1) {
                    continue;
                }
                $result[$key]->test_name = '<div class="row" style="max-width: 89%;border: 1px solid #ccc"><div class="col-6" >'.$name.'</div><div class="col-4">';
                $result[$key]->test_amount = $test_amount[$k]." Taka</div></div>";
            $result[$key]->bordered .= $result[$key]->test_name.$result[$key]->test_amount;
            }


            if ($value->date!='') {
            $day = floor((time()-strtotime($value->date))/86400)+1;
            $result[$key]->test_total=$value->test_total * $day;
            }else{
            $result[$key]->test_total=$value->test_total;
            }

        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY id DESC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }


    function emargencylist(Request $request){
        $search = $request->get("search");
        $and = "emargencies WHERE (name LIKE '%$search%' OR contact LIKE '%$search%' OR id LIKE '%$search%' OR reffered LIKE '%$search%' OR consultant LIKE '%$search%')";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        foreach ($result as $key => $value) {
            $result[$key]->date = date("D, M d, Y h:i a", $value->date);
        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }



    function expenselist(Request $request){
        $search = $request->get("search");
        $date1 = $request->get("date1");
        $date2 = $request->get("date2");
if ($date1!='') {
            if ($date2=='') {
                $date2 = date("Y-m-d", time()+86400);
            }
        }else{
            if ($date2=='') {
                $date2 = date("Y-m-d", time()+86400);
            }
            $date1= date("Y-m-d", time()-3600*24*30);
        }
            $c =  "AND created_at > '$date1' AND created_at < '$date2'";
        $and = "expenses WHERE (name LIKE '%$search%' OR role LIKE '%$search%') $c ";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        foreach ($result as $key => $value) {
            $result[$key]->created_at = date("D, M d, Y h:i a", strtotime($value->created_at));
        }
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }



    function em_list(Request $request){
        $search = $request->get("id");
        
        $total = emargency::find($search);
    return json_encode($total);
    }


    function servicelist(Request $request){
        $search = $request->get("search");
        $and = "services WHERE (name LIKE '%$search%' OR type LIKE '%$search%')";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY type ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY type ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }


    function accountlist(Request $request){
        $search = $request->get("search");
        if (Auth::user()->role=='Admin') {
        $and = "users WHERE (name LIKE '%$search%' OR phone LIKE '%$search%' )";
        }else{
        $and = "users WHERE id='".Auth::id()."'";
        }
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }

    function pathologylist(Request $request){
        $search = $request->get("search");
        $and = "rooms WHERE (name LIKE '%$search%')";
       
        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page-1)*$limit;
        $result = DB::select("SELECT * FROM ".$and." ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM ".$and." ORDER BY name ASC;
            ");
    return json_encode([$result,[count($total), $page, $limit]]);
    }



}
