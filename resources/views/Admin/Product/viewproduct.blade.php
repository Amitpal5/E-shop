@extends('Admin.admin_layout')
@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card-body">
             
            <div class="row">
     <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
        @foreach($view as $data)
                <div class="form-group">
                  <label class="form-control-label">Product Name<span class="tx-danger">*</span></label>
                <br><strong>{{$data->productname}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code<span class="tx-danger">*</span></label>
                       <br>
             <strong>{{$data->product_code}}</strong>

         </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Quantity<span class="tx-danger">*</span></label>
                <br><strong>{{$data->qty}}</strong>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Catagory<span class="tx-danger">*</span></label>
              
               
        <br><strong>{{$data->catagoryname}}</strong>
                
                </div>
              </div><!-- col-4 -->
        <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Catagory<span class="tx-danger"></span></label>
                   @if($data->subcatagoryid ==NULL)
          <br /> <strong>No Sub Catagory</strong>
          
                 @else
           <br>
        
         <strong>{{$data->subcatagory}}</strong>
        
         @endif
          
        </div>
              </div><!-- col-4 -->
        <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand<span class="tx-danger">*</span></label>
                   @if($data->brandid ==NULL)
          <br /> <strong>No Brand</strong>
          
                 @else
                   
        <br><strong>{{$data->brandname}}</strong>
                
                @endif

                </div>
              </div><!-- col-4 -->
        <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size<span class="tx-danger">*</span></label>
                      <br><strong>{{$data->productsize}}</strong>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour<span class="tx-danger">*</span></label>
                      <br><strong>{{$data->product_colour}}</strong>
                </div>
              </div><!-- col-6 -->
         <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Selling Price<span class="tx-danger">*</span></label>
                      <br><strong>{{$data->price}}</strong>
                </div>
              </div><!-- col-6 -->
          <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Discount Price<span class="tx-danger"></span></label>
                      <br><strong>{{$data->discountprice}}</strong>
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Short Description<span class="tx-danger">*</span></label>
                <textarea name="sdescription" class="form-control" id="textAreaExample6" rows="4">{{$data->shortd}}</textarea>
                </div>
                 @error('sdescription')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-12 -->
             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Full Details</label>
                <textarea name="fdescription" class="form-control" id="textAreaExample6" rows="7">{{$data->longd}}</textarea>
                </div>
                
              </div><!-- col-12 -->
        

           
        
       
         
        
    
        
         </div><!-- row -->
         <hr />
         <br />
         <br />
         <div class="row">
         <div class="col-lg-4">
               <label class="">
         @if($data->bestseller == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
           <span>Best Sellers</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="">
             @if($data->hot_deal == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
          <span>Our Featured</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="">
             @if($data->sales == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
          <span>Sale Products</span>
         </label>
            </div>
      <div class="col-lg-4">
                <label class="">
             @if($data->lproduct == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
          <span>Latest Products</span>
         </label>
            </div>
      <div class="col-lg-4">
                   <label class="">
             @if($data->bweek == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
          <span>Best of the Week</span>
         </label>
            </div>
      <div class="col-lg-4">
               @if($data->popular == 1)
            <span class="badge badge-success">Active</span>
         
         
         @else
          <span class="badge badge-danger">unactive</span>
           
         @endif
          <span>Popular</span>
         </label>
            </div>
            </div>
            <br />
            <br />
            
          </div><!-- form-layout -->
        </div><!-- card -->
    
  @endforeach


      </div>
  </section>



















@endsection