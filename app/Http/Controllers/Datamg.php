<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Employee;
use App\Member;
use App\Milk;
use App\equip;
use App\cooper;
use App\partners;
class Datamg extends Controller
{

    public function Dataem(){ //หน้าข้อมูลผู้ใช้
        $data['employee']=Employee::loadAllEmp();

        return view('dataem',$data);
    }
    public function Datamem(){ //หน้าข้อมูลสมาชิก
        $data['member']=Member::loadAllmb();
        return view('datamem',$data);
    }
    public function Datamilk(){ //หน้าข้อมูลน้ำนม
        $data['milk']=Milk::loadAllMilk();
        return view('datamilk',$data);
    }
    public function Datapro(){ //หน้าข้อมูลอุปกรณ์
        $data['equip']=equip::loadAllEquip();
        return view('datapro',$data);
    }
    public function Dataagent(){ //หน้าข้อมูลคู่ค้า
        $data['agent']=partners::loadAllPartners();
        return view('dataagent',$data);
    }
    public function Datacoop(){ //หน้าข้อมูลสหกรณ์
        $data['cooper']=cooper::loadAllCooper();
        return view('datacoop',$data);
    }
    public function Loaduser(){ //โหลดข้อมูลผู้ใช้
        $alldata=Employee::loadAllData();
        return $alldata;
    }
    public function CheckUser(Request $req){ //เช็คข้อมูลผู้ใช้
        $name=$req->input('fname');
        $lastname=$req->input('lname');
        $username=$req->input('username');
        $resultname=Employee::checkName($name,$lastname);
        $resultusername=Employee::checkUser($username);
        $data=array(
            'resultname'=>$resultname,
            'resultusername'=>$resultusername
        );
        return $data;
    }
    public function Savedataem(Request $req){ //บันทึกข้อมูลผุ้ใช้
        $name=$req->input('firstname');
        $lastname=$req->input('lastname');
        $gender=$req->input('gender');
        $age=$req->input('old');
        $address=$req->input('address');
        $tel=$req->input('number');
        $position=$req->input('position');
        $username=$req->input('username');
        $password=$req->input('password');
        Employee::emp_insert($name,$lastname,$address,$tel,$position,$gender,$username,$password,$age);
        Session::put('save','success');
        return redirect('dataem');
    }
    public function Deleteuser($id){ //ลบข้อมูลผู้ใช้
        Employee::Delete_Emp($id);
        Session::put('delete','success');
        return redirect('dataem');
    }
    public function Detailuser($id){ //แสดงรายละเอียดผู้ใช้
        $data['user']=Employee::loadDataEmp($id);
       return view ('show_dataem',$data);
    }
    public function Updateuser(Request $req){ //แสดงหน้าอัพเดตผู้ใช้
        $Em_id=$req->input('Em_id');
        $em_name=$req->input('firstname');
        $em_lastname=$req->input('lastname');
        $em_address=$req->input('address');
        $em_phone=$req->input('number');
        $em_position=$req->input('position');
        $em_gender=$req->input('gender');
        $em_user=$req->input('username');
        $em_password=$req->input('password');
        $em_age=$req->input('old');
        Employee::Update_emp($Em_id,$em_name,$em_lastname,$em_address,$em_phone,$em_position,$em_gender,$em_user,$em_password,$em_age);
        Session::put('save','success');
        return redirect ('detailuser/'.$Em_id);
    }
    public function Editdataem($id){ //แก้ไขข้อมูลผู้ใช้
        $data['user']=Employee::loadDataEmp($id);
        return view('edit_dataem',$data);
    }



