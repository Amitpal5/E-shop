<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style type="text/css">
    


.padding{

  padding: 2rem !important;
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2;
}

h3 {
    font-size: 20px;
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium';
}

.text-dark {
    color: #3d405c !important;
}


.column {
  float: left;
  width: 50%;
}






</style>
</head>
<body>



 <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
<div class="card">
<div class="card-header p-4">
<h3>RIDEO</h3><div class="float-right"><h3>
    @php
     $date=date('d-m-Y');
    @endphp
Date: {{$date}}</div></h3>
</div>
<div class="row mb-4" style="margin-top:20px;">
<div class="column">
<b><h3 class="mb-3">Order Details:</h3></b>
<h3 class="text-dark mb-1">Invoice ID:{{$order->invoice}}</h3>
<div>Order ID:{{$order->order_id}}</div>
<div>Payment Method:{{$order->Payment_method}}</div>
<div>@if($order->Payment_method=='Stripe')</div>
<div>Balence Transaction:{{$order->bln_trt}}</div>
@elseif($order->Payment_method=='Bkash')
<div>Bkash Number:{{$order->number}}</div>
<div>Balence Transaction:{{$order->bln_trt}}</div>
@elseif($order->Payment_method=='Rocket')
<div>Bkash Number:{{$order->number}}</div>
@else
@endif
<div>Order Date:{{$order->day}}-{{$order->month}}-{{$order->year}}</div>
</div>
<div class="column">
<b><h3 class="mb-3">Shipping Details:</h3></b>
<h3 class="text-dark mb-1">{{$ship->fname}} {{$ship->lname}}</h3>
<div>Address:{{$ship->address}},</div>
<div>{{$ship->town}},{{$ship->state}},{{$ship->zip}}</div>
<div>Email:{{$ship->email}}</div>
<div>Phone:{{$ship->phone}}</div>
</div>
</div>
<div class="table-responsive-sm" style="padding-top:180px;">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th class="right">Price</th>
<th class="center">Qty</th>
<th class="right">Total</th>
</tr>
</thead>
<tbody>
    @php $i=1; @endphp
    @foreach($orderdetails as $data)
<tr>
<td class="center">{{$i++}}</td>
<td class="left strong">{{$data->product_Name}}</td>
<td class="right">{{$data->Single_Price}} TK</td>
<td class="center">{{$data->Qty}}</td>
 <td class="right">{{$data->Totla_price}} TK</td>
</tr>
@endforeach



</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">
</div>
<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
<strong class="text-dark">Subtotal</strong>
</td>
<td class="right">{{$order->subtotal}} TK</td>
</tr>

<tr>
<td class="left">
<strong class="text-dark">Total</strong>
 </td>
<td class="right">
<strong class="text-dark">{{$order->subtotal}} TK</strong>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="card-footer bg-white">
<p class="mb-0">ecommerce.com, F. R. Tower, 32, Kemal Ataturk Avenue, Banani, Dhaka-1213</p>
</div>
</div>
</div>

</body>
</html>