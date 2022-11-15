<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\catagory;
use App\Models\Admin\subcatagory;
use App\Models\Admin\brand;


class CatagoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');

}

public function index(){

$catagory=DB::Table('catagories')->get();

return view('Admin.catagory.catagory',compact('catagory'));


}


public function addcatagory(Request $request){

$validate=$request->validate([

'catagoryname'=>'required|unique:catagories',
'image'=>'required',


]);

$data=array();

$data['catagoryname']=$request->catagoryname;
 if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['picture']= $filename;
        }

      DB::Table('catagories')->insert($data);
      return redirect()->route('admin.catagory')->with('message','Catagory Added Successfully');



}


public function updatecatagory(Request $request){

$id=$request->id;
$oldimage=$request->old_iamge;
$new=$request->image;

if($new){

$updatecatagory=catagory::find($id);
$updatecatagory->catagoryname=$request->catagoryname;

if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['picture']= $filename;
        }

   $updatecatagory->save();
     return redirect()->route('admin.catagory')->with('message','Catagory Update Successfully');   


}

else{

$updatecatagory=catagory::find($id);
$updatecatagory->catagoryname=$request->catagoryname;
 $updatecatagory->save();
     return redirect()->route('admin.catagory')->with('message','Catagory Update Successfully'); 

}


}


public function deletecatagory($id){


$deletecatagory=catagory::find($id);
$deletecatagory->delete();
return redirect()->route('admin.catagory')->with('error','Catagory Delete Successfully'); 



}


public function subcatagory(){

$sub=DB::Table('subcatagories')->join('catagories','catagories.id','=','subcatagories.cata_id')->select('catagories.catagoryname','subcatagories.*')->get();

 return view('Admin.catagory.subcatagory',compact('sub'));

}


public function addsubcatagory(Request $request){

$validate=$request->validate([

'*'=>'required',



]);


$data=array();
$data['cata_id']=$request->cata_name;
$data['subcatagory']=$request->subcatagory;

DB::Table('subcatagories')->insert($data);

return redirect()->route('admin.subcatagory')->with('message','Sub Catagory Added Successfully');



}


public function subcatadelete($id){

$deletesub=subcatagory::find($id);
$deletesub->delete();
return redirect()->route('admin.subcatagory')->with('error','Sub Catagory Delete Successfully');

}


public function brand(){

$brand=DB::Table('brands')->get();
return view('Admin.catagory.brand',compact('brand'));


}


public function addbrand(Request $request){

$validate=$request->validate([

'*'=>'required',

]);

$data=array();
$data['brandname']=$request->brandname;
if($request->file('picture')){
            $file= $request->file('picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['picture']= $filename;
        }


DB::Table('brands')->insert($data);
return redirect()->route('admin.brand')->with('message','Brand Added Successfully');



}


public function updatebrand(Request $request){

$id=$request->id;
$old_image=$request->old_iamge;
$new=$request->image;

if($new){

$updatebrand=brand::find($id);
$updatebrand->brandname=$request->brandname;
if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['picture']= $filename;
        }

   $updatebrand->save();
   return redirect()->route('admin.brand')->with('message','Brand Update Successfully');

}

else{

$updatebrand=brand::find($id);
$updatebrand->brandname=$request->brandname;
$updatebrand->save();
   return redirect()->route('admin.brand')->with('message','Brand Update Successfully');

}





}

public function deletebrand($id){

$deletebrand=brand::find($id);
$deletebrand->delete();
return redirect()->route('admin.brand')->with('error','Brand Delete Successfully');



}



}
