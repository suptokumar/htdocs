<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use DB;
use Auth;
use Hash;
use App\Models\User;
use App\Models\Member;
use App\Models\fees;
use Illuminate\Http\RedirectResponse;
class SiteController extends Controller
{
    public function home(){
        // Artisan::call('cache:clear');
        $members = Member::all()->count();
        $m = date("m");
        $d = date("d");
        $y = date("Y");
        $total_col = DB::select("SELECT * FROM fees WHERE year(updated_at)='$y' AND month(updated_at)='$m' AND day(updated_at)='$d'");
        $k=0;
        foreach ($total_col as $key) {
            $k+= $key->paid;
        }
        $total_col = DB::select("SELECT * FROM fees");
        $j=0;
        foreach ($total_col as $key) {
            $j+= $key->paid;
        }
        $total_col = DB::select("SELECT * FROM fees");
        $w=0;
        foreach ($total_col as $key) {
            $w+= ($key->fee)-($key->paid);
        }
        $total_col = DB::select("SELECT * FROM fees WHERE year(updated_at)='$y' AND month(updated_at)='$m'");
        $e=0;
        foreach ($total_col as $key) {
            $e+= ($key->fee)-($key->paid);
        }
    	return view("home",['member'=>$members,'total_col'=>$j,'today_col'=>$k,'total_due'=>$w,'mon_due'=>$e]);
    }
    public function add_member(){
        $members = DB::table('members')->orderBy('id','desc')->get();
        return view("add_member",['members'=>$members]);
    }
    public function add_month(){
        $members = DB::table('members')->orderBy('name')->get();
        return view("add_month",['members'=>$members]);
    }
    public function collect($rd){
        $members = fees::find($rd);
        return view("collect",['members'=>$members]);
    }
    public function collected(request $req){
        $members = fees::find($req->get('id'));
        $r = $members->paid;
        $members->paid = $r+$req->get('fee');
        $members->save();
        return redirect("user_payment")->with('success',['success',"Collected ".$req->get('fee')." Taka from ".$members->name]);
    }
    public function user_payment(){
        $members = DB::select('select * from fees WHERE paid<fee ORDER BY name ASC');
        return view("user_payment",['members'=>$members]);
    }
    public function apply_months(){
        $members = DB::table('members')->orderBy('name')->get();
        $id = [];
        foreach ($members as $key) {
            array_push($id,$key->id);
        }
        $status=$this->apply_month($id);
        return back()->with("status",$status);
    }
    public function appsly_monsth_one($rd){
        $status=$this->apply_month([$rd]);
        return redirect("add_month")->with("status",$status);
    }
    public function apply_month($id){
        $month = date("M/Y");
        $changed = 0;
        for ($i=0; $i < count($id); $i++) { 
        $m = Member::find($id[$i]);
        if ($m->month==$month) {
            continue;
        }
        $student = new fees;
        $student->name = $m->name;
        $student->phone = $m->phone;
        $student->month = $month;
        $student->fee = $m->fee;
        $student->paid = 0;
        if($student->save()){
        $changed++;
        $m->month = $month;
        $m->save();
        }
        }
        if (count($id)>1) {
        return ["success","Applied Fees of ".$month." to ".$changed."/".count($id)." Members"];
        }else{
        return ["success","Successfuly Added This monthly fees to ".$m->name];
        }
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
    public function add_members(request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required|min:10',
            'fee'=>'required'
        ]);

        $user = Member::updateOrCreate(
    ['id' =>  request('id')],
    ['phone' => $request->get('phone'),'name' => $request->get('name'),'fee' => $request->get('fee')]
);
if(!$user->wasRecentlyCreated && $user->wasChanged()){
    return redirect("add_member")->with("success",['success',"Successfully Updated User ". $request->get('name')]);
}

if(!$user->wasRecentlyCreated && !$user->wasChanged()){
    return redirect("add_member")->with("success",['danger',"Failed to Save User ". $request->get('name')]);
    // updateOrCreate performed nothing, row did not change
}

if($user->wasRecentlyCreated){
   // updateOrCreate performed create
    return redirect("add_member")->with("success",['success',"Successfully Created User ". $request->get('name')]);
}
    }
    public function login(){
        if (Auth::check()) {
            return redirect('account');
        }else{
        return view("login",["register"=>[0,1]]);
        }
    }

    public function logme(Request $request){
        if (Auth::check()) {
            return redirect('account');
        }else{
            $this->validate($request,[
                'Email_or_Phone_number'=>'required',
                'password'=>'required|alphaNum|min:4'
            ]);

            $user_details2s = [
                'email'=>$request->get("Email_or_Phone_number"),
                'password'=>$request->get("password")
            ];
            if (Auth::attempt($user_details2s, true)) {
                if ($request->get("redirect")=='') {
                    return redirect('/');
                }
                return new RedirectResponse($request->get("redirect"));
            }else{
                $user_details2 = [
                'Phone_Number'=>$request->get("Email_or_Phone_number"),
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
    
    public function logout(){
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }else{
        return back();
        }
    }
    
    public function about(){
    	return view("about",["lan"=>array("bangla","english","hindi","tamil","malika","salika","mayan")]);
    }
    public function contact(){
        $users = DB::table('users')->paginate(5);
        // $users = DB::select('select * from users');
    return view('contact',['users'=>$users]);
    }
    public function make(){
    	return "This is a make page";
    }
    public function news(){
    	return view("news");
    }
    public function name($namevalue){
    	return view("about", ["name"=>$namevalue]);
    }
}
