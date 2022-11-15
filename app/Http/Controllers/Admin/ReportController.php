<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\orders;

class ReportController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
}



 public function todayorder(){
		
		
		$today=date('d');
		$order=orders::where('day',$today)->where('status',0)->get();
		
		
		return view('Admin.report.today_order',compact('order'));
		
	}



     public function todaydeliveryorder(){
		
		
		$today=date('d');
		$orders=orders::where('day',$today)->where('status',3)->paginate(10);
		
		
		return view('Admin.report.today_deliveryorder',compact('orders'));
		
	}


      public function Thismonth(){
		
		
		$month=date('m');
		$orders=orders::where('month',$month)->where('status',3)->get();
		$total=orders::where('month',$month)->where('status',3)->sum('subtotal');
		
		
		return view('Admin.report.thismonth_order',compact('orders','total'));
		
	}


  public function search(){
		
		
		return view('Admin.report.search_report');
		
	}

public function searchbyyear(Request $request){
		
		$year=$request->year;
		
		$orders=orders::where('year',$year)->where('status',3)->get();
		$total=orders::where('year',$year)->where('status',3)->sum('subtotal');
		
		
		return view('Admin.report.search_report_year',compact('orders','total'));
		
		
		
	}


	public function searchbymonth(Request $request){
		
		$month=$request->month;
		
		$orders=orders::where('month',$month)->where('status',3)->paginate(10);
		$total=orders::where('month',$month)->where('status',3)->sum('subtotal');
		
		
		return view('Admin.report.search_report_month',compact('orders','total'));
		
		
		
	}

	public function searchbydate(Request $request){
		
		$date=$request->date;
		$newdate=date('d',strtotime($date));
		
		
		$orders=orders::where('day',$newdate)->where('status',3)->paginate(10);
		$total=orders::where('day',$newdate)->where('status',3)->sum('subtotal');
		
		return view('Admin.report.search_report_date',compact('orders','total'));
		
		
		
	}
}
