<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use Session;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\orders;
use App\Models\Admin\ordersdetails;
use App\Models\whishlist;



class CartController extends Controller
{
    public function addtocart($id){

    $product=DB::table('products')->where('id',$id)->first();

    $data =array();
	   if($product->discountprice == NULL){
	   $data['id'] =$product->id;
	   $data['name'] =$product->productname;
	   $data['qty'] =1;
	   $data['price'] =$product->price;
	   $data['weight'] =1;
	   $data['option']['image'] =$product->productimage;
	   
	   
	   Cart::add($data);
	   
	   $items=Cart::count();
	   $amount=Cart::subtotal();
	   
	   return \Response::json(['status'=>true,'item'=>$items,'amounts'=>$amount,'msg' => 'Successfully added to cart']);
	   
   }
   
   else{
	   
	    $data['id'] =$product->id;
	   $data['name'] =$product->productname;
	   $data['qty'] =1;
	   $data['price'] =$product->discountprice;
	   $data['weight'] =1;
	   $data['option']['image'] =$product->productimage;
	   
	    Cart::add($data);
	    $items=Cart::count();
	   $amount=Cart::subtotal();
	   return \Response::json(['status'=>true,'item'=>$items,'amounts'=>$amount,'msg' => 'Successfully added to cart']);
	   
	   
	   
   }


    }

    public function cartcontent(){

    $cartitem=Cart::content();
    return view('Frontend.cart',compact('cartitem'));

    }

    public function fetchdata(){

   $cart=Cart::content();

	   $count=Cart::count();
	   $amount=Cart::subtotal();

   return \Response::json(['status'=>true,'carts'=>$cart,'counts'=>$count,'amounts'=>$amount]);




   }

    public function deletecart($id){

  Cart::remove($id);
   $amount=cart::subtotal();
   $count=cart::count();

    return \Response::json(['status'=>true,'counts'=>$count,'amounts'=>$amount,]);



   }


   public function cartfecthdata(){

   $s=Cart::content();

	   $count=Cart::count();
	   $amount=Cart::subtotal();

   return \Response::json(['status'=>true,'sa'=>$s,'counts'=>$count,'amounts'=>$amount]);


   }


   public function cartitemdelete($id){

    Cart::remove($id);
   $amount=cart::subtotal();
   $count=cart::count();

    return \Response::json(['status'=>true,'counts'=>$count,'amounts'=>$amount,]);




   }

   public function updatecart(Request $request){


    $id=$request->id;
    $qty=$request->qty;
     $update=Cart::update($id, $qty);
     $cart=Cart::get($id);
  $price=$cart->price;
  $lineprice=$price*$qty;
       $amounts=cart::subtotal();
       $count=cart::count();


    return \Response::json(['status'=>true,'update'=>$update,'line'=>$lineprice,'amount'=>$amounts,'counts'=>$count]);



   }


   public function singleproductcart(Request $request){

   $id=$request->id;
   $qty=$request->qty;

    $product=DB::table('products')->where('id',$id)->first();

    $data =array();
	   if($product->discountprice == NULL){
	   $data['id'] =$product->id;
	   $data['name'] =$product->productname;
	   $data['qty'] =$qty;
	   $data['price'] =$product->price;
	   $data['weight'] =1;
	   $data['option']['image'] =$product->productimage;
	   
	   
	   Cart::add($data);
	   
	    return redirect()->route('front')->with('message','Product added to cart succefully');
   }
   
   else{
	   
	    $data['id'] =$product->id;
	   $data['name'] =$product->productname;
	   $data['qty'] =$qty;
	   $data['price'] =$product->discountprice;
	   $data['weight'] =1;
	   $data['option']['image'] =$product->productimage;
	   
	    Cart::add($data);
	   return redirect()->route('front')->with('message','Product added to cart succefully');
	   
	   
   }




   }


   public function usercheck(){

   if(Auth::id()){

    $cart=Cart::content();

    return view('Frontend.checkout',compact('cart'));

   }

   else{

    return view('auth.login');

   }


   }


   public function usercoupon(Request $request){

   	$code=$request->input('coupon_code');

    $coupon=DB::Table('coupons')->where('couponcode',$code)->first();

    $userid = Auth::user()->id;
      
  $couponchcek =DB::table('checkcoupons')->where('userid', $userid)->where('couponcode',$code)->first();


       if($coupon){

        if($couponchcek){

       return redirect()->route('user.checkout')->with('error','Coupon are already used');



        }

        else{

         $data=array();
         $data['couponcode']=$code;
         $data['userid']=$userid;

         DB::Table('checkcoupons')->insert($data);
         

         
         Session::put('coupon',[
         	'name' => $coupon->couponname,
          'type' => $coupon->coupon_type,
         'Amount' => $coupon->Amount,
          
      
      
      ]);

         return redirect()->route('user.checkout')->with('message','Coupon are Used Succefully');
        


        }



     
 
   }

   else{

      return redirect()->route('user.checkout')->with('error','Coupon are not Valid');
     
 
   }


   }


