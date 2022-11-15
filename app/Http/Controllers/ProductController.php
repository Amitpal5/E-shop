<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Admin\product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

}

public function product(){

return view('Admin.Product.product');

}

public function getsubname($cataid)
{

 $subname=DB::Table('subcatagories')->where('cata_id',$cataid)->get();

 return json_encode($subname);

}

public function addproduct(Request $request){

$validate=$request->validate([

'cata_name' =>'required',
'product' =>'required',
'productcode' =>'required',
'qty' =>'required',
'price' =>'required',
'image' =>'required',




]);


$data=array();

$data['catagoryid']=$request->cata_name;
$data['subcatagoryid']=$request->sub_name;
$data['brandid']=$request->brand_name;
$data['productname']=$request->product;
$data['product_code']=$request->productcode;
$data['productsize']=$request->size;
$data['product_colour']=$request->colour;
$data['qty']=$request->qty;
$data['price']=$request->price;
$data['discountprice']=$request->dprice;
$data['shortd']=$request->sdescription;
$data['longd']=$request->fdescription;
$data['bestseller']=$request->bestseller;
$data['hot_deal']=$request->hot_deal;
$data['sales']=$request->sales;
$data['lproduct']=$request->lproduct;
$data['bweek']=$request->bweek;
$data['popular']=$request->popular;

if($request->file('image')){

 $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['productimage']= $filename;


}

if($request->file('multi1')){

 $file= $request->file('multi1');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['image2']= $filename;

	
}

if($request->file('multi2')){

 $file= $request->file('multi2');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['image3']= $filename;

	
}

DB::Table('products')->insert($data);

return redirect()->route('admin.product')->with('message','Product Added Successfully');

}



public function manageproduct(){

$manage=DB::Table('products')->join('catagories','catagories.id','=','products.catagoryid')->join('brands','brands.id','=','products.brandid')->join('subcatagories','subcatagories.id','=','products.subcatagoryid')->select('products.*','catagories.catagoryname','subcatagories.subcatagory','brands.brandname')->latest('id')->get();

return view('Admin.Product.manage',compact('manage'));


}


public function viewproduct($id){

$view=DB::Table('products')->where('products.id',$id)->join('catagories','catagories.id','=','products.catagoryid')->join('brands','brands.id','=','products.brandid')->join('subcatagories','subcatagories.id','=','products.subcatagoryid')->select('products.*','catagories.catagoryname','subcatagories.subcatagory','brands.brandname')->get();

   return view('Admin.Product.viewproduct',compact('view'));


}


public function editproduct($id){

$edit=DB::Table('products')->where('products.id',$id)->join('catagories','catagories.id','=','products.catagoryid')->join('brands','brands.id','=','products.brandid')->join('subcatagories','subcatagories.id','=','products.subcatagoryid')->select('products.*','catagories.catagoryname','subcatagories.subcatagory','brands.brandname')->first();

   return view('Admin.Product.editproduct',compact('edit'));


}


public function updateproduct(Request $request){

$id=$request->id;
$old_sub=$request->sub;
$old_image1=$request->old_image1;
$old_image2=$request->old_image2;
$old_image3=$request->old_image3;
$newsub=$request->sub_name;
$newimage1=$request->image1;
$newimage2=$request->image2;
$newimage3=$request->image3;


if($newsub){

$updateproduct=product::find($id);
$updateproduct->catagoryid=$request->cata_name;
$updateproduct->subcatagoryid=$request->sub_name;
$updateproduct->brandid=$request->brand_name;
$updateproduct->productname=$request->product;
$updateproduct->product_code=$request->productcode;
$updateproduct->productsize=$request->size;
$updateproduct->product_colour=$request->colour;
$updateproduct->qty=$request->qty;
$updateproduct->price=$request->price;
$updateproduct->discountprice=$request->dprice;
$updateproduct->shortd=$request->sdescription;
$updateproduct->longd=$request->fdescription;
$updateproduct->bestseller=$request->bestseller;
$updateproduct->hot_deal=$request->hot_deal;
$updateproduct->sales=$request->sales;
$updateproduct->lproduct=$request->lproduct;
$updateproduct->bweek=$request->bweek;
$updateproduct->popular=$request->popular;
$updateproduct->productimage=$request->old_image1;
$updateproduct->image2=$request->old_image2;
$updateproduct->image3=$request->old_image3;

$updateproduct->save();
return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');


}

if($newimage1){

$updateproduct=product::find($id);
$updateproduct->catagoryid=$request->cata_name;
$updateproduct->subcatagoryid=$old_sub;
$updateproduct->brandid=$request->brand_name;
$updateproduct->productname=$request->product;
$updateproduct->product_code=$request->productcode;
$updateproduct->productsize=$request->size;
$updateproduct->product_colour=$request->colour;
$updateproduct->qty=$request->qty;
$updateproduct->price=$request->price;
$updateproduct->discountprice=$request->dprice;
$updateproduct->shortd=$request->sdescription;
$updateproduct->longd=$request->fdescription;
$updateproduct->bestseller=$request->bestseller;
$updateproduct->hot_deal=$request->hot_deal;
$updateproduct->sales=$request->sales;
$updateproduct->lproduct=$request->lproduct;
$updateproduct->bweek=$request->bweek;
$updateproduct->popular=$request->popular;

$updateproduct->image2=$request->old_image2;
$updateproduct->image3=$request->old_image3;

if($request->file('image_1')){
$file= $request->file('image_1');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);

$updateproduct->productimage=$filename;
}

$updateproduct->save();
return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');



}

