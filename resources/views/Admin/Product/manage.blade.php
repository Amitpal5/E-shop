@extends('Admin.admin_layout')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content mt-4">
      <div class="row">
        <div class="col-12">
          
            <!-- /.card-header -->
            
          <!-- /.card -->

          <div class="card">
            <div class="container">

            <div class="row mb-10">
          <div class="col-sm-8 p-3">
            <h4>Catagory List</h4>
            </div>
         




        <!-- /.modal-dialog -->
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                 <th>Catagory</th>
                 <th>Product Name</th>
                 <th>Product Code</th>
                 <th>Product Image</th>
                 <th>Price</th>
                 <th>Discount Price</th>
                 <th>Action</th>
                </tr>
              </thead>
                @foreach($manage as $data)
        <tbody>
         
        <tr>
        
        <td>{{$data->catagoryname}}</td>
        <td>{{$data->productname}}</td>
         <td>{{$data->product_code}}</td>
         <td><img src="{{asset('/Image/'.$data->productimage)}}" width="100px" height="100px" ></td>
         <td>{{$data->price}}</td>
         <td>{{$data->discountprice}}</td>
       
                <td>
   
        <a href="{{url('admin/view-product',$data->id)}}"><i class="fa fa-eye" style="font-size:25px;" title="view"></i></a>
        <a href="{{url('admin/edit-product',$data->id)}}"><i class="fa fa-edit" style="font-size:25px;" title="edit"></i></a>
    <a href="{{url('admin/dish/delete-dish',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>

        
        </td>
        
        
        </tr>
        @endforeach

                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

 <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(130)
        .height(130);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>













@endsection