<?php

  namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Employee extends Model
{
    protected $table = 'employee';
    public static function emp_insert($em_name,$em_lastname,$em_gender,$em_age,$em_address,$em_phone,$em_position,$em_username,$em_password,$em_status)
    { 
            $emp=array(
                "em_name"=> $em_name,
                "em_lastname"=> $em_lastname,
                "em_address"=> $em_address,
                "em_phone"=> $em_phone,
                "em_position"=> $em_position,
                "em_gender"=> $em_gender,
                "em_username"=> $em_username,
                "em_password"=>md5($em_password),
                "em_age"=> $em_age,
                "em_status"=> $em_status
            );
   
   
    
        DB::table("employee")->insert($emp);
    }
     public static function login($username,$password){
     $Pass=md5($password); //เข้ารหัสข้อมูล 
          $data=DB::table("employee") //รับข้อมูลจากdatabase 
          ->where("em_user","=",$username) //ระบุเงื่อนไข ถ้า em_user=username ผลลัพธ์ ถ้าจริงจะหาข้อมูลเจอ ถ้าไม่จริงจะไม่ส่งข้อมูลมา
            ->where("em_password","=",$Pass)
          ->get(); //getคือดึงข้อมูล

        $row=count($data); //นับแถว 

        return $row; //ส่งให้controlerเช็ค ว่าถ้าrow=1 login นอกจากนั้นloginไม่ได้
        
      

    }
    
     public static function checkName($em_name,$em_lastname){
         $data=DB::table("employee")
         ->where("em_name","=",$em_name)
         ->where('em_lastname','=',$em_lastname)
         ->get();
         $row=count($data);
        return $row  ;  //สร้างเพื่อเช็คข้อมูลว่าซ้ำในดาต้าเบสไหม ขั้นตอนการสมัคร

    }
    public static function checkUser($em_username){
        $data=DB::table("employee")
        ->where("em_username","=",$em_username)
        ->get(); //getคือดึงข้อมูล
        $row=count($data); 
       return $row;
       

    }

   public static function emp_Update($em_id,$em_name,$em_lastname,$em_address,$em_phone,$em_password,$em_age){
       $update=array(
        "em_name"=> $em_name,
        "em_last"=> $em_lastname,
        "em_address"=> $em_address,
        "em_phone"=> $em_phone,
        "em_password"=>md5($em_password),
        "em_age"=> $em_age
       );

        DB::table("employee")->where("em_id","=",$Em_id)->update($update);

    }
    public static function emp_Delete($em_id){ //สร้างเพื่อ ลบข้อมูลผู้ใช้

        DB::table("employee")
        ->where("em_id","=",$em_id) 
        ->delete();



    }

    
    public static function loadDataEmp($username){ //โหลดข้อมูลผู้ใช้
        $data=DB::table("employee")
       ->where("em_username","=",$username)
       ->get();
       
        return $data; //ส่งข้อมูลผู้ใช้ให้คอนโทลเลอร์
    }

    public static function loadAllEmp(){
        $data=DB::table("employee")
        ->get();
        return $data;


    }
}

    