if($newimage2){

$updateproduct=product::find($id);
$updateproduct->catagoryid=$request->cata_name;
$updateproduct->subcatagoryid=$old_sub;
$updateproduct->brandid=$request->brand_name;
$updateproduct->productname=$request->product;
$updateproduct->product_code=$request->productcode;
$updateproduct->productsize=$request->size;
$updateproduct->product_colour=$request->colour;
$updateproduct->qty=$request->qty;
$updateproduct->price=$request->price;
$updateproduct->discountprice=$request->dprice;
$updateproduct->shortd=$request->sdescription;
$updateproduct->longd=$request->fdescription;
$updateproduct->bestseller=$request->bestseller;
$updateproduct->hot_deal=$request->hot_deal;
$updateproduct->sales=$request->sales;
$updateproduct->lproduct=$request->lproduct;
$updateproduct->bweek=$request->bweek;
$updateproduct->popular=$request->popular;

$updateproduct->productimage=$request->old_image1;
$updateproduct->image3=$request->old_image3;

if($request->file('image_2')){
$file= $request->file('image_2');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);

$updateproduct->image2=$filename;
}

$updateproduct->save();
return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');




}

if($newimage3){

$updateproduct=product::find($id);
$updateproduct->catagoryid=$request->cata_name;
$updateproduct->subcatagoryid=$old_sub;
$updateproduct->brandid=$request->brand_name;
$updateproduct->productname=$request->product;
$updateproduct->product_code=$request->productcode;
$updateproduct->productsize=$request->size;
$updateproduct->product_colour=$request->colour;
$updateproduct->qty=$request->qty;
$updateproduct->price=$request->price;
$updateproduct->discountprice=$request->dprice;
$updateproduct->shortd=$request->sdescription;
$updateproduct->longd=$request->fdescription;
$updateproduct->bestseller=$request->bestseller;
$updateproduct->hot_deal=$request->hot_deal;
$updateproduct->sales=$request->sales;
$updateproduct->lproduct=$request->lproduct;
$updateproduct->bweek=$request->bweek;
$updateproduct->popular=$request->popular;

$updateproduct->productimage=$request->old_image1;
$updateproduct->image2=$request->old_image2;

if($request->file('image_3')){
$file= $request->file('image_3');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);

$updateproduct->image3=$filename;
}

$updateproduct->save();
return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');




}

else{

$updateproduct=product::find($id);
$updateproduct->catagoryid=$request->cata_name;
$updateproduct->subcatagoryid=$old_sub;
$updateproduct->brandid=$request->brand_name;
$updateproduct->productname=$request->product;
$updateproduct->product_code=$request->productcode;
$updateproduct->productsize=$request->size;
$updateproduct->product_colour=$request->colour;
$updateproduct->qty=$request->qty;
$updateproduct->price=$request->price;
$updateproduct->discountprice=$request->dprice;
$updateproduct->shortd=$request->sdescription;
$updateproduct->longd=$request->fdescription;
$updateproduct->bestseller=$request->bestseller;
$updateproduct->hot_deal=$request->hot_deal;
$updateproduct->sales=$request->sales;
$updateproduct->lproduct=$request->lproduct;
$updateproduct->bweek=$request->bweek;
$updateproduct->popular=$request->popular;

$updateproduct->productimage=$request->old_image1;
$updateproduct->image2=$request->old_image2;
$updateproduct->image3=$request->old_image3;

$updateproduct->save();
return redirect()->route('admin.manageproduct')->with('message','Product Update Successfully');

}



}



}
