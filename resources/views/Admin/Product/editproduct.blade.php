@extends('Admin.admin_layout')
@section('admin.content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
             <form action="{{route('admin.updateproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
             <input type="hidden" name="id" value="{{$edit->id}}" />
     <input type="hidden" name="old_image1" value="{{$edit->productimage}}" />
     <input type="hidden" name="old_image2" value="{{$edit->image2}}" />
     <input type="hidden" name="old_image3" value="{{$edit->image3}}" />
      <input type="hidden" name="sub" value="{{$edit->subcatagoryid}}" />
            <div class="row">
              
          
                 <div class="col-lg-4">
                <div class="form-group">
                     <label for="">Catagory Name <span class="tx-danger">*</span></label>
     @php

        $cata=DB::Table('catagories')->get();


     @endphp
     <select name="cata_name" class="form-control @error('cat_name') is-invalid @enderror">
      <option value="">Select Catagory Name</option>
      @foreach($cata as $data)
      <option value="{{$data->id}}" {{$edit->catagoryid == $data->id ? 'selected' : ''}} >{{$data->catagoryname}}</option>
         @endforeach
        </select>
        @error('cata_name')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror  
                </div>
              </div><!-- col-4 -->

                 <div class="col-lg-4">
                <div class="form-group">
                     <label for="">Old Sub Catagory Name <span class="tx-danger">*</span></label>

                   <input class="form-control" type="text" value="{{$edit->subcatagory}}">
       
                </div>
              </div><!-- col-4 -->

                 <div class="col-lg-4">
                <div class="form-group">
                     <label for="">New Sub Catagory Name <span class="tx-danger">*</span></label>

     <select name="sub_name" class="form-control @error('sub_name') is-invalid @enderror">
      <option value="">Select Sub Catagory Name</option>
      
        </select>
        @error('sub_name')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror  
                </div>
              </div><!-- col-4 -->

                    <div class="col-lg-4">
                <div class="form-group">
                     <label for="">Brand Name</label>
         @php

        $brand=DB::Table('brands')->get();
         @endphp
     <select name="brand_name" class="form-control @error('cat_name') is-invalid @enderror">
      <option value="">Select Brand Name</option>
      @foreach($brand as $data1)
      <option value="{{$data1->id}}" {{$edit->brandid==$data1->id ? 'selected' : ''}}>{{$data1->brandname}}</option>
         @endforeach
        </select>
        @error('brand_name')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror  
                </div>
              </div><!-- col-4 -->


                  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product" value="{{$edit->productname}}">
                  @error('product')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group">
                  
                  <label class="form-control-label">Product Code<span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="productcode"  placeholder="Enter Product Code" value="{{$edit->product_code}}">
                  @error('productcode')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
                  <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size</label>
                  <input class="form-control" type="text" name="size" value="{{$edit->productsize}}">
                  @error('size')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour</label>
                  <input class="form-control" type="text" name="colour" value="{{$edit->product_colour}}">
                  @error('colour')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Qty</label>
                  <input class="form-control" type="text" name="qty" value="{{$edit->qty}}">
                  @error('qty')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Price</label>
                  <input class="form-control" type="text" name="price" value="{{$edit->price}}">
                  @error('price')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->
               <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Product Discount Price</label>
                  <input class="form-control" type="text" name="dprice" value="{{$edit->discountprice}}">
                  @error('dprice')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
                </div>
              </div><!-- col-4 -->



               

             <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Short Description<span class="tx-danger">*</span></label>
                <textarea name="sdescription" class="form-control" id="textAreaExample6" rows="4">{{$edit->shortd}}</textarea>
                </div>
                 @error('sdescription')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-12 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Full Details</label>
                <textarea name="fdescription" class="form-control" id="textAreaExample6" rows="7" >{{$edit->longd}}</textarea>
                </div>
                 @error('fdescription')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-12 -->
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Old Image one<span class="tx-danger"></span></label>
                 
                <img src="{{asset('/Image/'.$edit->productimage)}}" width="105;" height="105">
                </div>
              </div><!-- col-6 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Old Image Two<span class="tx-danger"></span></label>
                 
                <img src="{{asset('/Image/'.$edit->image2)}}" width="105;" height="105">
                </div>
              </div><!-- col-6 -->
               <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Old Image Three<span class="tx-danger"></span></label>
                 
                <img src="{{asset('/Image/'.$edit->image3)}}" width="105;" height="105">
                </div>
              </div><!-- col-6 -->
      <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image One (Main Thumbnail)<span class="tx-danger">*</span></label>
               
              
                @error('image_1')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image_1" onchange="readURL(this);">
                                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="one">
            </label>
   

   

         </div>
          @error('image_1')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-4 -->
         
      <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Two<span class="tx-danger">*</span></label>
               
              
                @error('image_1')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image_2" onchange="readURL(this);">
                                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="two">
            </label>
   

   

         </div>
          @error('image_1')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-4 -->
         
      <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image Three<span class="tx-danger">*</span></label>
               
              
                @error('image_1')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror 
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image_3" onchange="readURL(this);">
                                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="three">
            </label>
   

   

         </div>
          @error('image_1')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror
              </div><!-- col-4 -->
           
              
    
         </div><!-- row -->
            <hr />
         <br />
         <br />
         <div class="row">
         <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="bestseller" value="1" <?php  if($edit->bestseller == 1) 
      {echo "checked";} ?>>
          <span>Best Sellers</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="hot_deal" value="1" <?php  if($edit->hot_deal == 1) 
      {echo "checked";} ?>>
          <span>Our Featured</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="sales" value="1" <?php  if($edit->sales == 1) 
      {echo "checked";} ?>>
          <span>Sale Products</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="lproduct" value="1" <?php  if($edit->lproduct == 1) 
      {echo "checked";} ?>>
          <span>Latest Products</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="bweek" value="1" <?php  if($edit->bweek  == 1) 
      {echo "checked";} ?>>
          <span>Best of the Week</span>
         </label>
            </div>
      <div class="col-lg-4">
               <label class="ckbox">
            <input type="checkbox" name="popular" value="1" <?php  if($edit->popular  == 1) 
      {echo "checked";} ?>>
          <span>Popular</span>
         </label>
            </div>
            </div>
           <br>
       
      
             <input type="submit" class="btn btn-primary" value="Submit">
            <!-- /.row -->

            
      </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        
        </div>
        <!-- /.card -->

        <!-- SELECT2 EXAMPLE -->
     
        </div>
        <!-- /.card -->

        
        <!-- /.card -->

      
    </section>
    <!-- /.content -->
  </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  
  $(document).ready(function(){
          $('select[name="cata_name"]').on('change',function(){
          var cataid = $(this).val();
          

          if (cataid) {
            
            $.ajax({
              url: "{{ url('admin/product/get/subname') }}/"+cataid,
              type:"GET",
              dataType:"json",
              success:function(data) { 
                
              $('select[name="sub_name"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="sub_name"]').append('<option value="'+ value. id+ '">' + value.subcatagory + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });
</script>







@endsection

  