   public function paymentprocess(Request $request){

    $data=array();
    $data['fname']=$request->fname;
    $data['lname']=$request->lname;
    $data['county']=$request->country;
    $data['address']=$request->address1;
    $data['address2']=$request->address2;
    $data['town']=$request->city;
    $data['state']=$request->state;
    $data['country']=$request->country;
    $data['zip']=$request->zip;
    $data['phone']=$request->phone;
    $data['email']=$request->email;
    $data['payment']=$request->payment;
    $a=$request->payment;
    $cart=Cart::content();

   if($request->payment=='Stripe'){
 
     return view('Frontend.payment.stripe',compact('data','a','cart'));


   }

   elseif ($request->payment=='bkash') {

   return view('Frontend.payment.rocket',compact('data','a','cart'));

     
   }

   elseif ($request->payment=='rocket') {
     
     return view('Frontend.payment.rocket',compact('data','a','cart'));

   }

   else{

    $orders =array();
      $order_id=rand(1111,9999);
   $orders['userid'] = Auth::user()->id;
   $orders['Payment_method'] = 'Cash On Delivery';
   $orders['number'] = 0;
   $orders['bln_trt'] = 0;
  $orders['order_id'] =$order_id;
  $invoice=rand(0001,10000);
  $orders['invoice']=$invoice;
  $orders['return_order']=0;
   
   
   if(Session::has('coupon')){
     
     $orders['subtotal'] =$request->total;
   }
   
   else{
     
    $orders['subtotal'] =$request->total; 
     
   }
   
   $orders['month'] = date('m');
   $orders['day'] = date('d');
   $orders['year'] = date('Y');

   
   DB::table('orders')->insert($orders);


   $cart=Cart::content();
   $details=array();
   foreach($cart as $row){
     
     $details['order_id']=$order_id;
     $details['invoice']=$invoice;
     $details['product_id']=$row->id;
     $details['product_Name']=$row->name;
    $details['Qty']=$row->qty;
     $details['Single_Price']=$row->price;
     $details['Totla_price']=$row->qty * $row->price;
    
       DB::table('ordersdetails')->insert($details);
     
     
   }



     $data=array();
     $data['orederid']=$order_id;
    $data['fname']=$request->fname;
    $data['lname']=$request->lname;
    $data['county']=$request->country;
    $data['address']=$request->address1;
    $data['address2']=$request->address2;
    $data['county']=$request->country;
    $data['town']=$request->city;
    $data['state']=$request->state;
    $data['zip']=$request->zip;
    $data['phone']=$request->phone;
    $data['email']=$request->email;
    $data['payment']=$request->payment;

    DB::table('shippings')->insert($data);


    $this->placeorderMailable($request);
  
  Cart::destroy();
  Session::forget('coupon');
  return redirect('/sucess')->with('Success','Order are Placed Succesfully');
   }
    
   



   }

