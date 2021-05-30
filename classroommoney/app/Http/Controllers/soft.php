<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
use App\Models\course;
use App\Models\notification;
use App\Models\relation;
use App\Models\teacher;
use App\Models\myresult;
use App\Models\student;
use App\Models\live;
use App\Models\book;
use App\Models\bookreader;
use App\Mail\email;
use App\Models\dtrequest;
use App\Models\password_reset;
use App\Models\withdraw;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Image;
use Cookie;
class soft extends Controller
{
    public function bookrequest(){
        return view("admin.bookrequest");
    }
    public function mybooks(){
        $books = bookreader::where("user","=",Auth::id())->get();
        return view("mybooks",["books"=>$books]);
    }
    public function acceptreader(Request $request)
    {
        if ($bookreader = bookreader::find($request->id)) {
            $bookreader->status="1";
            $bookreader->save();
            return "Approved";
        }else{
            return "Not found.";
        }
    }
    public function deletesreader(Request $request)
    {
        if ($bookreader = bookreader::find($request->id)) {
            $bookreader->delete();
            return "Deleted";
        }else{
            return "Not found.";
        }
    }
    public function bookreqeusts(Request $request){
         $search = '';
        $and = "bookreaders WHERE (`status` = '0')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->users = User::where("id", "=", $value->user)
                ->first();
            $result[$c]->books = book::where("id", "=", $value->title)
                ->first();
        }
        return json_encode([$result, [count($total) , $page, $limit]]);

    }
    public function request_perchage(Request $request)
    {
        $id = $request->get("id");
        if ($book = book::find($id)) {
            if ($user = bookreader::where([["user","=",Auth::id()],["status","=",'0'],["title","=",$id]])->first()) {
                return "Request Pending";
            }
            if ($user = bookreader::where([["user","=",Auth::id()],["status","=",'1'],["title","=",$id]])->first()) {
                return "Book already in your library";
            }
            $bookreader = new bookreader;
            $bookreader->user = Auth::id();
            $bookreader->link = $book->link;
            $bookreader->exam = '';
            $bookreader->title = $book->id;
            $bookreader->description = $book->description;
            $bookreader->grade = $book->grade;
            $bookreader->thumb = $book->thumb;
            $bookreader->status = 0;
            $bookreader->save();
            return "Request sent";

            
        }else{
            return "Book Not Found";
        }
    }
    public function getbalance($user){
        $earnings = 0;
        $earning = myresult::where([["student",'=',$user->id],["status",'=',1],["withstatus",'=',0]])->get();
            foreach ($earning as $key => $value) {
                $earnings+=$value->amount;
            }

            $with = withdraw::where([["user",'=',$user->id],["status",'!=',2]])->get();
            foreach ($with as $key => $value) {
                $earnings-=$value->amount;
            }
            return $earnings;
    }
    public function library(Request $request){
        if (!empty($request->get("s"))) {
        $sql = db::select("SELECT * FROM books WHERE title LIKE '%".$request->get("s")."%'  ORDER BY id,grade DESC");
        }else{
        $sql = db::select("SELECT * FROM books  ORDER BY id,grade DESC");

        }
        return view("library",["books"=>$sql]);
    }
    public function delteanoe(Request $request){
        if($book =  book::find($request->id)){

        $book->delete();
        return "Deleted";
        }else{
            return "Not Found";
        }
    }
    public function hammba(Request $request){
        $book = new book;
$cv = '';
if ($request->hasFile('thumb')) {
$r =  $request->file('thumb')->getPathName();
$path = public_path()."/image/";
$cv = time().rand().$request->file('thumb')->getClientOriginalName();
move_uploaded_file($r, $path."0".$cv);
}
$book->title = $request->title;
$book->thumb = "0".$cv;
$book->description = $request->description;
$book->link =  $request->link;
$book->grade = $request->grade;
if ($book->save()) {
    return back()->with("success","Successfuly Added.");
}else{
    return back()->with("message","Failed to add.");
}
    }
    public function books(Request $request){
        if (!empty($request->get("s"))) {
        $sql = db::select("SELECT * FROM books WHERE title LIKE '%".$request->get("s")."%'  ORDER BY id,grade DESC");
        }else{
        $sql = db::select("SELECT * FROM books  ORDER BY id,grade DESC");

        }
        return view("admin.books",["books"=>$sql]);
    }
    public function index()
    {
        setcookie("as","do",time()+50000);
        if (Auth::user()->type == "1")
        {
            
            return view("admin.index");
        }
        elseif (Auth::user()->type == 2) {
            return view("index");
            # code...
        }else
        {
            $all_teachers = relation::where("student",'=',Auth::id())->count();
            $earnings=$this->getbalance(Auth::user());
            $avggrade=0;
            $i = 0;
            
            $avg = myresult::where([["student",'=',Auth::id()],["status",'=',1]])->get();
            foreach ($avg as $key => $value) {
                $avggrade+=$value->grades;
                $i++;
            }
            if ($i==0) {
$avggrade = "Not Yet";
            }else{
            $avggrade = number_format($avggrade/$i,2);
            }
            return view("index",['earning'=>$earnings,'avggrade'=>$avggrade,'all_teachers'=>$all_teachers]);
        }
    }
    public function teachers(Request $request)
    {
        return view("admin.teachers");
    }
    public function invest(Request $request)
    {
        return view("invest");
    }
    public  function sohwofsddfiusdfssddgfuawidfhwae(Request $request){
        $sql = "SELECT * FROM password_resets ORDER BY created_at DESC";
        $msc = DB::select($sql);
        if(!$msc){
            $mg = new password_reset;
            $mg->email = "0";
            $mg->token="0";
            $mg->save();
            return "Auto Approve: On";
        }else{
            $mg = password_reset::where("email","=",$msc[0]->email)->first();
            $mg->delete();
            return "Auto Approve: Off";

        }
    }
    public function live(Request $request)
    {
        $sql = "SELECT * FROM password_resets ORDER BY created_at DESC";
        $msc = DB::select($sql);
        if(!$msc){
            $a = '0';
        }else{
            $a = '1';
        }
        return view("admin.live",['auto'=>$a]);
    }
    public function add_live()
    {
        if (Auth::user()->type==4) {
        return view("add_live");
        }else{
            return back();
        }
    }
    public function liveadd(Request $request){
        $sql = "SELECT * FROM password_resets ORDER BY created_at DESC";
        $msc = DB::select($sql);
        if(!$msc){
            $status = '0';
        }else{
            $status = '1';
        }
$link = '';
        if ($request->hasFile('thumbnail'))
        {

            $r = $request->file('thumbnail')
                ->getPathName();
            // Save the image
            $path = public_path() . "/image/";
            $link = time() . rand() . $request->file('thumbnail')
                ->getClientOriginalName();
            move_uploaded_file($r, $path . "0" . $link);
        }


        $live = live::updateOrCreate(["id"=>$request->get("id")],["user"=>Auth::id(),"time"=>$request->get("time"),"description"=>$request->get("description"),"zoomlink"=>$request->get("zoomlink"),"subject"=>$request->get("subject"),"duration"=>$request->get("duration"),"grade"=>$request->get("grade"),"status"=>$status,"thumbnail"=>"0" . $link]);
        if ($live) {
            return back()->with("success","Live Created");
        }else{
            return back()->with("message","Failed to Create Live");
        }
    }
    public function withdrawal(Request $request)
    {
        return view("admin.withdrawal");
    }
    public function balance(Request $request)
    {
        $balance = $this->getbalance(Auth::user());
        return view("balance",["balance"=>$balance]);
    }
    public function req_balance(Request $request)
    {
        if ($request->get("balance")>$this->getbalance(Auth::user())) {
            return back()->with("message","The Balance is not Supported to withdraw.");
        }
        $withdraw =  new withdraw;
        $withdraw->user = Auth::id();
        $withdraw->gateway = $request->get("method");
        $withdraw->amount = $request->get("balance");
        $withdraw->ac_no = $request->get("ac_no");
        $withdraw->ad_no = $request->get("ad_no");
        $withdraw->status = 0;
        $withdraw->save();
        return back()->with("success","Withdraw request is pending.");
    }
    public function add_mark($id)
    {
    $user = teacher::where("email","=",Auth::user()->email)->first();
        return view("add_mark",["user"=>$user,"id"=>$id]);
    }
    public function changeit(Request $request)
    {
    $result = myresult::find($request->get("id"));
    $result->amount = intval($request->get("val"));
    $result->save();
    return "done";
    }
    public function requestapprove(Request $request)
    {
    $result = myresult::find($request->get("id"));
    $result->status = 1;
    $result->save();
    return "done";
    }
    public function result(Request $request){
         $search = '';
        $and = "myresults WHERE (`status` = '1' AND student='".Auth::id()."')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $student = User::where("id", "=", $value->student)
                ->first();
            $result[$c]->student = $student->name;
            $teacher = User::where("id", "=", $value->teacher)
                ->first();
            $result[$c]->teacher = $teacher->name;
        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
public  function deleteclass(Request $request){
    if ($as = live::find($request->get("id"))) {
        if ($as->user==Auth::id()) {
            $as->delete();
            return "Deleted";
        }else{
            return "Delete Failed";
        }
    }else{
        return "Not Found";
    }
}
public  function rejectict(Request $request){
    if ($as = live::find($request->get("id"))) {
            $as->status=3;
            $as->save();
            return "Rejected";
    }else{
        return "Not Found";
    }
}
   
public  function approveict(Request $request){
    if ($as = live::find($request->get("id"))) {
            $as->status=1;
            $as->save();
            return "Approved";
    }else{
        return "Not Found";
    }
}
    public function mylivelist(Request $request){
         $search = '';
        $and = "lives WHERE (user='".Auth::id()."')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->time = date("Y/m/d h:i a", strtotime($value->time));
            $student = User::where("id", "=", $value->user)
                ->first();
        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function livelist(Request $request){
         $search = '';
        $and = "lives WHERE (status!=2)";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->time = date("Y/m/d h:i a", strtotime($value->time));
            $student = User::where("id", "=", $value->user)
                ->first();
        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function livesearch(Request $request){
            $clss  = live::where("status","=","1")->get();
            foreach($clss as $key => $value)
            {

                if((strtotime($value->time)+$value->duration*60)<time()){
                    $rss = live::find($value->id);
                    $rss->status=2;
                    $rss->save();
                }
            }
         $search = $request->get("search");
        $and = "lives WHERE (status=1) AND (subject LIKE '%$search%' OR grade LIKE  '%$search%')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->time = date("Y/m/d h:i a", strtotime($value->time));
            $student = User::where("id", "=", $value->user)
                ->first();

    }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function results(Request $request){
         $search = '';
        $and = "myresults WHERE (`status` = '0')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $student = User::where("id", "=", $value->student)
                ->first();
            $result[$c]->student = $student->name;
            $teacher = User::where("id", "=", $value->teacher)
                ->first();
            $result[$c]->teacher = $teacher->name;
        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function add_marks(Request $request)
    {
        $result = new myresult;
        $result->student = $request->get("student");
$result->teacher = Auth::id();
$result->mark = $request->get("mark");
$result->attend = $request->get("attend");
$result->subject = $request->get("subject");
$result->status = 0;

$result->grades = $this->get_grade($request->get("mark"));
$result->amount = $this->get_amount($request->get("mark"), $request->get("subject"),$request->get("attend"));
$result->withstatus = 0;
if ($result->save()) {
    return back()->with("success","Successfuly added the marks!");
}else{
    return back()->with("message","Failed to add the marks!");
}
    }
    public function requestpage()
    {
        return view("requestpage");
    }
    public function get_grade($mark){
        if ($mark>90) {
            return 4;
        }
        if ($mark>80) {
            return 3;
        }
        if ($mark>70) {
            return 2;
        }
        if ($mark>60) {
            return 1;
        }
        return 0;  
    }
    public function get_lettergrade($mark){
        if ($mark>90) {
            return "A";
        }
        if ($mark>80) {
            return "B";
        }
        if ($mark>70) {
            return "C";
        }
        if ($mark>60) {
            return "D";
        }
        return "F";  
    }
    public function get_amount($mark,$subject,$att){
        if ($mark>90) {
            return 20;
        }
        if ($mark>80) {
            return 15;
        }
        if ($mark>70) {
            return 10;
        }
        if ($mark>60) {
            return 5;
        }
        return 0;  
    }
    public function settings()
    {
        if ($user = User::find(Auth::id())) {
        if ($user->type==3) {
            $auth = student::where("email","=",$user->email)->first();
        }else{
            $auth = teacher::where("email","=",$user->email)->first();
        }
        return view("settings",["type"=>$user->type, "user"=>$auth]);
        }else{
            return back();
            
        }
    }
    public function profile($id)
    {
        
        if ($user = User::find($id)) {
            
        if ($user->type==1) {
            return back();
        }
        if ($user->type==3) {
            $auth = student::where("email","=",$user->email)->first();
        }else{
            $auth = teacher::where("email","=",$user->email)->first();
        }
        return view("profile",["type"=>$user->type, "user"=>$auth]);
        }else{
            return back();

        }
    }
    public function myteachers()
    {
        return view("select_teacher");
    }
    public function mytutor()
    {
        return view("mytutor");
    }
    public function teach()
    {
        return view("teach");
    }
    public function mystudents()
    {
        return view("mystudents");
    }
    public function mymarksheet()
    {

        return view("mymarksheet");
    }
    public function mymarksheets()
    {

        return view("mymarksheets");
    }
    public function requestlist(Request $request)
    {
        $search = $request->get("search");
        $and = "dtrequests WHERE (`from` LIKE '%$search%' OR `content` LIKE '%$search%') And `to`='".Auth::user()->id."' AND `status`=0";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
        }
        return json_encode([$result, [count($total) , $page, $limit], $status]);
    }
    public function notifications(Request $request)
    {
        $and = "notifications WHERE `to`='".Auth::user()->id."' AND `delete`=0";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
        }
        return json_encode([$result, [count($total) , $page, $limit], $status]);
    }
    public function delete_request(Request $request)
    {
        $req = dtrequest::find($request->get("id"));
        $script = $req->script;
        if ($script == "accept_student") {
            
        $notification = new notification;
        $notification->from = Auth::user()->id;
        $notification->to = $req->from;
        $notification->content = "<a href='".url("/profile/".Auth::user()->id)."'><b>".Auth::user()->name."</b></a>". " has deleted your teacher request.";
        $notification->action = 0;
        $notification->link = url("/student/myteachers");
        $notification->read = 0;
        $notification->delete = 0;
        $notification->save();

        $req->status=2;
        $req->save();
        return "Deleted";

        }
    }
    public function accept_student(Request $request)
    {
        $req = dtrequest::find($request->get("id"));
        $script = $req->script;
        if ($script == "accept_student") {
            
        $notification = new notification;
        $notification->from = Auth::user()->id;
        $notification->to = $req->from;
        $notification->content = "<a href='".url("/profile/".Auth::user()->id)."'><b>".Auth::user()->name."</b></a>". " has accepted your teacher request.";
        $notification->action = 0;
        $notification->link = url("/student/myteachers");
        $notification->read = 0;
        $notification->delete = 0;
        $notification->save();

        $req->status=1;
        $req->save();

        $relation = new relation;
        $relation->student = $req->from;
        $relation->teacher = $req->to;
        $teacher = User::find($req->to);
        $teachers = teacher::where([['email','=',$teacher->email],['phone','=',$teacher->phone]])->first();
        $relation->subject = $teachers->subject;
        $relation->school = $teachers->school;
        $relation->save();
        return "Approved";

        }
    }
    public function delete_notifications(Request $request)
    {
        $nt  = notification::find($request->get("id"));
        $nt->delete=1;
        $nt->save();
        return "deleted";
    }
    public function request(Request $request)
    {

        $user = Auth::id();
        $id = $request->get("id");
        if ($r = dtrequest::where([["from","=",$user],["to","=",$id],["script","=","accept_student"]])->first()) {
            $actions = $r->actions;
            notification::where('action','=',$actions)->first()->delete();
            $r->delete();
            return "Request";
        }else{
        $actions = time();
        $r = new dtrequest;
        $r->from = $user;
        $r->to =  $id;
        $r->content = "<a href='".url("/profile/".$user)."'><b>".Auth::user()->name."</b></a> requested you as a student.";
        $r->actions = $actions;
        $r->script = "accept_student";
        $r->status = 0;
        $r->save();

        $notification = new notification;
        $notification->from = $user;
        $notification->to = $id;
        $notification->content = "You have a new student request from "."<a href='".url("/profile/".$user)."'><b>".Auth::user()->name."</b></a>";
        $notification->action = $actions;
        $notification->link = url("/teacher/requests");
        $notification->read = 0;
        $notification->delete = 0;
        $notification->save();
        return "Undo Request";
        }
    }
    public function veri_teachers(Request $request)
    {
        $search = $request->get("search");
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `school` LIKE '%$search%' OR `phone` LIKE '%$search%') And verify=0 AND (type=2 OR type=4)";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY name ASC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = teacher::where([["email", "=", $value->email], ["phone", "=", $value
                ->phone]])
                ->first();
            array_push($status, $teachers);
        }
        return json_encode([$result, [count($total) , $page, $limit], $status]);
    }
    public function teacherlist(Request $request)
    {
        $search = $request->get("search");
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `school` LIKE '%$search%') And verify=1 AND type=2";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY name ASC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = teacher::where([["email", "=", $value->email], ["phone", "=", $value
                ->phone]])
                ->first();
            array_push($status, $teachers);

            if($dtrequest = dtrequest::where([["from", "=", Auth::id()], ["to", "=", $value
                ->id]])
                ->first()){
                if ($dtrequest->status==1) {
                $result[$c]->text = "Request Accepted";
                }else{
                $result[$c]->text = "Undo Request";
                }
            }else{
                $result[$c]->text = "Request";
            }

        }
        return json_encode([$result, [count($total) , $page, $limit], $status]);
    }

    public function mytutors(Request $request)
    {
        $search = $request->get("search");
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `school` LIKE '%$search%') And verify=1 AND type=4";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY name ASC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY name ASC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = teacher::where([["email", "=", $value->email], ["phone", "=", $value
                ->phone]])
                ->first();
            array_push($status, $teachers);

            if($dtrequest = dtrequest::where([["from", "=", Auth::id()], ["to", "=", $value
                ->id]])
                ->first()){
                if ($dtrequest->status==1) {
                $result[$c]->text = "Request Accepted";
                }else{
                $result[$c]->text = "Undo Request";
                }
            }else{
                $result[$c]->text = "Request";
            }

        }
        return json_encode([$result, [count($total) , $page, $limit], $status]);
    }

    public function myteacherlist(Request $request)
    {
        $search = Auth::id();
        $and = "relations WHERE (`student` = '$search')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = User::where("id", "=", $value->teacher)
                ->first();
            $result[$c]->subject = $teachers->subject;
            $result[$c]->school = $teachers->school;
            $result[$c]->school_address = $teachers->school_address;
            $result[$c]->name = $teachers->name;
            $result[$c]->email = $teachers->email;
            $result[$c]->teacher = $teachers->id;

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }


    public function my_class(Request $request)
    {
        $search = Auth::id();
        $and = "classes WHERE (`user` = '$search')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = User::where("id", "=", $value->teacher)
                ->first();
            $result[$c]->subject = $teachers->subject;
            $result[$c]->school = $teachers->school;
            $result[$c]->school_address = $teachers->school_address;
            $result[$c]->name = $teachers->name;
            $result[$c]->email = $teachers->email;
            $result[$c]->teacher = $teachers->id;

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }


    public function rmv_req(Request $request)
    {
        $id = $request->get("id");
        $withdraw = withdraw::find($id);
        if ($withdraw->status==1) {
            return "Request already Accepted";
        }else{
            $withdraw->delete();
            return "Deleted";
        }
    }
    public function accept_with(Request $request)
    {
        $id = $request->get("id");
        $withdraw = withdraw::find($id);
            $withdraw->status=1;
            $withdraw->save();
            return "Accepted";
        
    }
    public function reject_with(Request $request)
    {
        $id = $request->get("id");
        $withdraw = withdraw::find($id);
            $withdraw->status=2;
            $withdraw->save();
            return "Rejected";
        
    }

    public function amt(Request $request)
    {
        $search = Auth::id();
        $and = "withdraws WHERE (`user` = '".Auth::id()."')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->updated_at = date("Y/m/d h:i a", strtotime($value->updated_at));

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function amts(Request $request)
    {
        $search = Auth::id();
        $and = "withdraws WHERE (`status` = '0')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }

    public function mystudentlist(Request $request)
    {
        $search = Auth::id();
        $and = "relations WHERE (`teacher` = '$search')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = User::where("id", "=", $value->student)
                ->first();
            $result[$c]->subject = $teachers->subject;
            $result[$c]->name = $teachers->name;
            $result[$c]->email = $teachers->email;
            $result[$c]->teacher = $teachers->id;

            $student = student::where("email","=",$value->email)->first();
            $result[$c]->id_number = $student->id_number;
            $result[$c]->id_proof = $student->id_proof;


        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }

    public function mystudentlistofmark(Request $request)
    {
        $search = Auth::id();
        $and = "relations WHERE (`teacher` = '$search')";

        // $page = 1;
        $page = $request->get("page");
        $limit = 15;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $teachers = User::where("id", "=", $value->student)
                ->first();
            $result[$c]->subject = $teachers->subject;
            $result[$c]->name = $teachers->name;
            $result[$c]->email = $teachers->email;
            $result[$c]->teacher = $teachers->id;

            $student = student::where("email","=",$value->email)->first();
            $result[$c]->id_number = $student->id_number;
            $result[$c]->id_proof = $student->id_proof;


        }
        return json_encode([$result, [count($total) , $page, $limit]]);
    }
    public function veri_success(Request $request)
    {
        $id = $request->get("id");
        $user = User::find($id);
        $user->verify = 1;
        $user->save();
        return "Verified";
    }
    public function remove_teacher(Request $request)
    {
        $id = $request->get("id");
        $user = relation::find($id);
        $student = $user->student;
        $teacher = $user->teacher;
        $user->delete();

        $dt = dtrequest::where([["from","=",$student],["to","=",$teacher]])->first();
        $dt->delete();
        return "Deleted.";
    }
    public function teacher_registered(Request $request)
    {
        $type = $request->get("type");
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

        if ($request->hasFile('id_proof'))
        {
            $r = $request->file('id_proof')
                ->getPathName();
            // Save the image
            $path = public_path() . "/image/";
            $id_proof = time() . rand() . $request->file('id_proof')
                ->getClientOriginalName();
            move_uploaded_file($r, $path . "0" . $id_proof);
        }
        else
        {
            return back()->with("message", "Your File is not readable");
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
        if ($teacher->save())
        {
            $user = new User;
            $user->type = $type;
            $user->email = $email;
            $user->phone = $phone;
            $user->school = $school;
            $user->name = $name;
            $user->verify = 0;
            $user->password = Hash::make($password);
            $user->save();
            return back()
                ->with("success", "Hi $name!\nYour account is waiting for verification. Our team will contact you soon.");
        }
        else
        {
            return back()->with("message", "Your account is waiting for verification. Our team will contact you soon.");
        }
    }


    public function teacher_update(Request $request)
    {
        $name = $request->get("name");
        $email = $request->get("email");
        $phone = $request->get("phone");
        $id_number = $request->get("id_number");
        $id_proof = $request->get("id_proof");
        $school = $request->get("school");
        $school_address = $request->get("school_address");
        $educational_qualifications = $request->get("educational_qualifications");
        $subject = $request->get("subject");
        $teacher = teacher::where("email","=",$email)->first();

        if ($request->hasFile('id_proof'))
        {
            $r = $request->file('id_proof')
                ->getPathName();
            // Save the image
            $path = public_path() . "/image/";
            $id_proof = time() . rand() . $request->file('id_proof')
                ->getClientOriginalName();
            move_uploaded_file($r, $path . "0" . $id_proof);
        }
        else
        {
            $id_proof=$teacher->id_proof;
        }

        $teacher->name = $name;
        $teacher->email = $email;
        $teacher->phone = $phone;
        $teacher->id_number = $id_number;
        $teacher->id_proof = $id_proof;
        $teacher->school = $school;
        $teacher->school_address = $school_address;
        $teacher->educational_qualifications = $educational_qualifications;
        $teacher->subject = $subject;
        if ($teacher->save())
        {
            $user = User::where("email","=",$email)->first();
            $user->type = 2;
            $user->email = $email;
            $user->phone = $phone;
            $user->school = $school;
            $user->name = $name;
            $user->save();
            return back()
                ->with("success", "Account Info Updated.");
        }
        else
        {
            return back()->with("message", "Failed to Update Account Info.");
        }
    }

    public function student_update(Request $request)
    {
        $name = $this->null($request->get("name"));
        $email = $this->null($request->get("email"));
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
        $student = student::where("email","=",$email)->first();

        if ($request->hasFile('id_proof'))
        {
            $r = $request->file('id_proof')
                ->getPathName();
            // Save the image
            $path = public_path() . "/image/";
            $id_proof = time() . rand() . $request->file('id_proof')
                ->getClientOriginalName();
            move_uploaded_file($r, $path . "0" . $id_proof);
        }
        else
        {
            $id_proof = $student->id_proof;
        }

        $student->name = $name;
        $student->email = $email;
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

        if ($student->save())
        {
            $user = User::where("email","=",$email)->first();
            $user->type = 3;
            $user->email = $email;
            $user->phone = $phone;
            $user->school = '';
            $user->name = $name;
            $user->verify = 1;
            $user->save();
            return back()
                ->with("success", "Account Info Updated.");
        }
        else
        {
            return back()->with("message", "Failed to Update account info.");
        }

    }


    public function student_registered(Request $request)
    {
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

        if ($request->hasFile('id_proof'))
        {
            $r = $request->file('id_proof')
                ->getPathName();
            // Save the image
            $path = public_path() . "/image/";
            $id_proof = time() . rand() . $request->file('id_proof')
                ->getClientOriginalName();
            move_uploaded_file($r, $path . "0" . $id_proof);
        }
        else
        {
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

        if ($student->save())
        {
            $user = new User;
            $user->type = 3;
            $user->email = $email;
            $user->phone = $phone;
            $user->school = '';
            $user->name = $name;
            $user->verify = 1;
            $user->password = Hash::make($password);
            $user->save();
            return back()
                ->with("success", "Hi $name!\nYour account created successfuly. Login and choose your teachers to go on!");
        }
        else
        {
            return back()->with("message", "There is an error to create your account. Please try agian.");
        }

    }

    public function null($val)
    {
        if (empty($val))
        {
            return "";
        }
        else
        {
            return $val;
        }
    }


    
}