    public function Loadmem(){ //โหลดข้อมูลสมาชิก
        $member=Member::loadAllMember();
        return $member;
    }
    public function Checkmember(Request $req){//เช็คข้อมูลสมาชิก
        $mb_name=$req->input('firstname');
        $mb_lastname=$req->input('lastname');
        $resultname=Member::checkMb_name($mb_name,$mb_lastname);
        return $resultname;
    }
    public function Savemember(Request $req){ //บันทึกข้อมูลสมาชิก
        $mb_name=$req->input('firstname');
        $mb_lastname=$req->input('lastname');
        $mb_address=$req->input('address');
        $mb_phone=$req->input('number');
        $mb_gender=$req->input('gender');
        $mb_age=$req->input('old');
        Member::mb_insert($mb_name,$mb_address,$mb_phone,$mb_lastname,$mb_gender,$mb_age);
        Session::put('save','success');
        return redirect('datamem');
    }
    public function Deletemem($id){ //ลบสมาชิก
        Member::Delete_mem($id);
        Session::put('delete','success');
        return redirect('datamem');
    }
    public function Detailmem($id){ //แสดงรายละเอียดข้อมูลสมาชิก
        $data['member']=Member::loadAllMember($id);
       return view ('show_datamem',$data);
    }
    public function Updatemem(Request $req){ //แสดงหน้าอัพเดตสมาชิก
        $mb_id=$req->input('Mb_id');
        $mb_name=$req->input('firstname');
        $mb_lastname=$req->input('lastname');
        $mb_address=$req->input('address');
        $mb_phone=$req->input('number');
        $mb_gender=$req->input('gender');
        $mb_age=$req->input('old');
        Member::Update_mb($mb_id,$mb_name,$mb_address,$mb_phone,$mb_lastname,$mb_gender,$mb_age);
        Session::put('save','success');
        return redirect ('detailmem/'.$mb_id);
    }
    public function Editdatamem($id){ //แก้ไขข้อมูลสมาชิก
        $data['member']=Member::loadAllMember($id);
        return view('edit_datamem',$data);
    }



    public function Loadmilk(){ //โหลดน้ำนม
        $AllMilk=Milk::loadAllMilk();
        return $AllMilk;
    }
    public function Checkmilk(Request $req){ //เช็คน้ำนม
        $milk_gread=$req->input('milk');
        $milk_gread=Milk::checkmilk_grede($milk_grede);
        return $milk_grede;
    }
    public function Savemilk(Request $req){ //บันทึกข้อมูลน้ำนม
        $milk_grede=$req->input('milk_grede');
        $milk_weight=$req->input('milk_weight');
        $milk_in=$req->input('milk_in');
        $milk_out=$req->input('milk_out');
        Milk::milk_insert( $milk_grede,$milk_weight, $milk_in,$milk_out);
        Session::put('save','success');
        return redirect('datamilk');
    }
    public function Deletemilk($id){ //ลบน้ำนม
        Milk::Delete_milk($id);
        Session::put('delete','success');
        return redirect('datamilk');
    }
    public function Detailmilk($id){ //แสดงรายละเอียดข้อมูลน้ำนม
        $data['milk']=Milk::loadAllMilk($id);
       return view ('show_datamilk',$data);
    }
    public function Updatemilk(Request $req){ //แสดงหน้าอัพเดตน้ำนม
        $milk_id=$req->input('Milk_id');
        $milk_grede=$req->input('milk_grede');
        $milk_weight=$req->input('milk_weight');
        $milk_in=$req->input('milk_in');
        $milk_out=$req->input('milk_out');
        Milk::Update_milk($milk_id,$milk_grede,$milk_weight,$milk_in,$milk_out);
        Session::put('save','success');
        return redirect ('detailmilk/'.$milk_id);
    }
    public function Editmilk($id){ //แก้ไขข้อมูลน้ำนม
        $data['milk']=Milk::loadAllMilk($id);
        return view('edit_datamilk',$data);
    }