   private function placeorderMailable($request){

 $order_data = [
            'firstname' => $request->input('fname'),
            'lastname' => $request->input('lname'),
            'address' => $request->input('address'),
            'address' => $request->input('address2'),
            'town' => $request->input('city'),
            'district' => $request->input('state'),
            'zip' => $request->input('zip'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'payment' => $request->input('payment'),
             'total' =>$request->input('total'),
             'date' =>date('d-m-Y'),

            
        ];


        $order_id=rand(1111,9999);
        $to=$request->input('email');
        $cart=Cart::content();
        foreach (['chondro.pal@gmail.com', $request->input('email')] as $recipient) {
            Mail::to($recipient)->send(new OrderShipped($order_data,$cart,$order_id));

}



}


   public function paymentstripe(Request $request){

     \Stripe\Stripe::setApiKey('sk_test_51JbP6zDUaTzTHHe5XdBzBaURIO4YfeHixe12YUKUU019ErLAMDcaQ805lXnytd5N3Yu45XZ5I1jbDbjLlVYapTNm00XuQDRE62');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];
 $order_id=rand(1111,9999);




$charge = \Stripe\Charge::create([
  'amount' => Cart::subtotal(),
  'currency' => 'usd',
  'description' => 'Ecommerce',
  'source' => $token,
  'metadata' => ['order_id' => $order_id],
]);




       $orders =array();
   $orders['userid'] = Auth::user()->id;
   $orders['Payment_method'] = 'Stripe';
   $orders['number'] = $charge->last4;
   $orders['bln_trt'] = $charge->balance_transaction;;
  $orders['order_id'] =$order_id;
  $invoice=rand(0001,10000);
  $orders['invoice']=$invoice;
  $orders['return_order']=0;
   
   
   if(Session::has('coupon')){
     
     $orders['subtotal'] = $request->total;
   }
   
   else{
     
    $orders['subtotal'] =Cart::subtotal(); 
     
   }
   
   $orders['month'] = date('m');
   $orders['day'] = date('d');
   $orders['year'] = date('Y');

   
   DB::table('orders')->insert($orders);


   $cart=Cart::content();
   $details=array();
   foreach($cart as $row){
     
     $details['order_id']=$order_id;
     $details['invoice']=$invoice;
     $details['product_id']=$row->id;
     $details['product_Name']=$row->name;
    $details['Qty']=$row->qty;
     $details['Single_Price']=$row->price;
     $details['Totla_price']=$row->qty * $row->price;
    
       DB::table('ordersdetails')->insert($details);
     
     
   }



     $data=array();
     $data['orederid']=$order_id;
    $data['fname']=$request->fname;
    $data['lname']=$request->lname;
    $data['county']=$request->country;
    $data['address']=$request->address1;
    $data['address2']=$request->address2;
    $data['county']=$request->country;
    $data['town']=$request->city;
    $data['state']=$request->state;
    $data['zip']=$request->zip;
    $data['phone']=$request->phone;
    $data['email']=$request->email;
    $data['payment']=$request->payment;

    DB::table('shippings')->insert($data);


    $this->placeorderMailable($request);
  
  Cart::destroy();
  Session::forget('coupon');
  return redirect('/sucess')->with('Success','Order are Placed Succesfully');




   }


   public function bkashpayment(Request $request){

     $orders =array();
      $order_id=rand(1111,9999);
   $orders['userid'] = Auth::user()->id;
   $orders['Payment_method'] = 'Bkash';
   $orders['number'] = $request->payment_no;
   $orders['bln_trt'] = $request->tnx_id;
  $orders['order_id'] =$order_id;
  $invoice=rand(0001,10000);
  $orders['invoice']=$invoice;
  $orders['return_order']=0;
   
   
   if(Session::has('coupon')){
     
     $orders['subtotal'] = $request->total;
   }
   
   else{
     
    $orders['subtotal'] =$request->tbkadh; 
     
   }
   
   $orders['month'] = date('m');
   $orders['day'] = date('d');
   $orders['year'] = date('Y');

   
   DB::table('orders')->insert($orders);


   $cart=Cart::content();
   $details=array();
   foreach($cart as $row){
     
     $details['order_id']=$order_id;
     $details['invoice']=$invoice;
     $details['product_id']=$row->id;
     $details['product_Name']=$row->name;
    $details['Qty']=$row->qty;
     $details['Single_Price']=$row->price;
     $details['Totla_price']=$row->qty * $row->price;
    
       DB::table('ordersdetails')->insert($details);
     
     
   }



     $data=array();
     $data['orederid']=$order_id;
    $data['fname']=$request->fname;
    $data['lname']=$request->lname;
    $data['county']=$request->country;
    $data['address']=$request->address1;
    $data['address2']=$request->address2;
    $data['county']=$request->country;
    $data['town']=$request->city;
    $data['state']=$request->state;
    $data['zip']=$request->zip;
    $data['phone']=$request->phone;
    $data['email']=$request->email;
    $data['payment']=$request->payment;

    DB::table('shippings')->insert($data);


    $this->placeorderMailable($request);
  
  Cart::destroy();
  Session::forget('coupon');
  return redirect('/sucess')->with('Success','Order are Placed Succesfully');

   


   }

