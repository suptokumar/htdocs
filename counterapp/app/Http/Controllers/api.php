<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;
class api extends Controller
{
	public function __construct()
	{
		$this->key = "15450awfe41g0wag101sd74744sag4ahasdfe";
	}
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
        if ($request->get("key")!='15450awfe41g0wag101sd74744sag4ahasdfe') {
            return "Invalid API key";
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
                if ($request->get("view")=='boot') {
                	
                $sm .= "<h2 style='text-align: center; font-family: tahoma; font-size: 18px;'>Entered Number: ".$numbercopy."</h2><br><div class='alert alert-success'>Interpretation 1: ".$int1[$pt1]."</div><div class='alert alert-success'>Interpretation 2: ".$int2[$pt2]."</div><div class='alert alert-success'>Interpretation 3: ".$int3[$pt3]."</div><div class='alert alert-primary'>Overall Interpretation: <br>".$int1[$pt1]."<br>".$int2[$pt2]."<br>".$int3[$pt3]."<br></div>";


                $sm .="<div style='text-align: center;'><button onclick='back()' class='btn btn-info' style='width: 330px;'>Back</button></div>";
        }
                else{
                	$smm = array("int1"=>$int1[$pt1],"int2"=>$int2[$pt2],"int3"=>$int3[$pt3]);
                	$sm = json_encode($smm);
                return $sm;
                }
                }

                return $sm;



    }
}
