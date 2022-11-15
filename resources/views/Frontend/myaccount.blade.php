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
                        <li>Account</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-4 mb-10 pb-6">
                <div class="container">
                    <h2 class="title title-center mb-10">My Account</h2>
                    <div class="tab tab-vertical gutter-lg">
                        <ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#orders">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#downloads">Return Orders</a>
                            </li>
                          
                            <li class="nav-item">
                                <a class="nav-link" href="#account">Password Change</a>
                            </li>
                            <li class="nav-item">
                              <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">  Logout</a>
                            </li>
                        </ul>
                        <div class="tab-content col-lg-9 col-md-8">
                            <div class="tab-pane active" id="dashboard">
                                <p class="mb-0">
                                    Hello <span>{{Auth::user()->name}}</span> (not <span>{{Auth::user()->name}}</span>)
                                </p>
                                <p class="mb-8">
                                    From your account dashboard you can view your
                                    <a href="#orders" class="link-to-tab text-primary">recent orders, manage your
                                        shipping and
                                        billing
                                        addresses,<br>and edit your password and account details</a>.
                                </p>
                                <a href="shop.html" class="btn btn-dark btn-rounded">Go To Shop<i
                                        class="d-icon-arrow-right"></i></a>
                            </div>
                            <div class="tab-pane" id="orders">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th class="pl-2">Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th class="pr-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $data4)
                                        <tr>
                                            <td class="order-number"><a href="#">{{$data4->order_id}}</a></td>
                                            <td class="order-date"><span>{{$data4->day}}-{{$data4->month}}-{{$data4->year}}</span></td>
                                            <td class="order-status">
                                            @if($data4->status==0)
                                               
                                           <span>Pending</span>
                                            @elseif($data4->status==1)
                                            <span>Accept Order</span>
                                            @elseif($data4->status==2)
                                            <span>Hand Over delivery man</span>
                                            @else
                                            <span>Delivery</span>
                                            @endif
 

                                       </td>
                                            <td class="order-total"><span>{{$data4->subtotal}} TK</span></td>
                                            <td class="order-action"><a href="{{url('/user-order-details',$data4->order_id)}}"
                                                    class="btn btn-primary btn-link btn-underline ml-2">View</a><a href="{{route('user.pdf',['id'=>$data4->id,'order_id' =>$data4->order_id])}}" class="btn btn-primary btn-link btn-underline ">Invoice</a></td>

                                        </tr>
                                        @endforeach
                                     
                                       
                                      
                                     
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="downloads">
                                 <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Order ID</th>
                                                                <th>Date</th>
                                                                <th>Return</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order as $data)
                                                            <tr>
                                                                <td>{{$data->order_id}}</td>
                                                                <td>{{$data->day}}-{{$data->month}}-{{$data->year}}</td>
                                                                <td>
                                                                
                                                                @if($data->return_order  == NULL)
                                                            <span class="badge badge-warning">No Return</span>
                                                                @elseif($data->return_order == 0)
                                                   <span class="badge badge-waring">No Return</span>
                                                       @elseif($data->return_order  == 1)
                                                   <span class="badge badge-waring">Pending</span>
                                                                @else
                                                                  <span class="badge badge-success">Success</span>
                                                                @endif
                                    </td>
             <td>@if($data->status == 0)
            
               <span class="badge badge-warning">Pendding</span>
            @elseif($data->status   == 1)
            <span class="badge badge-info">Accept Order</span>
            @elseif($data->status   == 2)
            <span class="badge badge-info">Hand Over to Delivery boy</span>
            @elseif($data->status   == 3)
            <span class="badge badge-success">Delivered</span>
            
            
            
            @else
                <span class="badge badge-danger">Cancel</span>
            @endif</td>
                                                                <td>{{$data->subtotal}} TK</td>
                                                                
                                                                <td>
                                                                @if($data->status == 3)
                                                                @if($data->return_order == NULL)
                                                                
                                        <a href="{{url('/return_product',$data->id)}}" class="check-btn sqr-btn ">Return Product</a></td>

                                                                @elseif($data->return_order == 0)
                                         <a href="{{url('/return_product',$data->id)}}" class="check-btn sqr-btn ">Return Product</a></td>

                                                        @else
                                                        <h4>Request are Done</h4>  
                                                         @endif
                                                                                                 
                                                            @else
                                                            <h4>Request not possible</h4>   
                                                              @endif                                                        
                                                                
                                                                
                                                          
                                                         


                                                          </tr>
                                                           @endforeach 
                                                        </tbody>
                                                    </table>
                            </div>
                          
                            <div class="tab-pane" id="account">
                                @if($user->provider=='google')
                                 <p>You are using Google Login.You don,t need a change password</p>
                                @else
                                <form action="{{route('user.changepassword')}}" class="form" method="post">
                                    @csrf

                                
                                    <fieldset>
                                        <legend>Password Change</legend>
                                       

                                        <label>New password </label>
                                        <input type="password" class="form-control" name="new_password">

                                        <label>Confirm New password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </fieldset>

                                    <button type="submit" class="btn btn-primary">SAVE CHANGES</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

















@endsection