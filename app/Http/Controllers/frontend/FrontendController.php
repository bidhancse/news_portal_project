<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    

    public function home()
    {
        $NewsHeadline = DB::table('newsinformation')->limit('3')->orderBy('id','DESC')->get();

        $LatestNews = DB::table('newsinformation')->limit('1')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->orderBy('id','DESC')
        ->first();

        $LatestNewsBottom = DB::table('newsinformation')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->orderBy('id','DESC')->skip(1)->limit(3)->get();

        $LatestNewsRight = DB::table('newsinformation')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->orderBy('id','DESC')->skip(4)->limit(5)->get();

        $Item = DB::table('iteminformation')->where('status',1)->skip(1)->limit('3')->get();

        $BottomItem = DB::table('iteminformation')->where('status',1)->skip(4)->limit('1')->first();

        $BottomNews = DB::table('newsinformation')->where('item_id',$BottomItem->id)
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->orderBy('id','DESC')->skip(4)->limit(6)->get();

        return view('frontend.home', compact('NewsHeadline','LatestNews','LatestNewsBottom','LatestNewsRight','Item','BottomItem','BottomNews'));
    }


    public function Item($id, $item_name)
    {
        $ItemLatestNews = DB::table('newsinformation')->where('item_id',$id)->orderBy('id','DESC')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->first();

        $RightLatestNews = DB::table('newsinformation')->where('item_id',$id)->orderBy('id','DESC')->skip('1')->limit('3')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->get();

        $ItemName = DB::table('iteminformation')->where('id',$id)->first();
        $CategoryName = DB::table('categoryinformation')->where('item_id',$id)->get();
        $ItemNews = DB::table('newsinformation')->where('item_id',$ItemName->id)->orderBy('id','DESC')->limit('12')->skip('4')->get();

        return view('frontend.pages.Item', compact('ItemLatestNews','RightLatestNews','ItemName','CategoryName','ItemNews'));
    }


    public function categories($id, $category_name)
    {
        $CategoriesNews = DB::table('newsinformation')->where('category_id',$id)->orderBy('id','DESC')
        ->leftjoin('categoryinformation','categoryinformation.id','newsinformation.category_id')
        ->select('newsinformation.*','categoryinformation.category_name')
        ->get();

        $CategoryName = DB::table('categoryinformation')->where('categoryinformation.id',$id)
        ->leftjoin('iteminformation','iteminformation.id','categoryinformation.item_id')
        ->select('categoryinformation.*','iteminformation.item_name')
        ->first();

        return view('frontend.pages.categories', compact('CategoriesNews','CategoryName'));
    }


    public function newsdetails($id, $news_title)
    {
        $NewsDetails = DB::table('newsinformation')->where('id',$id)->first();

        $MoreNews = DB::table('newsinformation')
        ->leftjoin('iteminformation','iteminformation.id','newsinformation.item_id')
        ->select('newsinformation.*','iteminformation.item_name')
        ->orderBy('id','DESC')->limit(6)->get();
        return view('frontend.pages.newsdetails', compact('NewsDetails','MoreNews'));
    }


    public function searchnews(Request $request){

        $search = $request->searchdata;
        $NewsSearch = DB::table('newsinformation')
        ->where('news_title', 'like', '%' . $search . '%')
        ->where('status', 1)->orderBy('id','DESC')
        ->get();
        return view('frontend.pages.searchnews', compact('NewsSearch'));
    }



}
