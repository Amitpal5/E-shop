@extends('Admin.admin_layout')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Order Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Order Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                   <tr>
       
      <th>Name:</th>
       <th>{{$orders->name}}</th>
       
    </tr>
     <tr>
       
      <th>Email:</th>
       <th>{{$orders->email}}</th>
       
    </tr>
     <tr>
       
      <th>Paymenr Method:</th>
       <th>{{$orders->Payment_method}}</th>
       
    </tr>
    @if($orders->Payment_method=='Stripe')
         <tr>
       
      <th>Stripe Transaction:</th>
       <th>{{$orders->bln_trt}}</th>
       
    </tr>
    </tr>
    @elseif($orders->Payment_method=='Bkash')
    <tr>
       
      <th>Bkash Number:</th>
       <th>{{$orders->number}}</th>
       
    </tr>
    <tr>
       
      <th>Bkash Transaction:</th>
       <th>{{$orders->bln_trt}}</th>
       
    </tr>
    @elseif($orders->Payment_method=='Rocket')
    <tr>
       
      <th>Rocket Number:</th>
       <th>{{$orders->number}}</th>
       
    </tr>
    <tr>
       
      <th>Rocket Transaction:</th>
       <th>{{$orders->bln_trt}}</th>
       
    </tr>
    @else
    @endif
    
     <tr>
      <th>Total:</th>
       <th>{{$orders->subtotal}}TK</th>
       
    </tr>
        <tr>
       
      <th>Month:</th>
       <th>{{$orders->month}}</th>
       
    </tr>
    <tr>
       
      <th>Date:</th>
       <th>{{$orders->day}}-{{$orders->month}}-{{$orders->year}}</th>
       
    </tr>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
              <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Shipping Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                 <tr>
       
      <th>Name:</th>
       <th>{{$ships->fname}} {{$ships->lname}} </th>
       
    </tr>
     <tr>
       
      <th>Email:</th>
       <th>{{$ships->email}}</th>
       
    </tr>
     <tr>
       
      <th>Phone:</th>
       <th>{{$ships->phone}}</th>
       
    </tr>
     <tr>
       
      <th>Address:</th>
       <th>{{$ships->address}}</th>
       
      </tr>
       <tr>
       
      <th>Town:</th>
       <th>{{$ships->town}}</th>
       
      </tr>
      
       <tr>
       
      <th>District:</th>
       <th>{{$ships->state}}</th>
       
      </tr>
       <tr>
       
      <th>Zip:</th>
       <th>{{$ships->zip}}</th>
       
      </tr> 
       <tr>
       
      <th>Status:</th>
      <th>
      @if($orders->status == 0)
      <span class="badge badge-warning">Pendding</span>
      @elseif($orders->status == 1)
      <span class="badge badge-info">Accept Order</span>
      @elseif($orders->status == 2)
      <span class="badge badge-info">Hand Over to Delivery boy</span>
      @elseif($orders->status == 3)
      <span class="badge badge-success">Delivered</span>

      
      
      
      @else
        <span class="badge badge-danger">Cancel</span>
      @endif
      
      
      </th>
       
      </tr> 
      
                </table>
              </div>
              <!-- /.card-body -->
             
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
    
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Items</h3>

               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                <tr>
                
                 <th>Product Name</th>
                 <th>Producr Qty</th>
                 <th>Producr Price</th>
                 <th>Total</th>
                
                
                </tr>
              </thead>
       @foreach($orderss as $data)
        <tbody>
         
        <tr>
      
        <td>{{$data->product_Name}}</td>
      <td>{{$data->Qty}}</td>
         <td>{{$data->Single_Price}}TK</td>
         <td>{{$data->Totla_price}}TK</td>
       
               
        

        
        
        
        
        </tr>
        @endforeach
        
        
        
        </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
            <!-- /.card -->
           <a href="/deliveryed/accept/{{$orders->id}}" class="btn btn-success btn-block mt-2">Delivered</a>
    <a href="/cancel/{{$orders->id}}" class="btn btn-danger btn-block">Cancel Order</a>
          </div>
        </div>
        <!-- /.row -->

  
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->












@endsection