   public function rocketpayment(Request $request){


    $orders =array();
      $order_id=rand(1111,9999);
   $orders['userid'] = Auth::user()->id;
   $orders['Payment_method'] = 'Rocket';
   $orders['number'] = $request->payment_no;
   $orders['bln_trt'] = $request->tnx_id;;
  $orders['order_id'] =$order_id;
  $invoice=rand(0001,10000);
  $orders['invoice']=$invoice;
  $orders['return_order']=0;
   
   
   if(Session::has('coupon')){
     
     $orders['subtotal'] = $request->total;
   }
   
   else{
     
    $orders['subtotal'] =$request->total; 
     
   }
   
   $orders['month'] = date('m');
   $orders['day'] = date('d');
   $orders['year'] = date('Y');

   
   DB::table('orders')->insert($orders);


   $cart=Cart::content();
   $details=array();
   foreach($cart as $row){
     
     $details['order_id']=$order_id;
     $details['invoice']=$invoice;
     $details['product_id']=$row->id;
     $details['product_Name']=$row->name;
    $details['Qty']=$row->qty;
     $details['Single_Price']=$row->price;
     $details['Totla_price']=$row->qty * $row->price;
    
       DB::table('ordersdetails')->insert($details);
     
     
   }



     $data=array();
     $data['orederid']=$order_id;
    $data['fname']=$request->fname;
    $data['lname']=$request->lname;
    $data['county']=$request->country;
    $data['address']=$request->address1;
    $data['address2']=$request->address2;
    $data['county']=$request->country;
    $data['town']=$request->city;
    $data['state']=$request->state;
    $data['zip']=$request->zip;
    $data['phone']=$request->phone;
    $data['email']=$request->email;
    $data['payment']=$request->payment;

    DB::table('shippings')->insert($data);


    $this->placeorderMailable($request);
  
  Cart::destroy();
  Session::forget('coupon');
  return redirect('/sucess')->with('Success','Order are Placed Succesfully');

   







   }


   public function sucesspage(){

   if(Auth::check())
    {
      


         $order=orders::where('userid',Auth::user()->id)->latest('id')->first();
     $id=$order->order_id;
     $order_detail=ordersdetails::where('order_id',$id)->get();
      
       
     return view('Frontend.user_sucess',compact('order','order_detail'));  
     }
     
     else{
       
       return view('Frontend.master');
       
     }
     



   }


   public function Wishlist($id){

    if(Auth::id()){

     $product=DB::table('products')->where('id',$id)->first();
     $userid=Auth::id();
     $productid=$product->id;

     $check=DB::Table('whishlists')->where('productid',$productid)->where('userid',$userid)->first();
     $count=DB::Table('whishlists')->where('userid',Auth::id())->count();

     if(!$check){
     
     DB::Table('whishlists')->insert([

     'userid'=>$userid,
      'productid'=>$productid,


     ]);

     $count=$count +1;

     return response()->json([
      'status'=>400,
      'msg'=>'Product are Succesfully Added to whishlists',

      'counts'=>$count,

     ]);


     }


     else{

     return response()->json([
      'status'=>250,
      'msg'=>'Product are already in Whishlist',
      'counts'=>$count,

     ]);

     }






    }


    else{
     
     return response()->json([
      'status'=>200,
      'msg'=>'Plase login First',

     ]);

    }



   }


   public function showwishlist(){

    if(Auth::id()){

    $whislist=DB::table('whishlists')->where('userid',Auth::id())->join('products','products.id','=','whishlists.productid')->select('products.*')->get();

    return view('Frontend.showuserwhislist',compact('whislist'));

    }


    else{

     return view('auth.login');

    }

    



   }


   public function deletewishlist($id){

   $product=DB::Table('whishlists')->where('productid',$id)->first();

   $delid=$product->id;

   $deletewish=whishlist::find($delid);
    $deletewish->delete();
return redirect()->route('user.wishlist')->with('message','Whishlist Delete Successfully');

   }



   public function useraddtocart($id){

    

    $product=DB::table('products')->where('id',$id)->first();

    $data =array();
     if($product->discountprice == NULL){
     $data['id'] =$product->id;
     $data['name'] =$product->productname;
     $data['qty'] =1;
     $data['price'] =$product->price;
     $data['weight'] =1;
     $data['option']['image'] =$product->productimage;
     
     
     Cart::add($data);
     $wish=DB::Table('whishlists')->where('productid',$id)->first();
     $delid=$wish->id;

   $deletewish=whishlist::find($delid);
    $deletewish->delete();

     
      return redirect()->route('front')->with('message','Product added to cart succefully');
   }
   
   else{
     
      $data['id'] =$product->id;
     $data['name'] =$product->productname;
     $data['qty'] =1;
     $data['price'] =$product->discountprice;
     $data['weight'] =1;
     $data['option']['image'] =$product->productimage;
     
      Cart::add($data);

       $wish=DB::Table('whishlists')->where('productid',$id)->first();
     $delid=$wish->id;

   $deletewish=whishlist::find($delid);
    $deletewish->delete();

     return redirect()->route('front')->with('message','Product added to cart succefully');
     
     
   }
  


   }











}
