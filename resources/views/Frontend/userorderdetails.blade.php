@extends('Frontend.frontend_layouts')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('fro/css/style.min.css')}}">

@endsection
@section('frontend.content')


<main class="main account">
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
                        <li>User Oder Details</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-4 mb-10 pb-6" style="padding:50px;">
               <table class="order-table" >
                                    <thead>
                                        <tr>
                                            <th class="pl-2">Order</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Signle Price</th>
                                            <th>Total Price</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ordersdetails as $data4)
                                        <tr>
                                            <td class="order-number"><a href="#">{{$data4->order_id}}</a></td>
                                            <td class="order-date"><span>{{$data4->product_Name}}</span></td>
                                            <td class="order-date"><span>{{$data4->Qty}}</span></td>
                                            <td class="order-total"><span>{{$data4->Single_Price}} TK</span></td>
                                            <td class="order-total"><span>{{$data4->Totla_price}} TK</span></td>
                                            
                                        </tr>
                                        @endforeach
                                     
                                       
                                      
                                     
                                    </tbody>
                                </table>
            </div>
        </main>

















@endsection