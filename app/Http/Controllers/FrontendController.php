<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Admin\orders;
use App\Models\Admin\ordersdetails;
use Barryvdh\DomPDF\Facade\Pdf;



class FrontendController extends Controller
{
    public function index(){

    	return view('Frontend.master');
    }

    public function singleproduct($id){

     $single=DB::Table('products')->where('products.productname',$id)->join('catagories','products.catagoryid','=','catagories.id')->join('subcatagories','products.subcatagoryid','=','subcatagories.id' )->select('products.*','subcatagories.subcatagory','catagories.catagoryname')->first();
     $brandid=$single->brandid;
     $cata=$single->subcatagoryid;
     $brand=DB::Table('brands')->where('id',$brandid)->first();
     $related_product=DB::Table('products')->where('subcatagoryid',$cata)->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','catagories.catagoryname')->limit(5)->get();
      return view('Frontend.singleproduct',compact('single','brand','related_product'));


    }

    public function catagorywise($id){

    $cata=DB::Table('products')->where('catagoryid',$id)->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','catagories.catagoryname')->paginate(8);

    $catagory=DB::Table('products')->where('catagoryid',$id)->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','catagories.catagoryname')->first();
    return view('Frontend.catagorywise',compact('cata','catagory'));


    }


    public function subcatagorywise($id){

     $subcatagory=DB::Table('products')->where('subcatagoryid',$id)->join('subcatagories','products.subcatagoryid','=','subcatagories.id')->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','subcatagories.subcatagory','catagories.catagoryname')->paginate(8);

    $subcat=DB::Table('products')->where('subcatagoryid',$id)->join('subcatagories','products.subcatagoryid','=','subcatagories.id')->select('products.*','subcatagories.subcatagory')->first();
    return view('Frontend.subcatagorywise',compact('subcatagory','subcat'));



    }

    public function brandwise($id){

    $brand=DB::Table('products')->where('brandid',$id)->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','catagories.catagoryname')->paginate(8);
    $brandname=DB::Table('brands')->where('id',$id)->first();
     return view('Frontend.brandwise',compact('brand','brandname'));


    }

    public function redirect(){

    if(Auth::id()){



     return redirect()->route('front')->with('message','Login Succesfully');

    }

    else{

        return view('auth.login');
    }
   


    }

    public function myaccount(){
     if(Auth::id()){

             $order=orders::where('userid',Auth::user()->id)->get();
             $user=DB::Table('users')->where('id',Auth::id())->first();
             
            return view('Frontend.myaccount',compact('order','user'));    
        
        }
       else{
           
           return view('auth.login');
           
       }    
   
    


    }


    public function ordertrackingpage(){

     return view('Frontend.ordertrackingserach');

    }


    public function checkordertracking(Request $request){

    $order=$request->orderid;

    $check=DB::Table('orders')->where('order_id',$order)->first();

    if($check){

        $order=DB::Table('ordersdetails')->where('order_id',$order)->get();
      
      return view('Frontend.ordertracking',compact('check','order'));

    }

    else{
  
     return redirect()->route('user.ordertracking')->with('error','Order ID are Invaild.');

    }


    }

    public function userorderdetails($id){

    $ordersdetails=DB::Table('ordersdetails')->where('order_id',$id)->get();
    return view('Frontend.userorderdetails',compact('ordersdetails'));

    }

    public function userchangepassword(Request $request){

       
    $new=$request->new_password;
    $confirm=$request->confirm_password;
    
    
  
        
        if($new==$confirm){
            
            $user=User::find(Auth::id());
            $user->password=Hash::make($request->new_password);
            $user->save();
            Auth::logout();
            
            return redirect('/login')->with('message','Succesfully Password are Change');
        }
        else{
                    return back()->with('error','Password and Confirm not matched');

            
            
        }
    
    
    
        
    }

    public function fetchsearchdata(Request $request){

 if($request->get('a'))
 {
    $a=$request->get('a');

    $data=DB::table('products')->where('productname' ,'LIKE','%'.$a.'%')->get();
    
    $output ='<ul style="list-style-type: none;
  padding: 0;
  margin: 0;">';
    foreach($data as $row){
     $output .='<li class="amit" style="border: 1px solid #ddd; /* Add a border to all links */
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6; /* Grey background color */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove default text underline */
  font-size: 16px; /* Increase the font-size */
  color: black; /* Add a black text color */
  display: block; /* Make it into a block element to fill the whole list */"><a href="javascript:void(0)" data-id="'.$row->id.'" class="product"  >'.$row->productname.'<input type="hidden" name="id" class="id" value="'.$row->productname.'"></a></li>';

    }
    $output .='</ul>';
    return \Response::json($output);
 }

 }


 public function userpdfdownload($id,$order_id){


  $order=DB::table('orders')->where('id',$id)->first();
  $ship=DB::table('shippings')->where('orederid',$order_id)->first();
  $orderdetails=DB::table('ordersdetails')->where('order_id',$order_id)->get();

  $pdf = Pdf::loadView('Frontend.invoice',[

    'order'=>$order,
    'ship'=>$ship,
    'orderdetails'=>$orderdetails,

  ]);
    return $pdf->download('invoice.pdf');
  

 }


 public function shoplist(){

  $shop=DB::Table('products')->join('catagories','products.catagoryid','=','catagories.id')->select('products.*','catagories.catagoryname')->paginate(12);

  return view('Frontend.shop',compact('shop'));


 }

}
