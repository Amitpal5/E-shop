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
            <h4>Slider List</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Add a Slider
                </button>
          </div>




       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Slider</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.addslider')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  
              

               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heading</label>
                    <input type="text" class="form-control" name="heading" id="exampleInputPassword1" placeholder="Enter Slider Heading">
                    @error('heading')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
              <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Small Heading</label>
                    <input type="text" class="form-control" name="sheading" id="exampleInputPassword1" placeholder="Enter Small Heading">
                    @error('sheading')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
              @php
               
               $cata=DB::Table('catagories')->get();

              @endphp
               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Button Link</label>
                    <select name="link" class="form-control @error('link') is-invalid @enderror">
                   <option value="">Select Catagory Link</option>
                   @foreach($cata as $data)
                   <option value="{{$data->id}}">{{$data->catagoryname}}</option>
                   @endforeach
         
                    </select>    
                  </div>
              </div>

               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Image</label>
                    
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);">
                                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="one">
            </label>
             @error('image')
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
                  <th>Heading</th>
                  <th>Small Heading</th>
                  <th>Image</th>
                  <th>Link</th>
                  
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                 
                  @foreach($slider as $data)

                      
                <tr>
                   <td>{{$i++}}</td>
                  <td>{{$data->heading}}</td>
                  <td>{{$data->smallheading}}</td>
                  <td><img src="{{'/image/'.$data->image}}" width="150px" height="150px"></td>
                  <td>{{$data->catagoryname}}</td>
                  
                  
                  

                  
                  <td>
                    
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    <div id="edit{{$data->id}}" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Slider Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <form action="{{route('admin.updateslider')}}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="modal-body pd-10">
              
        <input type="hidden" name="id" value="{{$data->id}}" >
        <input type="hidden" name="old" value="{{$data->image}}" >
        

          <div class="row">
                   
                    <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heading</label>
                    <input type="text" class="form-control" name="heading" id="exampleInputPassword1" placeholder="Enter Slider Heading" value="{{$data->heading}}">
                    @error('heading')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>

     <div class="col-md-10">
        <div class="form-group">
    <label for="exampleInputEmail1">Small Heading:</label>
    <input type="text" name="smallheading" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->smallheading}}">
 @error('smallheading')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
             <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Link</label>
                     <select name="link" class="form-control @error('link') is-invalid @enderror">
                   <option value="">Select Catagory Link</option>
                   @foreach($cata as $data2)
                   <option value="{{$data2->id}}" {{$data->link == $data2->id ? 'selected' : ''}}>{{$data2->catagoryname}}</option>
                   @endforeach
         
                    </select>       
                  </div>
              </div>
               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Image</label>
                    <img src="{{asset('/image/'.$data->image)}}" width="200" height="200">
                  </div>
              </div>

               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Slider Image</label>
                    
             <label class="custom-file">
           <input type="file" id="file" class="custom-file-input" name="image" onchange="readURL(this);">
                                   <label class="custom-file-label" for="exampleInputFile">Choose file</label>

         <span class="custom-file-control"></span>
     <img src="#" id="one">
            </label>
             @error('image')
             <strong class="text-danger">{{$message}}</strong>
                      @enderror
    
                  </div>
                  
              </div>




 


     </div><!-- modal-body -->
              <div class="modal-footer">
               <input type="submit" class="btn btn-primary" value="UPDATE" />
        </form>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
    </div>

                    
                    
 <a href="{{url('admin/delete-slide',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


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