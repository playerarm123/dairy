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
    public function __construct()
    {
        $this->middleware('checklogin');
    }

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
        $data['coop']=cooper::loadDatacoop(1);
        return view('datacoop',$data);
    }





   //ผู้ใช้งาน
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
        $phone=$req->input('number');
        $position=$req->input('position');
        $username=$req->input('username');
        $password=$req->input('password');
        Employee::emp_insert($name,$lastname,$gender,$age,$address,$phone,$position,$username,$password);
        Session::put('save','success');
        return redirect('dataem');
    }
    public function Deleteuser($id){ //ลบข้อมูลผู้ใช้
        Employee::emp_Delete($id);
        Session::put('delete','success');
    }
    public function Detailuser($id){ //แสดงรายละเอียดผู้ใช้
        $data['user']=Employee::loadDataEmp($id);
       return view ('show_dataem',$data);
    }
    public function Updateuser(Request $req){ //แสดงหน้าอัพเดตผู้ใช้
        $em_id=$req->input('Em_id');
        $em_name=$req->input('firstname');
        $em_lastname=$req->input('lastname');
        $em_address=$req->input('address');
        $em_phone=$req->input('number');
        $em_password=$req->input('password');
        $em_age=$req->input('old');
        Employee::emp_Update($em_id,$em_name,$em_lastname,$em_address,$em_phone,$em_password,$em_age);
        Session::put('save','success');
        return redirect ('detailuser/'.$em_id);
    }
    public function Editdataem($id){ //แก้ไขข้อมูลผู้ใช้
        $data['user']=Employee::loadDataEmp($id);
        return view('edit_dataem',$data);
    }
    public function Checkdluser($id){//เช็คก่อนลบuser
        $data = Employee::checkDelete($id);
        return $data;
    }





    //สมาชิก
    public function Loadmem(){ //โหลดข้อมูลสมาชิก
        $member=Member::loadAllMember();
        return $member;
    }
    public function Checkmember(Request $req){//เช็คข้อมูลสมาชิก
        $mb_name=$req->input('fname');
        $mb_lastname=$req->input('lname');
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
        Member::mb_insert($mb_name,$mb_lastname,$mb_address,$mb_phone,$mb_gender,$mb_age);
        Session::put('save','success');
        return redirect('datamem');
    }
    public function Deletemem($id){ //ลบสมาชิก
        Member::mb_Delete($id);
        Session::put('delete','success');
        return redirect('datamem');
    }
    public function Detailmem($id){ //แสดงรายละเอียดข้อมูลสมาชิก
        $data['member']=Member::loadDataMb($id);
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
        Member::mb_Update($mb_id,$mb_name,$mb_lastname,$mb_address,$mb_phone,$mb_gender,$mb_age);
        Session::put('save','success');
        return redirect ('detailmem/'.$mb_id);
    }
    public function Editdatamem($id){ //แก้ไขข้อมูลสมาชิก
        $data['member']=Member::loadDataMb($id);
        return view('edit_datamem',$data);
    }

    public function Checkdlmember($id){//เช็คก่อนลบสมาชิก
        $data=Member::checkDelete($id);
       return $data;
     }





    //น้ำนม
     public function Loadmilk(){ //โหลดน้ำนม
        $AllMilk=Milk::loadAllMilk();
        return $AllMilk;
    }
    public function Checkmilk(Request $req){ //เช็คน้ำนม
        $milk_grade=$req->input('milk');
        $milk_grade=Milk::checkmilk_grede($milk_grade);
        return $milk_grade;
    }
    public function Savemilk(Request $req){ //บันทึกข้อมูลน้ำนม
        $milk_grade=$req->input('milk_grade');
        $milk_weight=$req->input('milk_weight');
        $milk_pricein=$req->input('milk_pricein');
        $milk_priceout=$req->input('milk_priceout');
        Milk::milk_insert( $milk_grade,$milk_weight, $milk_pricein,$milk_priceout);
        Session::put('save','success');
        return redirect('datamilk');
    }
    public function Deletemilk($id){ //ลบน้ำนม
        Milk::Delete_milk($id);
        Session::put('delete','success');
        return redirect('datamilk');
    }
    public function Detailmilk($id){ //แสดงรายละเอียดข้อมูลน้ำนม
        $data['milk']=Milk::loadDataMilk($id);
       return view ('show_datamilk',$data);
    }
    public function Updatemilk(Request $req){ //แสดงหน้าอัพเดตน้ำนม
        $milk_id=$req->input('Milk_id');
        $milk_grade=$req->input('milk_grade');
        $milk_pricein=$req->input('milk_pricein');
        $milk_priceout=$req->input('milk_priceout');
        Milk::Update_milk($milk_id,$milk_grade,$milk_pricein,$milk_priceout);
        Session::put('save','success');

        return redirect ('detailmilk/'.$milk_id);
    }
    public function Editmilk($id){ //แก้ไขข้อมูลน้ำนม
        $data['milk']=Milk::loadDataMilk($id);
        return view('edit_datamilk',$data);
    }
    public function Checkdlmilk($id){//เช็คก่อนลบน้ำนม
        $data=Milk::checkDelete($id);
        return $data;
    }






    //อุปกรณ์
    public function Loadpro(){ //โหลดอุปกรณ์
        $Allpro=equip::loadAllEquip();
        return $Allpro;
    }
    public function Checkpro(Request $req){ //เช็คอุปกรณ์
        $eq_name=$req->input('equip');
        $eq_name=equip::checkEq_name($eq_name);
        return $eq_name;
    }
    public function Savepro(Request $req){ //บันทึกข้อมูลอุปกรณ์
        $eq_name=$req->input('name');
        $eq_cate=$req->input('cate');
        $eq_unit=$req->input('unit');
        $eq_price=$req->input('price');
        equip::insert_eq($eq_name,$eq_cate,$eq_unit,$eq_price);
        Session::put('save','success');
        return redirect('datapro');
    }
    public function Deletepro($id){ //ลบอุปกรณ์
        equip::Delete_eq($id);
        Session::put('delete','success');
        return redirect('datapro');
    }
    public function Detailpro($id){ //แสดงรายละเอียดข้อมูลอุปกรณ์
        $data['equip']=equip::loadDataEquip($id);
       return view ('show_datapro',$data);
    }
    public function Updatepro(Request $req){ //แสดงหน้าอัพเดตอุปกรณ์
        $eq_id=$req->input('eq_id');
        $eq_name=$req->input('name');
        $eq_cate=$req->input('cate');
        $eq_unit=$req->input('unit');
        $eq_price=$req->input('price');
        equip::Update_eq($eq_id,$eq_name,$eq_cate,$eq_unit,$eq_price);
        Session::put('save','success');
        return redirect ('detailpro/'.$eq_id);
    }
    public function Editpro($id){ //แก้ไขข้อมูลอุปกรณ์
        $data['equip']=equip::loadDataEquip($id);
        return view('edit_datapro',$data);
    }
    public function Checkdlpro($id){//เช็คก่อนลบอุปกรณ์
        $data=equip::checkDelete($id);
        return $data;
    }





   //คู่ค้า
    public function Loadagent(){ //โหลดหน้าคู่ค้า
        $Allagent=partners::loadAllPartners();
        return $Allagent;
    }
    public function Checkagent(Request $req){ //เช็คคู่ค้า
        $pn_name=$req->input('agent');
        $pn_name=partners::checkPn_name($pn_name);
        return $pn_name;
    }
    public function Saveagent(Request $req){ //บันทึกข้อมูลคู่ค้า
        $pn_name=$req->input('name');
        $pn_address=$req->input('address');
        $pn_phone=$req->input('phone');
        partners::insert_pn($pn_name,$pn_address,$pn_phone);
        Session::put('save','success');
        return redirect('dataagent');
    }
    public function Deleteagent($id){ //ลบคู่ค้า
        partners::Delete_pn($id);
        Session::put('delete','success');
        return redirect('dataagent');
    }
    public function Detailagent($id){ //แสดงรายละเอียดข้อมูลคู่ค้า
        $data['agent']=partners::loadDatapartner($id);
       return view ('show_dataagent',$data);
    }
    public function Updateagent(Request $req){ //แสดงหน้าอัพเดตคู่ค้า
        $pn_id=$req->input('pn_id');
        $pn_name=$req->input('name');
        $pn_address=$req->input('address');
        $pn_phone=$req->input('phone');
        partners::Update_Pn($pn_id,$pn_name,$pn_address,$pn_phone);
        Session::put('save','success');
        return redirect ('detailagent/'.$pn_id);
    }
    public function Editagent($id){ //แก้ไขข้อมูลคู่ค้า
        $data['agent']=partners::loadDatapartner($id);
        return view('edit_dataagent',$data);
    }
    public function Checkdlagent($id){//เช็คก่อนลบคู่ค้า
        $data=partners::checkDelete($id);
        return $data;
    }





    //สหกรณ์
    public function Savecooper(Request $req){ //บันทึกข้อมูลสหกรณ์
        $id = $req->input('id');
        $coop_name=$req->input('name');
        $coop_address=$req->input('address');
        $coop_phone=$req->input('phone');
        $coop_fax=$req->input('fax');
        $coop_email=$req->input('email');
        $logo = $req->file('logo');
        $coop_website=$req->input('website');
        if($req->input('save_type') == 'insert'){
            $coop_logo=$this->uploadlogo($logo);
            cooper::coop_insert($coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$coop_logo);
        }else{
            $coop_logo = $req->input('old_logo');
            if($logo){
                $coop_logo = $this->uploadlogo($logo);
            }

            cooper::coop_update($id,$coop_name,$coop_address,$coop_phone,$coop_fax,$coop_email,$coop_website,$coop_logo);
        }

        Session::put('save','success');
        return redirect('datacoop');
    }
    public function Editcoop($id){ //แก้ไขข้อมูลสหกรณ์
        $data['coop']=cooper::loadDatacoop($id);
        return view('edit_datacoop',$data);
    }
    public function uploadlogo($file){//ใช้อัพโหลดlogoขึ้นเซริฟเวอร์
        if($file){
            $mimetype = $file->getClientMimeType();
            if($mimetype != "image/jpeg" && $mimetype != "image/png"){ //เช็คชนิดไฟล์ว่าตรงตามเงื่อนไขไหม
                Session::put("alert_file","file_mismatch");
                return redirect('datacoop');
            }else{
                $file_extension = ($mimetype == "image/jpeg") ? ".jpg":".png"; //นามสกุลไฟล์
                $filename = 'logo'.$file_extension;
                $file->move("img",$filename);
                return $filename;
            }
        }else{
            return false;
        }
    }




    public function Searchmem($id){//ค้นหาสมาชิก
        $data=Member::loadDataMb($id);
        foreach($data as $item){
            $member=array(
                'name'=>$item->mb_name,
                'lastname'=>$item->mb_lastname,
            );
        }
        return $member;
    }

    public function Searchpartners($id){//ค้นหาคู่ค้า
        $data=partners::loadDatapartner($id);
        if(count($data)==0){
            $partners = 0;
        }else{
            foreach($data as $item){
                $partners=array(
                    'id'=>$item->pn_id,
                    'name'=>$item->pn_name,

                );
            }
        }
        return $partners;
    }





}




