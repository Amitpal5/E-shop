@extends('Admin.admin_layout')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                 @php
      
      $cat=DB::table('catagories')->get();
      
      
      
      @endphp
                <h3>{{count($cat)}}</h3>

                <p>Total Catagory</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('admin/catagory/add-catagory')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              @php
                
              $brand=DB::Table('brands')->get();

              @endphp
               
              <h3>{{count($brand)}}</h3>
                <p>Brand</p>
              </div>
               <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
              <a href="{{url('admin/brand')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              @php

              $pro=DB::Table('products')->get();

              @endphp
               
               <h3>{{count($pro)}}</h3>
                <p>Product</p>
              </div>
             <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{url('admin/manage-product')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
              <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
               @php
       
       $today=date('d');
       
       $today_order=DB::table('orders')->where('day',$today)->sum('subtotal');
      
       
       @endphp
                <h3>{{$today_order}} TK</h3>
                

                <p> Today Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
              <a href="{{url('/admin/today')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 @php
       
       $today=date('d');
       
       $today_sales=DB::table('orders')->where('day',$today)->where('status',3)->sum('subtotal');
      

       
       @endphp
                <h3>{{$today_sales}} TK</h3>

                <p>Today Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  @php
      
      
     $month=date('m');

      
      $Profitinsevendays = DB::table('orders')->where('month', '>=', $month)->where('status',3)->sum('subtotal');

    
      
      @endphp
                <h3>{{$Profitinsevendays}} TK</h3>

                <p>This Monthly's Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  @php
      
      
     $year=date('Y');

      
      $Profitinyear = DB::table('orders')->where('year', '>=', $year)->where('status',3)->sum('subtotal');

      @endphp
                <h3>{{$Profitinyear}} TK</h3>

                <p>This Year's Sales</p>
              </div>
               <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                  @php
      $total_return = DB::table('orders')->where('return_order',2)->sum('subtotal');

   @endphp
                <h3>{{$total_return}} TK</h3>

                <p>Return Product</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           
        </div>
    </div>












@endsection