<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use DB;
use Auth;
use Hash;
use App\Models\User;
use App\Models\task;
use App\Models\task_list;
use Illuminate\Http\RedirectResponse;
class SiteController extends Controller
{
    public function home(){
        // Artisan::call('cache:clear');
        $dateY = date("Y");
        $dateM = date("m");
        $dateD = date("d");
        $dateB = date("l");
        $date = date("Y-m-d");
        $user = Auth::id();
        $sql = "SELECT * FROM tasks WHERE DATE(`complete`)!='$date' AND (((shedule LIKE '%$dateB%' OR (day(`time`)='$dateD' AND `montht`='1' ) OR (month(`time`)='$dateM' AND year(`time`)='$dateY' AND `yeart`='1' )) AND `repeat`=1) OR `repeat`='0') AND user='$user' ORDER BY `time` ASC";
        // return $sql;
        $ss = DB::select($sql);

        $do = DB::select("SELECT id FROM task_lists WHERE status=1");
        $doe = DB::select("SELECT id FROM task_lists WHERE status=1 AND year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
        $does = DB::select("SELECT id FROM task_lists");
        $doet = DB::select("SELECT id FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
$d = count($doet);
if (count($doet)==0) {
    $d = 1;
}
$m = count($does);
if (count($does)==0) {
    $m = 1;
}

    	return view("home", ["list"=>$ss,"mov"=>[number_format((count($do)/$m),2)*100,number_format((count($doe)/$d),2)*100]]);
    }
    public function edit_member($id){
        $members = DB::table('members')->orderBy('id','desc')->get();
        $edit = DB::table('members')->find($id);
        return view("add_member",['members'=>$members,'edit'=>$edit]);
    }
    public function delete_member($id){
        $members = Member::find($id);
        $name = $members->name;
        $members->delete();
        return redirect("add_member")->with("success",['success',"Successfuly Deleted User ". $name]);
    }
    public function add_task(){
        return view("add_task");
    }
    public function add_tasks(request $request){
        $task_name = $request->get('name');
        $date = $request->get('date');
        $time = $request->get('time');
        $shedule = $request->get('days');
        $category = $request->get('category');
        $priority = $request->get('priority');
        $datetime = $date." ".$time;
        $montht = 0;
        $yeart = 0;
        if ($shedule!='') {
        $shedules = explode(",", $shedule);
        if (in_array("Month", $shedules)) {
            $montht = 1;
            $shedule = str_replace(",Month", "", $shedule);
        }
        if (in_array("Year", $shedules)) {
            $yeart = 1;
            $shedule = str_replace(",Year", "", $shedule);
        }
        }
        if ($shedule!='') {
        $repeat = 1;
        }else{
        $repeat = 0;
        }
        $user = Auth::user()->id;

        $user = task::updateOrCreate(
    ['id' =>  request('id')],
    ['task_name' => $task_name,'shedule' => $shedule,'repeat' => $repeat,'category' => $category,'priority' => $priority,'time' => $datetime, 'montht' => $montht,'yeart' => $yeart,'user' => $user,'complete' => '1111-11-11 11:11:11']
);
if(!$user->wasRecentlyCreated && $user->wasChanged()){
    return redirect("add_tasks")->with("success",['success',"Successfully Updated Task ". $request->get('name')]);
}

if(!$user->wasRecentlyCreated && !$user->wasChanged()){
    return redirect("add_tasks")->with("success",['danger',"Failed to Save Task ". $request->get('name')]);
    // updateOrCreate performed nothing, row did not change
}

if($user->wasRecentlyCreated){
   // updateOrCreate performed create
    return redirect("add_tasks")->with("success",['success',"Successfully Created Task ". $request->get('name')]);
}
    }
    public function feedback(request $request){
        $val = $request->get('val');
        $id = $request->get('id');
        $data = task::find($id);
        $date = date("Y-m-d");
        $time = date("H:i:s");
$dateY = date("Y");
        $dateM = date("m");
        $dateD = date("d");


        $datetime = $date." ".$time;
        $user = task_list::updateOrCreate(
    ['id' => 0],
    ['task_name' => $data->task_name,'shedule' => $data->shedule,'repeat' => $data->repeat,'category' => $data->category,'priority' => $data->priority,'time' => $datetime, 'month' => $data->montht,'year' => $data->yeart,'user' => $data->user,'status' => $val]);

$data->complete=$datetime;
$data->save();
         $do = DB::select("SELECT id FROM task_lists WHERE status=1");
        $doe = DB::select("SELECT id FROM task_lists WHERE status=1 AND year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
        $does = DB::select("SELECT id FROM task_lists");
        $doet = DB::select("SELECT id FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");


        return json_encode([$id,number_format((count($do)/count($does)),2),number_format((count($doe)/count($doet)),2)]);
    }
public function del(request $request){
        $val = $request->get('val');
        $id = $request->get('id');
        $data = task::find($id)->delete();
        return json_encode([$id]);
    }
    public function login(){
        if (Auth::check()) {
            return redirect('/');
        }else{
        return view("login",["register"=>[0,1]]);
        }
    }
    public function register(){
        if (Auth::check()) {
            return redirect('/');
        }else{
        return view("register",["register"=>[0,1]]);
        }
    }
    public function lifestyle(){
                $dateY = date("Y");
        $dateM = date("m");
        $dateD = date("d");
        $dateB = date("l");
        $date = date("Y-m-d");
        $do = DB::select("SELECT id FROM task_lists WHERE status=1");
        $doe = DB::select("SELECT id FROM task_lists WHERE status=1 AND year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
        $does = DB::select("SELECT id FROM task_lists");
        $doet = DB::select("SELECT id FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
$d = count($doet);
if (count($doet)==0) {
    $d = 1;
}
$m = count($does);
if (count($does)==0) {
    $m = 1;
}

        return view("lifestyle", ["mov"=>[number_format((count($do)/$m),2)*100,number_format((count($doe)/$d),2)*100]]);
    }
    public function lifestyles(request $req){
                $dateY = date("Y", strtotime($req->date));
        $dateM = date("m", strtotime($req->date));
        $dateD = date("d", strtotime($req->date));
        $dateB = date("l", strtotime($req->date));
        $date = date("Y-m-d", strtotime($req->date));
                $user = Auth::id();
        $sql = "SELECT * FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD AND user='$user' ORDER BY `time` ASC";
        // return $sql;
        $ss = DB::select($sql);
        $do = DB::select("SELECT id FROM task_lists WHERE status=1");
        $doe = DB::select("SELECT id FROM task_lists WHERE status=1 AND year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
        $does = DB::select("SELECT id FROM task_lists");
        $doet = DB::select("SELECT id FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
$d = count($doet);
if (count($doet)==0) {
    $d = 1;
}
$m = count($does);
if (count($does)==0) {
    $m = 1;
}

        return view("lifestyle", ["list"=>$ss,"mov"=>[number_format((count($do)/$m),2)*100,number_format((count($doe)/$d),2)*100]]);
    }
public function all_tasks(){
    $dateY = date("Y");
        $dateM = date("m");
        $dateD = date("d");
        $dateB = date("l");
$user = Auth::id();
        $date = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM tasks WHERE user='$user' AND (((shedule='' OR yeart=0 OR montht=0) AND (complete>'$date' OR complete='1111-11-11 11:11:11')) OR (shedule!='' OR yeart!=0 OR montht!=0)) ORDER BY `time` ASC";
        // return $sql;
        $ss = DB::select($sql);
        $do = DB::select("SELECT id FROM task_lists WHERE status=1");
        $doe = DB::select("SELECT id FROM task_lists WHERE status=1 AND year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
        $does = DB::select("SELECT id FROM task_lists");
        $doet = DB::select("SELECT id FROM task_lists WHERE year(`time`)=$dateY AND month(`time`)=$dateM AND day(`time`)=$dateD");
$d = count($doet);
if (count($doet)==0) {
    $d = 1;
}
$m = count($does);
if (count($does)==0) {
    $m = 1;
}

        return view("all_task", ["list"=>$ss,"mov"=>[number_format((count($do)/$m),2)*100,number_format((count($doe)/$d),2)*100]]);
    }

    public function logme(Request $request){
        if (Auth::check()) {
            return redirect('account');
        }else{
            $this->validate($request,[
                'Email_or_Username'=>'required',
                'password'=>'required|alphaNum|min:4'
            ]);

            $user_details2s = [
                'email'=>$request->get("Email_or_Username"),
                'password'=>$request->get("password")
            ];
            if (Auth::attempt($user_details2s, true)) {
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }else{
                $user_details2 = [
                'name'=>$request->get("Email_or_Username"),
                'password'=>$request->get("password")
            ];
                if (Auth::attempt($user_details2, true)) {
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
        }
            }
            return back()->with('error','Wrong Login Details.');
            
    }
    }
    public function regme(request $request){
        $this->validate($request,[
            'name'=>'required|max:20|unique:users',
            'email'=>'nullable|email|unique:users',
            'password'=>'required|alphaNum|min:4'
        ]);

        $user = new User();
        $user->name = $request->get("name");
        $user->Password = Hash::make($request->get("password"));
        $user->email = $request->get("email");
        $user->role = "Customer";
        $saved =$user->save();
        if($saved){
        return redirect("login")->with("new_account",[0,1,__("Your account created successfuly.")]);
        }else{
        return redirect("register")->with("new_account",[0,1,__("Failed to create your account.")]);
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
    
    // public function about(){
    // 	return view("about",["lan"=>array("bangla","english","hindi","tamil","malika","salika","mayan")]);
    // }
    // public function contact(){
    //     $users = DB::table('users')->paginate(5);
    //     // $users = DB::select('select * from users');
    // return view('contact',['users'=>$users]);
    // }
    // public function make(){
    // 	return "This is a make page";
    // }
    // public function news(){
    // 	return view("news");
    // }
    // public function name($namevalue){
    // 	return view("about", ["name"=>$namevalue]);
    // }
}
