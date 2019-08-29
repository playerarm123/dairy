<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
Route::get('login','Auth@ShowLoginForm'); // ไปหน้าล็อกอิน
Route::post('verifyLg','Auth@verifyLg'); //ตรวจสอบ
Route::get('loadLogo','Auth@loadLogo'); //โหลดไฟล์ logo
Route::get('logout','Auth@Logout'); //หน้าlogout

Route::group(['middleware' => 'checklogin'], function () {
    Route::get('home','Auth@ShowHome');//หน้าhome
});
Route::get('searchpartners/{id}','Datamg@Searchpartners');//ค้นหาคู่ค้า
Route::get('searchmem/{id}','Datamg@Searchmem');// ค้นหาสมาชิก
Route::get('dataem','Datamg@Dataem');//หน้าข้อมูลผู้ใช้งาน
Route::get('loaduser','Datamg@Loaduser');//ใช้โหลดข้อมูลผู้ใช้งานทั้งหมด
Route::post('checkuser','Datamg@checkuser');//เช็คข้อมูลผู้ใช้
Route::post('savedataem','Datamg@Savedataem');//บันทึกข้อมูลผู้ใช้
Route::get('deleteuser/{id}','Datamg@Deleteuser');//ลบผู้ใช้
Route::get('detailuser/{id}','Datamg@Detailuser');//แสดงรายละเอียดข้อมูลผู้ใช้
Route::post('updateuser','Datamg@Updateuser');//อัพเดตข้อมูลผู้ใช้
Route::get('edit_dataem/{id}','Datamg@Editdataem');//แก้ไขข้อมูลผู้ใช้
Route::get('checkdluser/{id}','Datamg@Checkdluser');//เช็คก่อนลบ

Route::get('datamem','Datamg@Datamem');//หน้าข้อมูลสมาชิก
Route::get('loadmem','Datamg@Loadmem');//ใช้โหลดข้อมูลสมาชิก
Route::post('checkmember','Datamg@Checkmember');//เช็คข้อมูลสมาชิก
Route::post('savemember','Datamg@Savemember');//บันทึกข้อมูลสมาชิก
Route::get('deletemem/{id}','Datamg@Deletemem');//ลบสมาชิก
Route::get('detailmem/{id}','Datamg@Detailmem');//แสดงรายละเอียดสมาชิก
Route::post('updatemem','Datamg@Updatemem');//อัพเดตข้อมูลสมาชิก
Route::get('edit_datamem/{id}','Datamg@Editdatamem');//แก้ไขข้อมูลสมาชิก
Route::get('checkdlmember/{id}','Datamg@Checkdlmember');//เช็คก่อนลบ


Route::get('datamilk','Datamg@Datamilk');//หน้าข้อมูลนม
Route::get('loadmilk','Datamg@Loadmilk');//โหลดข้อมูลน้ำนม
Route::post('checkmilk','Datamg@Checkmilk');//เช็คข้อมูลน้ำนม
Route::post('savemilk','Datamg@Savemilk');//บันทึกข้อมูลน้ำนม
Route::get('deletemilk/{id}','Datamg@Deletemilk');//ลบน้ำนม
Route::get('detailmilk/{id}','Datamg@Detailmilk');//แสดงรายละเอียดน้ำนม
Route::post('updatemilk','Datamg@Updatemilk');//อัพเดตข้อมูลน้ำนม
Route::get('edit_datamilk/{id}','Datamg@Editmilk');//แก้ไขข้อมูลน้ำนม
Route::get('checkdlmilk/{id}','Datamg@Checkdlmilk');//เช็คก่อนลบ



Route::get('datapro','Datamg@Datapro');//หน้าข้อมูลอุปกรณ์
Route::get('loadpro','Datamg@Loadpro');//โหลดข้อมูลอุปกรณ์
Route::post('checkpro','Datamg@Checkpro');//เช็คข้อมูลอุปกรณ์
Route::post('savepro','Datamg@Savepro');//บันทึกข้อมูลอุปกรณ์
Route::get('deletepro/{id}','Datamg@Deletepro');//ลบอุปกรณ์
Route::get('detailpro/{id}','Datamg@Detailpro');//แสดงรายละเอียดอุปกรณ์
Route::post('updatepro','Datamg@Updatepro');//อัพเดตข้อมูลอุปกรณ์
Route::get('editpro/{id}','Datamg@Editpro');//แก้ไขข้อมูลอุปกรณ์
Route::get('checkdlpro/{id}','Datamg@Checkdlpro');//เช็คก่อนลบ


