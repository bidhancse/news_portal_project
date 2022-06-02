<?php

namespace App\Http\Controllers\Backend;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Image;

class CategoryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

 public function category()
 {
   $Item = DB::table('iteminformation')->where('status',1)->get();
   return view ('backend.category.category', compact('Item'));
}


public function categoryinsert(Request $request)
{
   $id = IdGenerator::generate(['table' => 'categoryinformation', 'length' => 10, 'prefix' =>'CAT-']);

   $data = array(
     'id'        => $id,
     'sl'        => $request->sl,
     'item_id' => $request->item_id,
     'category_name' => $request->category_name,
     'status'    => $request->status,
     'admin_id'  => Auth()->user()->id,
  );

   $CategoryPicture = $request->file('image');

   if ($CategoryPicture) {
     $image_one_name= hexdec(uniqid()).'.'.$CategoryPicture->getClientOriginalExtension();
     Image::make($CategoryPicture)->save('public/categoryimage/'.$image_one_name,80);
     $data['image']='public/categoryimage/'.$image_one_name;
     DB::table('categoryinformation')->insert($data);

  }

  else{
     DB::table('categoryinformation')->insert($data);
  }

  $notification=array(
     'messege'=>'Category insert Successfully',
     'alert-type'=>'success'
  );
  return Redirect()->back()->with($notification); 
}


public function managecategory()
{
   $Category = DB::table('categoryinformation')
   ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
   ->select('categoryinformation.*','iteminformation.item_name')
   ->get();
   return view ('backend.category.managecategory', compact('Category'));
}


public function inactivecategory($id)
{

  DB::table('categoryinformation')->where('id',$id)->update(['status' => 2]);
  $notification=array(
   'messege'=>'Category Inactive Successfully',
   'alert-type'=>'error'
);
  return Redirect()->back()->with($notification); 

}


public function activecategory($id)
{

  DB::table('categoryinformation')->where('id',$id)->update(['status' => 1]);
  $notification=array(
   'messege'=>'Category Active Successfully',
   'alert-type'=>'error'
);
  return Redirect()->back()->with($notification); 

}


public function deletecategory($id)
{
  $check = DB::table('categoryinformation')->where('id',$id)->first();
  if (isset($check->image)) {
   unlink($check->image);
   DB::table('categoryinformation')->where('id',$id)->delete();
}

else
{
   DB::table('categoryinformation')->where('id',$id)->delete();
}

$notification=array(
   'messege'=>'Category Delete Successfully',
   'alert-type'=>'error'
);
return Redirect()->back()->with($notification); 
}


public function editcategory($id) 
{
  $Item = DB::table('iteminformation')->where('status',1)->get();
  $Data = DB::table('categoryinformation')->where('categoryinformation.id',$id)
  ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
  ->select('categoryinformation.*','iteminformation.item_name')
  ->first();
  return view('backend.category.updatecategory', compact('Item','Data'));
}


public function categoryupdate(Request $request, $id) 
{

   $data = array(
   'sl'        => $request->sl,
   'item_id' => $request->item_id,
   'category_name' => $request->category_name,
   'status'    => $request->status,
   'admin_id'  => Auth()->user()->id,
);



  $CategoryPicture = $request->file('image');

  $old_image = $request->old_image;
  if ($CategoryPicture) {
   if ($old_image) {
    unlink($old_image);
 }
 $image_one_name= hexdec(uniqid()).'.'.$CategoryPicture->getClientOriginalExtension();
 Image::make($CategoryPicture)->save('public/image/categoryimage/'.$image_one_name,80);
 $data['image']='public/image/categoryimage/'.$image_one_name;
 DB::table('categoryinformation')->where('id',$id)->update($data);

}

else{
   DB::table('categoryinformation')->where('id',$id)->update($data);
}


$notification=array(
   'messege'=>'Category update Successfully',
   'alert-type'=>'success'
);
return Redirect()->back()->with($notification); 

}


}
