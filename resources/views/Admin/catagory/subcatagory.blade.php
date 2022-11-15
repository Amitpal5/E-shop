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
            <h4>Subcatagory List</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Add a Subcatagory
                </button>
          </div>




       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Subcatagory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.add.subcatagory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                         <div class="col-lg-10">
                <div class="form-group">
                     <label for="">Catagory Name:</label>
          @php

        $cata=DB::Table('catagories')->get();


     @endphp
     <select name="cata_name" class="form-control @error('cat_name') is-invalid @enderror">
      <option value="">Select Catagory Name</option>
      @foreach($cata as $data)
      <option value="{{$data->id}}">{{$data->catagoryname}}</option>
         @endforeach
        </select>
        @error('cata_name')
            <strong class="text-danger">{{$message}}</strong>
                   @enderror  
                </div>
              </div><!-- col-4 -->

                  
              <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subcatagory Name</label>
                    <input type="text" class="form-control" name="subcatagory" id="exampleInputPassword1" placeholder="Enter Sub Catagory Name">
                    @error('subcatagory')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
             
              
                 
             
               
               


                  
                  
              </div>
                 
                 
                </div>
                <!-- /.card-body -->

                
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
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
                  <th>Sl No</th>
                  <th>Catagory Name</th>
                  <th>Sub Catagory Image</th>
                  
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                 
                  @foreach($sub as $data)

                      
                <tr>
                   <td>{{$i++}}</td>
                  <td>{{$data->catagoryname}}</td>
                  <td>{{$data->subcatagory}}</td>
                  
                  
                  

                  
                  <td>
                    
                    
                    
                    
 <a href="{{url('admin/subcatagory/delete',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


                  </td>
                </tr>
               @endforeach
                
                </tbody>
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