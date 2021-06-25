<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\paymentdetail;
use App\Models\exchangeconfigure;
use App\Models\exchange;
use App\Models\User;
use App\Models\plan;
use App\Models\idmanager;
use App\Models\notification;
use App\Models\deposit;
use App\Models\withdrawal;
use App\Models\withrecord;
use DB;
use Hash;
use Auth;
use App\Http\Controllers\soft;
class withdrawcontroller extends Controller
{
    function __construct()
    {
        $this->limit = 30;
    }

        // Start OF Withdrawal Management
    public function withdrawal()
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            return view("withdrawal.withdrawal");
        }else{
            return redirect("permissionerror");
        }
    }

    public function createwithdrawal()
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $user= User::where("role","=","User")->get();
            $gateway = paymentdetail::get();
            return view("withdrawal.createwithdrawal",['users'=>$user,'gateway'=>$gateway]);
        }else{
            return redirect("permissionerror");
        }
    }
    public function addwithdrawalrequest(Request $request)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {

                $id = new withdrawal;






 $id->idm = time();
            $id->info = $request->get('info');
            $id->username = soft::getuserbyphone($request->get('username'))->name;
            $id->phone = $request->get('phone');
            $id->amount = $request->get('amount');
            $id->currency = empty($request->get('currency'))?'USD':$request->get('currency');
            $id->status = empty($request->get('status'))?'pending':$request->get('status');
            $id->gateway = $request->get('gateway');
            $id->save();

            return back()->with("success",__("withdrawal Request created successfuly."));

        }else{
            return __("Permission Denied");
        }
    }


    public function load_withdraw(Request $request)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
                $search = $request->get("search");
        $type = $request->get("type");
        if ($type=='') {
        $and = "withdrawals WHERE (`username` LIKE '%$search%' OR `idm` LIKE '%$search%' OR `phone` LIKE '%$search%')";
        }else{
        $and = "withdrawals WHERE (`username` LIKE '%$search%' OR `idm` LIKE '%$search%' OR `phone` LIKE '%$search%') AND status='$type'";
        }

        // $page = 1;
        $page = $request->get("page");
        $limit = $this->limit;
        $from = ($page - 1) * $limit;
        $result = DB::select("SELECT * FROM " . $and . " ORDER BY CASE
WHEN idm='$search' THEN 0
WHEN username='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN username LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN username LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN username LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN username LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN username LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN username LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN username LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN username LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN username LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN username LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN username LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11

 END,

            id DESC LIMIT $from,$limit;
            ");
        $total = DB::select("SELECT id FROM " . $and . " ORDER BY CASE
WHEN username='$search' THEN 0
WHEN phone='$search' THEN 0
WHEN username LIKE '$search%' THEN 1
WHEN phone LIKE '$search%' THEN 1
WHEN username LIKE '_$search%' THEN 2
WHEN phone LIKE '_$search%' THEN 2
WHEN username LIKE '__$search%' THEN 3
WHEN phone LIKE '__$search%' THEN 3
WHEN username LIKE '___$search%' THEN 4
WHEN phone LIKE '___$search%' THEN 4
WHEN username LIKE '____$search%' THEN 5
WHEN phone LIKE '____$search%' THEN 5
WHEN username LIKE '_____$search%' THEN 6
WHEN phone LIKE '_____$search%' THEN 6
WHEN username LIKE '______$search%' THEN 7
WHEN phone LIKE '______$search%' THEN 7
WHEN username LIKE '_______$search%' THEN 8
WHEN phone LIKE '_______$search%' THEN 8
WHEN username LIKE '________$search%' THEN 9
WHEN phone LIKE '________$search%' THEN 9
WHEN username LIKE '_________$search%' THEN 10
WHEN phone LIKE '_________$search%' THEN 10
WHEN username LIKE '__________$search%' THEN 11
WHEN phone LIKE '__________$search%' THEN 11
 END,
            id DESC;
            ");
        $status = [];
        foreach ($result as $c => $value)
        {
            $result[$c]->created_at = date("Y/m/d h:i a", strtotime($value->created_at));
            $result[$c]->updated_at = date("Y/m/d h:i a", strtotime($value->updated_at));
            // $result[$c]->exchange = exchange::find($value->exchange)->name;
            // $result[$c]->idm = idmanager::find($value->idm)->username;

        }
        return json_encode([$result, [count($total) , $page, $limit]]);
        }else{
            return redirect("permissionerror");
        }
    }



    public function deletewithdrawal(Request $request)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $withdrawal = withdrawal::find($request->get("id"));
            if ($withdrawal->delete()) {
                soft::send($withdrawal->username,$withdrawal->phone, "Your withdrawal request of ".$withdrawal->amount." ".$withdrawal->currency." was deleted", Auth::user()->name,0);
                return __("Deleted");
            }else{
                return __("Failed");
            }
        }else{
            return redirect("permissionerror");
        }
    }
    public function declinewithdrawalse(Request $request)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $withdrawal = withdrawal::find($request->get("id"));
            $withdrawal->status = "declined";
            if ($withdrawal->save()) {
                soft::send($withdrawal->username,$withdrawal->phone, "Your Deposit request of ".$withdrawal->amount." ".$withdrawal->currency." was declined. cause ".$request->get("declinecause"), Auth::user()->name,0);
               return back();
            }else{
                return back();
        }
    }else{
            return redirect("permissionerror");
        }
    }
    public function declinewithdrawal($id)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $withdrawal = withdrawal::where("id","=",$id)->first();
            return view("withdrawal.declinewithdrawal",['withdrawal'=>$withdrawal]);
        }else{
            return redirect("permissionerror");
        }
    }
    public function withdrawaldetails($id)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $withdrawal = withdrawal::where("id","=",$id)->first();
            $user = user::where("phone","=",$withdrawal->phone)->first();
            return view("withdrawal.details",['withdrawal'=>$withdrawal,'user'=>$user]);
        }else{
            return redirect("permissionerror");
        }
    }
   public function addwithdrawalrequestapprove(Request $request)
    {
        if (soft::power(Auth::id(),"withdrawal",0)) {
            $withdrawal = withdrawal::find($request->get("id"));
            $withdrawal->status = "approved";
            if ($withdrawal->save()) {
                soft::send($withdrawal->username,$withdrawal->phone, "Your Deposit request of ".$withdrawal->amount." ".$withdrawal->currency." was approved", Auth::user()->name,0);
            return __("Approved");
            }else{
                return __("Failed");
        }
    }else{
            return redirect("permissionerror");
        }
    }

}
