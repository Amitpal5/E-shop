<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use DB;
use App\Models\Admin\slider;
use App\Models\Admin\header;
use App\Models\Admin\footer;




class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');



}


    public function index(){

    

     return view('Admin.master');

    }


    public function slider(){

    $slider=DB::Table('sliders')->join('catagories','catagories.id','=','sliders.link')->select('catagories.*','sliders.*')->get();

    return view('Admin.slider',compact('slider'));


    }


    public function addslider(Request $request){

    $validate=$request->validate([

    
    '*'=>'required',


    ]);

    $data=array();
    $data['heading']=$request->heading;
    $data['smallheading']=$request->sheading;
    $data['link']=$request->link;

    if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $data['image']= $filename;
        }


    DB::Table('sliders')->insert($data);

    return redirect()->route('admin.slider')->with('message','Slider Added Successfully');




    }


    public function updateslider(Request $request){

    $validate=$request->validate([

    'heading'=>'required',
    'smallheading'=>'required',


    ]);

    $id=$request->id;
    $oldimage=$request->old;
    $image=$request->image;

    if($image){

    $updateslider=slider::find($id);
    $updateslider->heading=$request->heading;
    $updateslider->smallheading=$request->smallheading;
    $updateslider->link=$request->link;

    if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $updateslider->image= $filename;
        }


    $updateslider->save();
    return redirect()->route('admin.slider')->with('message','Slider Update Successfully');



    }

    else{

       $updateslider=slider::find($id);
    $updateslider->heading=$request->heading;
    $updateslider->smallheading=$request->smallheading;
    $updateslider->link=$request->link;
    $updateslider->save();
    return redirect()->route('admin.slider')->with('message','Slider Update Successfully');

    }


    }


    public function deleteslider($id){

     $deleteslider=slider::find($id);
     $deleteslider->delete();
     return redirect()->route('admin.slider')->with('error','Slider Delete Successfully');



    }


    public function adminheaderandfooter(){

    $header=DB::Table('headers')->first();
    $footer=DB::Table('footers')->first();

    return view('Admin.headerandfooter',compact('header','footer'));


    }




    public function updateadminheader(Request $request){

    

    $id=$request->id;
    $oldimage=$request->old;
    $image=$request->image;

    if($image){

       $updateheader=header::find($id);

        $updateheader->title=$request->title;
    $updateheader->heading=$request->heading;
    $updateheader->phone=$request->phone;

    if($request->file('image')){

         $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $updateslider->logo= $filename;
    }


    $updateheader->save();

    return redirect()->route('admin.headerandfooter')->with('message','Header Information Update Successfully');



    }

    else{
  
     $updateheader=header::find($id);
     $updateheader->title=$request->title;
    $updateheader->heading=$request->heading;
    $updateheader->phone=$request->phone;

    
   $updateheader->save();

    return redirect()->route('admin.headerandfooter')->with('message','Header Information Update Successfully');


    }

   
    }


    public function updateadminfooter(Request $request){

    
    $id=$request->id;
    $old=$request->old;
    $image=$request->iamge;

    if($image){

     $updatefooter=footer::find($id);
     $updatefooter->phone=$request->phone;
     $updatefooter->email=$request->email;
     $updatefooter->address=$request->address;
     $updatefooter->facebook=$request->facebook;
     $updatefooter->twitter=$request->twitter;
     $updatefooter->linkedin=$request->linkedin;


     if($request->file('image')){

     $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $updatefooter->logo= $filename;



     }


     $updatefooter->save();

     return redirect()->route('admin.headerandfooter')->with('message','Header Information Update Successfully');






    }


    else{

     $updatefooter=footer::find($id);
     $updatefooter->phone=$request->phone;
     $updatefooter->email=$request->email;
     $updatefooter->address=$request->address;
     $updatefooter->facebook=$request->facebook;
     $updatefooter->twitter=$request->twitter;
     $updatefooter->linkedin=$request->linkedin;


      $updatefooter->save();

     return redirect()->route('admin.headerandfooter')->with('message','Footer Information Update Successfully');


    }






    }


   public function logout(){

    Auth::logout();

    return redirect()->route('front')->with('message','Admin Logout Successfully');

   }


  
}
