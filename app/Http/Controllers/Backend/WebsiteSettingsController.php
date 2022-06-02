<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Image;
use DB;
Use Auth;

class WebsiteSettingsController extends Controller
{

   public function __construct()
   {
     $this->middleware('auth');
  }


  public function settings()
  {
    $Data = DB::table('settingsinformation')->first();
    return view ('backend.websitesettings.settings', compact('Data'));
 }



   public function updatesettings(Request $request, $id)
    {
        $data = array(
            'title'     => $request->title,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'facebook'  => $request->facebook,
            'twitter'   => $request->twitter,
            'instagram' => $request->instagram,
            'youtube'   => $request->youtube,
            'admin_id'  => Auth()->user()->id,
        );

        $LogoPicture = $request->file('logo');
        $FaveiconPicture = $request->file('favicon');
        $oldimage = DB::table('settingsinformation')->first();


        if ($LogoPicture) {
            if ($oldimage->logo) {
                unlink($oldimage->logo);
            }

            $image_one_name= hexdec(uniqid()).'.'.$LogoPicture->getClientOriginalExtension();
            Image::make($LogoPicture)->save('public/image/settingimage/'.$image_one_name,80);
            $data['logo']='public/image/settingimage/'.$image_one_name;
            DB::table('settingsinformation')->where('id',$id)->update($data);
        }

        else{
            DB::table('settingsinformation')->where('id',$id)->update($data);
        }

        if ($FaveiconPicture) {
            if ($oldimage->favicon) {
                unlink($oldimage->favicon);
            }

            $image_one_name= hexdec(uniqid()).'.'.$FaveiconPicture->getClientOriginalExtension();
            Image::make($FaveiconPicture)->save('public/image/settingimage/'.$image_one_name,80);
            $data['favicon']='public/image/settingimage/'.$image_one_name;
            DB::table('settingsinformation')->where('id',$id)->update($data);
        }

        else{
            DB::table('settingsinformation')->where('id',$id)->update($data);
        }

        $notification=array(
            'messege'=>'Settings update Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


 public function contact()
 {
   $Data = DB::table('contactinformation')->first();
   return view ('backend.websitesettings.contact', compact('Data'));
}



   public function contactupdate(Request $request, $id)
    {
        $data = array(

            'description' =>$request->description,
            'admin_id' =>Auth()->user()->id,
        );


        DB::table('contactinformation')->where('id',$id)->update($data);

        $notification=array(
            'messege'=>'Contact Update Done',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }



}
