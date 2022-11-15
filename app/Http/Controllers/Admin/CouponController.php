<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\coupon;

class CouponController extends Controller
{
	  public function __construct()
    {
        $this->middleware('auth:admin');

}
    public function coupon(){
    
    $coupon=DB::Table('coupons')->get();
    return view('Admin.coupon',compact('coupon'));

    }


    public function addcoupon(Request $request){

    $validate=$request->validate([

     '*' =>'required',
 

    ]);


    $data=array();

    $data['coupon_type']=$request->coupontype;
    $data['couponname']=$request->couponname;
    $data['couponcode']=$request->couponcode;
    $data['Amount']=$request->couponamount;

     DB::Table('coupons')->insert($data);

     return redirect()->route('admin.coupon')->with('message','Coupon Added Successfully');



    }


    public function updatecoupon(Request $request){

     
     $id=$request->id;
     $updatecoupon=coupon::find($id);
     $updatecoupon->coupon_type=$request->coupontype;
     $updatecoupon->couponname=$request->couponname;
     $updatecoupon->couponcode=$request->couponcode;
     $updatecoupon->Amount=$request->couponamount;

     $updatecoupon->save();
      return redirect()->route('admin.coupon')->with('message','Coupon Update Successfully');

    }


    public function deletecoupon($id){

    $deletecoupon=coupon::find($id);
    $deletecoupon->delete();
    return redirect()->route('admin.coupon')->with('error','Coupon Delete Successfully');


    }
}
