<?php

namespace App\Http\Controllers\Backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class ItemController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }


  public function item()
  {
    return view ('backend.item.item');
  }


  public function iteminsert(Request $request)
  {

    $id = IdGenerator::generate(['table' => 'iteminformation', 'length' => 10, 'prefix' =>'ITEM-']);

    $data = array(
      'id'        => $id,
      'sl'        => $request->sl,
      'item_name' => $request->item_name,
      'status'    => $request->status,
      'admin_id'  => Auth()->user()->id,
    );



    $ItemPicture = $request->file('image');

    if ($ItemPicture) 
    {
      $image_one_name= hexdec(uniqid()).'.'.$ItemPicture->getClientOriginalExtension();
      Image::make($ItemPicture)->save('public/image/itemimage/'.$image_one_name,80);
      $data['image']='public/image/itemimage/'.$image_one_name;
      DB::table('iteminformation')->insert($data);

    }

    else
    {
      DB::table('iteminformation')->insert($data);
    }


    $notification=array(
      'messege'=>'Item insert Done',
      'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

  }


  public function manageitem()
  {
    $Item = DB::table('iteminformation')->get();
    return view ('backend.item.manageitem', compact('Item'));
  }


  public function inactiveitem($id)
  {

    DB::table('iteminformation')->where('id',$id)->update(['status' => 2]);
    $notification=array(
      'messege'=>'Item Inactive Successfully',
      'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

  }


  public function activeitem($id)
  {

    DB::table('iteminformation')->where('id',$id)->update(['status' => 1]);
    $notification=array(
      'messege'=>'Item Active Successfully',
      'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 

  }


  public function deleteitem($id)
  {
    $check = DB::table('iteminformation')->where('id',$id)->first();
    if (isset($check->image)) {
      unlink($check->image);
      DB::table('iteminformation')->where('id',$id)->delete();
    }

    else
    {
      DB::table('iteminformation')->where('id',$id)->delete();
    }

    $notification=array(
      'messege'=>'Item Delete Successfully',
      'alert-type'=>'error'
    );
    return Redirect()->back()->with($notification); 
  }


  public function edititem($id) 
  {
    $Data = DB::table('iteminformation')->where('id',$id)->first();
    return view('backend.item.updateitem', compact('Data'));
  }



  public function itemupdate(Request $request, $id) 
  {

    $data = array(
      'sl'        => $request->sl,
      'item_name' => $request->item_name,
      'status'    => $request->status,
      'admin_id'  => Auth()->user()->id,
    );



    $ItemPicture = $request->file('image');

    $old_image = $request->old_image;
    if ($ItemPicture) {
      if ($old_image) {
        unlink($old_image);
      }
      $image_one_name= hexdec(uniqid()).'.'.$ItemPicture->getClientOriginalExtension();
      Image::make($ItemPicture)->save('public/image/itemimage/'.$image_one_name,80);
      $data['image']='public/image/itemimage/'.$image_one_name;
      DB::table('iteminformation')->where('id',$id)->update($data);

    }

    else{
      DB::table('iteminformation')->where('id',$id)->update($data);
    }


    $notification=array(
      'messege'=>'Item update Successfully',
      'alert-type'=>'success'
    );
    return Redirect()->back()->with($notification); 

  }


}
