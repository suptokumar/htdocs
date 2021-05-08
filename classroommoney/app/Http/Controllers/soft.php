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
use App\Models\student;
use App\Mail\email;
use App\Models\dtrequest;
use Illuminate\Support\Facades\Mail;
use DB;
use File;
use Image;
class soft extends Controller
{
    public function index()
    {
        if (Auth::user()->type == "1")
        {
            return view("admin.index");
        }
        else
        {
            return view("index");
        }
    }
    public function teachers()
    {
        return view("admin.teachers");
    }
    public function requestpage()
    {
        return view("requestpage");
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
    public function teach()
    {
        return view("teach");
    }
    public function mystudents()
    {
        return view("mystudents");
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
        $and = "users WHERE (`name` LIKE '%$search%' OR `email` LIKE '%$search%' OR `school` LIKE '%$search%' OR `phone` LIKE '%$search%') And verify=0 AND type=2";

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
            $user->type = 2;
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