Route::get('datacoop','Datamg@Datacoop');//หน้าข้อมูลสหกรณ์
Route::get('loadcoop','Datamg@Loadcoop');//โหลดหน้าสหกรณ์
Route::post('savecooper','Datamg@Savecooper');//บันทึกข้อมูลสหกรณ์
Route::get('detailcoop/{id}','Datamg@Detailcoop');//แสดงรายละเอียดสหกรณ์
Route::post('updatecoop','Datamg@Updatecoop');//อัพเดตข้อมูลสหกรณ์
Route::get('editcoop/{id}','Datamg@Editcoop');//แก้ไขข้อมูลสหกรณ์

Route::get('dataagent','Datamg@Dataagent');//หน้าข้อมูลคู่ค้า
Route::get('loadagent','Datamg@Loadagent');//โหลดหน้าคู่ค้า
Route::post('checkagent','Datamg@Checkagent');//เช็คข้อมูลคู่ค้า
Route::post('saveagent','Datamg@Saveagent');//บันทึกข้อมูลคู่ค้า
Route::get('deleteagent/{id}','Datamg@Deleteagent');//ลบคู่ค้า
Route::get('detailagent/{id}','Datamg@Detailagent');//แสดงรายละเอียดคู่ค้า
Route::post('updateagent','Datamg@Updateagent');//อัพเดตข้อมูลคู่ค้า
Route::get('editagent/{id}','Datamg@Editagent');//แก้ไขข้อมูลคู่ค้า
Route::get('checkdlagent/{id}','Datamg@Checkdlagent');//เช็คก่อนลบ


Route::get('buymilk','Buymilk@Buymilk');//หน้าข้อมูลซื้อน้ำนม
Route::post('savebuymilk','Buymilk@Savebuymilk');//บันทึกข้อมูลซื้อน้ำนม
Route::get('detailbuymilk/{id}','Buymilk@Detailbuymilk');//แสดงรายละเอียดซื้อน้ำนม



Route::get('salemilk','Sellmilk@Sellmilk');//หน้าข้อมูลขายน้ำนม
Route::post('savesellmilk','Sellmilk@Savesellmilk');
Route::get('detailsellmilk/{id}','Sellmilk@Detailsellmilk');


Route::get('receivedrug','Receive@Drug');//หน้ารับอุปกรณ์ยา
Route::post('savedrug','Receive@Savedrug');//บันทึกข้อมูลยา
Route::get('detaildrug/{id}','Receive@Detaildrug');//แสดงรายละเอียดยา

Route::get('receivefood','Receive@Food');//หน้ารับอุปกรณ์อาหาร
Route::post('savefood','Receive@Savefood');//บันทึกข้อมูลอาหาร
Route::get('detailfood/{id}','Receive@Detailfood');//แสดงรายละเอียดอาหาร

Route::get('receivetool','Receive@Tool');//หน้ารับอุปกรณ์
Route::post('savetool','Receive@Savetool');//บันทึกข้อมูลอุปกรณ์
Route::get('detailtool/{id}','Receive@Detailtool');//แสดงรายละเอียดอุปกรณ์

Route::get('saleeq','Selleqm@Saleeq');//หน้าขายอุปกรณ์



Route::get('paymilk','Payment@Payment');//หน้าชำระเงิน
Route::post('savepayment','Payment@Savepayment');//บันทึกหน้าชำระเงิน
Route::get('detailpayment/{id}','Payment@Detailpayment');//รายละเอียดชำระเงิน



Route::get('receivemoney','Acceptpm@Receivemoney'); //หน้ารับชำระเงิน
Route::post('saveacceptpm','Acceptpm@Saveacceptpm'); //บันทึกรับชำระเงิน
Route::get('detailacceptpm/{id}','Acceptpm@Detailacceptpm'); //รายละเอียดชำระเงิน

Route::get('testmind','Report@testmind');










