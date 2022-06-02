<?php

namespace App\Http\Controllers\Backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use Auth;
use Image;

class NewsController extends Controller
{

 public function __construct()
 {
  $this->middleware('auth');
 }


 public function news()
 {
  $Item = DB::table('iteminformation')->where('status',1)->get();
  return view ('backend.news.news', compact('Item'));
 }


 public function categoryget($item_id) {

  $data = DB::table('categoryinformation')->where('item_id',$item_id)->get();
  return json_encode($data);
 }


 public function newsinsert(Request $request)
 {

  $id = IdGenerator::generate(['table' => 'newsinformation', 'length' => 10, 'prefix' =>'NEWS-']);


  $data = array(
   'id'        => $id,
   'sl'        => $request->sl,
   'news_title'        => $request->news_title,
   'item_id' => $request->item_id,
   'category_id' => $request->category_id,
   'short_description' => $request->short_description,
   'description' => $request->description,
   'status'    => $request->status,
   'date'    => date('l j F Y'),
   'repoter_name' => $request->repoter_name,
   'admin_id'  => Auth()->user()->id,
  );


  $NewsPicture = $request->file('image');

  if ($NewsPicture) 
  {
   $image_one_name= hexdec(uniqid()).'.'.$NewsPicture->getClientOriginalExtension();
   Image::make($NewsPicture)->save('public/image/newsimage/'.$image_one_name,80);
   $data['image']='public/image/newsimage/'.$image_one_name;
   DB::table('newsinformation')->insert($data);

  }

  else
  {
   DB::table('newsinformation')->insert($data);
  }


  $notification=array(
   'messege'=>'News insert Done',
   'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification); 
 }


 public function managenews()
 {
  $News = DB::table('newsinformation')
  ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
  ->leftjoin('categoryinformation','categoryinformation.id','newsinformation.category_id')
  ->select('newsinformation.*','iteminformation.item_name','categoryinformation.category_name')
  ->get();
  return view ('backend.news.managenews', compact('News'));
 }


 public function inactivenews($id)
 {

  DB::table('newsinformation')->where('id',$id)->update(['status' => 2]);
  $notification=array(
   'messege'=>'News Inactive Successfully',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 

 }


 public function activenews($id)
 {

  DB::table('newsinformation')->where('id',$id)->update(['status' => 1]);
  $notification=array(
   'messege'=>'News Active Successfully',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 

 }


 public function deletenews($id)
 {
  $check = DB::table('newsinformation')->where('id',$id)->first();
  if (isset($check->image)) {
   unlink($check->image);
   DB::table('newsinformation')->where('id',$id)->delete();
  }

  else
  {
   DB::table('newsinformation')->where('id',$id)->delete();
  }

  $notification=array(
   'messege'=>'News Delete Successfully',
   'alert-type'=>'error'
  );
  return Redirect()->back()->with($notification); 
 }


 public function editnews($id) 
 {
  $Item = DB::table('iteminformation')->where('status',1)->get();
  $Category = DB::table('categoryinformation')->where('status',1)->get();

  $Data = DB::table('newsinformation')->where('newsinformation.id',$id)
  ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
  ->leftjoin('categoryinformation','categoryinformation.id','newsinformation.category_id')
  ->select('newsinformation.*','iteminformation.item_name','categoryinformation.category_name')
  ->first();
  return view('backend.news.updatenews', compact('Data','Item','Category'));
 }



 public function newsupdate(Request $request, $id) 
  {

    $data = array(
   'sl'        => $request->sl,
   'news_title'        => $request->news_title,
   'item_id' => $request->item_id,
   'category_id' => $request->category_id,
   'short_description' => $request->short_description,
   'description' => $request->description,
   'status'    => $request->status,
   'date'    => date('l j F Y'),
   'repoter_name' => $request->repoter_name,
   'admin_id'  => Auth()->user()->id,
  );



    $NewsPicture = $request->file('image');

    $old_image = $request->old_image;
    if ($NewsPicture) {
      if ($old_image) {
        unlink($old_image);
      }
      $image_one_name= hexdec(uniqid()).'.'.$NewsPicture->getClientOriginalExtension();
      Image::make($NewsPicture)->save('public/image/newsimage/'.$image_one_name,80);
      $data['image']='public/image/newsimage/'.$image_one_name;
      DB::table('newsinformation')->where('id',$id)->update($data);

    }

    else{
      DB::table('newsinformation')->where('id',$id)->update($data);
    }


    $notification=array(
      'messege'=>'News update Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

  }



}
