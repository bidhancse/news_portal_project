<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use DB;
Use Image;
Use Auth;
use Hash;

class UserController extends Controller
{


 public function __construct()
 {
  $this->middleware('auth');
 }


 public function createadmin()
 {
  return view ('backend.user.createadmin');
 }


 public function usercreate(Request $request)
 {


  $data = array(
   'name'         =>     $request->name,
   'email'        =>     $request->email,
   'password'     =>     Hash::make($request->password),
   'phone'        =>     $request->phone,
   'birthdate'    =>     $request->birthdate,
   'address'      =>     $request->address,
   'status'       =>     $request->status,
   'admin_id'     =>     Auth()->user()->id,
  );


  $UserPicture = $request->file('image');

  if ($UserPicture) 
  {
   $image_one_name= hexdec(uniqid()).'.'.$UserPicture->getClientOriginalExtension();
   Image::make($UserPicture)->save('public/image/userimage/'.$image_one_name,80);
   $data['image']='public/image/userimage/'.$image_one_name;
   DB::table('users')->insert($data);

  }

  else
  {
   DB::table('users')->insert($data);
  }


  $notification=array(
   'messege'=>'User Create Done',
   'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification); 
 }


 public function manageadmin()
 {
  $User = DB::table('users')->get();
  return view ('backend.user.manageadmin', compact('User'));
 }


 public function inactiveuser($id)
 {

  DB::table('users')->where('id',$id)->update(['status' => 2]);
  $notification=array(
   'messege'=>'User Inactive Done',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 

 }


 public function activeuser($id)
 {

  DB::table('users')->where('id',$id)->update(['status' => 1]);
  $notification=array(
   'messege'=>'User Active Done',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 

 }


 public function deleteuser($id)
 {
  $check = DB::table('users')->where('id',$id)->first();
  if (isset($check->image)) {
   unlink($check->image);
   DB::table('users')->where('id',$id)->delete();
  }

  else
  {
   DB::table('users')->where('id',$id)->delete();
  }

  $notification=array(
   'messege'=>'User Delete Done',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 
 }


 public function edituser($id) 
 {
  $Data = DB::table('users')->where('id',$id)->first();
  return view('backend.user.updateadmin', compact('Data'));
 }


 public function userupdate(Request $request, $id) {


  if($request->password == Null){
   $data = array(
    'name'         =>     $request->name,
    'email'        =>     $request->email,
    'phone'        =>     $request->phone,
    'birthdate'    =>     $request->birthdate,
    'address'      =>     $request->address,
    'status'       =>     $request->status,
    'admin_id'     =>     Auth()->user()->id,
   );
  }

  else{
   $data = array(
    'name'         =>     $request->name,
    'email'        =>     $request->email,
    'password'     =>     Hash::make($request->password),
    'phone'        =>     $request->phone,
    'birthdate'    =>     $request->birthdate,
    'address'      =>     $request->address,
    'status'       =>     $request->status,
    'admin_id'     =>     Auth()->user()->id,
   );

  }


  $UserPicture = $request->file('image');
  $old_image = $request->old_image;

  if ($UserPicture) {
   if($old_image) {
    unlink($old_image);
   }
   $image_one_name= hexdec(uniqid()).'.'.$UserPicture->getClientOriginalExtension();
   Image::make($UserPicture)->save('public/image/userimage/'.$image_one_name,80);
   $data['image']='public/image/userimage/'.$image_one_name;
   DB::table('users')->where('id',$id)->update($data);

  }

  else {
   DB::table('users')->where('id',$id)->update($data);
  }

  $notification=array(
   'messege'=>'User Update Done',
   'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification);

 }


}