    public function Loadpro(){ //โหลดอุปกรณ์
        $Allpro=equip::loadAllEquip();
        return $Allpro;
    }
    public function Checkpro(Request $req){ //เช็คอุปกรณ์
        $equ_name=$req->input('equip');
        $equ_name=equip::checkpro($equ_name);
        return $equ_name;
    }
    public function Savepro(Request $req){ //บันทึกข้อมูลอุปกรณ์
        $equ_name=$req->input('name');
        $equ_number=$req->input('number');
        $equ_price=$req->input('price');
        equip::pro_insert( $equ_name,$equ_number,$equ_price);
        Session::put('save','success');
        return redirect('datapro');
    }
    public function Deletepro($id){ //ลบอุปกรณ์
        equip::Delete_pro($id);
        Session::put('delete','success');
        return redirect('datapro');
    }
    public function Detailpro($id){ //แสดงรายละเอียดข้อมูลอุปกรณ์
        $data['equip']=equip::loadAllEquip($id);
       return view ('show_datapro',$data);
    }
    public function Updatepro(Request $req){ //แสดงหน้าอัพเดตอุปกรณ์
        $equ_id=$req->input('id');
        $equ_name=$req->input('firstname');
        $equ_cate=$req->input('amount');
        $equ_price=$req->input('price');
        equip::Update_equ($equ_id,$equ_name,$equ_price);
        Session::put('save','success');
        return redirect ('datapro');
    }
    public function Editpro($id){ //แก้ไขข้อมูลอุปกรณ์
        $data['equip']=equip::loadAllEquip($id);
        return view('editpro',$data);
    }


    public function Loadcoop(){ //โหลดหน้าสหกรณ์
        $Allcooper=cooper::loadAllCooper();
        return $Allcooper;
    }
    public function Savecooper(Request $req){ //บันทึกข้อมูลสหกรณ์
        $coop_name=$req->input('name');
        $coop_phone=$req->input('phone');
        $coop_address=$req->input('address');
        $coop_fax=$req->input('fax');
        $coop_logo=$req->input('logo');
        $coop_web=$req->input('web');
        $coop_email=$req->input('email');
        cooper::coop_insert();
        Session::put('save','success');
        return redirect('datacoop');
    }
    public function Deletecoop($id){ //ลบสหกรณ์
        cooper::Delete_coop($id);
        Session::put('delete','success');
        return redirect('datacoop');
    }
    public function Detailcoop($id){ //แสดงรายละเอียดข้อมูลสหกรณ์
        $data['coop']=cooper::loadAllCoop($id);
       return view ('show_coop',$data);
    }
    public function Updatecoop(Request $req){ //แสดงหน้าอัพเดตสหกรณ์
        $coop_id=$req->input('id');
        $coop_name=$req->input('');
        $coop_address=$req->input('');
        $coop_phone=$req->input('');
        cooper::coop_update($coop_id,$coop_name,$coop_address,$coop_phone);
        Session::put('save','success');
        return redirect ('datacoop');
    }
    public function Editcoop($id){ //แก้ไขข้อมูลสหกรณ์
        $data['coop']=cooper::loadAllCooper($id);
        return view('editcoop',$data);
    }


    public function Loadagent(){ //โหลดหน้าคู่ค้า
        $Allagent=partners::loadAllPartners();
        return $Allagent;
    }
    public function Checkagent(Request $req){ //เช็คคู่ค้า
        $agent_name=$req->input('agent');
        $agent_name=partners::checkagent($agent_name);
        return $agent_name;
    }
    public function Saveagent(Request $req){ //บันทึกข้อมูลคู่ค้า
        $agent_name=$req->input('name');
        $agent_address=$req->input('address');
        $agent_phone=$req->input('phone');
        partners::pn_insert($pn_name,$pn_address,$pn_phone);
        Session::put('save','success');
        return redirect('dataagent');
    }
    public function Deleteagent($id){ //ลบคู่ค้า
        partners::Delete_agent($id);
        Session::put('delete','success');
        return redirect('dataagent');
    }
    public function Detailagent($id){ //แสดงรายละเอียดข้อมูลคู่ค้า
        $data['agent']=partners::loadAllPartners($id);
       return view ('show_agent',$data);
    }
    public function Updateagent(Request $req){ //แสดงหน้าอัพเดตคู่ค้า
        $pn_id=$req->input('id');
        $pn_name=$req->input('');
        $pn_address=$req->input('');
        $pn_phone=$req->input('');
        partners::Update_Pn($pn_id,$pn_name,$pn_address,$pn_phone);
        Session::put('save','success');
        return redirect ('dataagent');
    }
    public function Editagent($id){ //แก้ไขข้อมูลคู่ค้า
        $data['agent']=partners::loadAllPartners($id);
        return view('editagent',$data);
    }

}




