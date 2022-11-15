<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\orders;
use DB;

class OrderController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');



}

public function pending_order(){

$order=orders::where('Status',0)->paginate(10);
		return view('Admin.order.admin_pending',compact('order'));

  }


public function vieworder($id,$order_id){
		
		$orders=DB::table('orders')->join('users','orders.userid','users.id')->
		select('orders.*','users.name','users.email')->where('orders.id',$id)->first();
		
		
		$ships=DB::table('shippings')->where('orederid',$order_id)->first();
		$orderss=DB::table('ordersdetails')->where('order_id',$order_id)->get();
		
		
		return view('Admin.order.view_orders',compact('orders','ships','orderss'));
		
	}


public function accept_order($acc_id){
		
		$orders=DB::table('orders')->where('orders.id',$acc_id)->update(['status'=>1]);
		
	return redirect()->route('admin.order')->with('message','Order Are Accept Succesfully');

		
		
		
		
	}

	public function cancel_order($cancel_id){
		
		$orders=DB::table('orders')->where('orders.id',$cancel_id)->update(['status'=>4]);
		
	return redirect()->route('admin.order')->with('error','Order Are Cancel Succesfully');
		
		
	}

	public function acceptorder(){
		
		$order=orders::where('Status',1)->paginate(10);
		return view('Admin.order.admin_accept_order',compact('order'));
		
	}


public function viewacceptorder($id,$order_id){
		
		$orders=DB::table('orders')->join('users','orders.userid','users.id')->
		select('orders.*','users.name','users.email')->where('orders.id',$id)->first();
		
		
		$ships=DB::table('shippings')->where('orederid',$order_id)->first();
		$orderss=DB::table('ordersdetails')->where('order_id',$order_id)->get();
		
		
		return view('Admin.order.aceept_view_order',compact('orders','ships','orderss'));
		
	}


	public function accept_deliveryorder($de_id){
		
		$orders=DB::table('orders')->where('orders.id',$de_id)->update(['status'=>2]);
		
	return redirect()->route('admin.accept.order')->with('message','Product are Hand over to Delivery Boy succefully');

		
		
		
		
	}

	public function deliverymanorder(){
		
		$order=orders::where('status',2)->paginate(10);
		return view('Admin.order.delivery_accept_order',compact('order'));
		
	}
	
	public function viewdeliveryacceptorder($id,$order_id){
		
		$orders=DB::table('orders')->join('users','orders.userid','users.id')->
		select('orders.*','users.name','users.email')->where('orders.id',$id)->first();
		
		
		$ships=DB::table('shippings')->where('orederid',$order_id)->first();
		$orderss=DB::table('ordersdetails')->where('order_id',$order_id)->get();
		
		
		return view('admin.order.delivery_man_accept',compact('orders','ships','orderss'));
		
	}
	
  public function completedorder($completed_id){
		
		$orders=DB::table('orders')->where('orders.id',$completed_id)->update(['status'=>3]);
		
	return redirect()->route('admin.delivery.order')->with('message','Product are Deliver Succesfully');

		
		
		
		
	}
	

public function scuccesorder(){
		
		$order=orders::where('status',3)->paginate(10);
		return view('Admin.order.succed_order',compact('order'));
		
	}
	
	public function viewsuccedorder($id,$order_id){
		
		$orders=DB::table('orders')->join('users','orders.userid','users.id')->
		select('orders.*','users.name','users.email')->where('orders.id',$id)->first();
		
		
		$ships=DB::table('shippings')->where('orederid',$order_id)->first();
		$orderss=DB::table('ordersdetails')->where('order_id',$order_id)->get();
		
		
		return view('Admin.order.view_succed_order',compact('orders','ships','orderss'));
		
	}


  public function cancelorder(){
		
		$order=orders::where('status',4)->paginate(10);
		return view('Admin.order.cancel_order',compact('order'));
		
	}


	public function invoicepdf($id,$order_id){

	$order=DB::table('orders')->where('id',$id)->first();
	$ship=DB::table('shippings')->where('orederid',$order_id)->first();
	$orderdetails=DB::table('ordersdetails')->where('order_id',$order_id)->get();

     return view('Admin.order.invoicepdf',compact('order','ship','orderdetails'));

	}
}
