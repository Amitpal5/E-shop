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
            <h4>Coupon List</h4>
            </div>
          <div class="col-sm-4 p-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                  Add a Coupon
                </button>
          </div>




       <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add a Coupon</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" action="{{route('admin.addcoupon')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  
              <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Type</label>
                    <select name="coupontype" class="form-control @error('coupontype') is-invalid @enderror">
                   <option value="">Select Coupon Type</option>
                   <option value="Percentage">Percentage</option>
                   <option value="Fixed">Fixed</option>
         
                    </select>
                    @error('coupontype')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>

               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Name</label>
                    <input type="text" class="form-control" name="couponname" id="exampleInputPassword1" placeholder="Enter Coupon Name">
                    @error('couponname')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
              <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label>
                    <input type="text" class="form-control" name="couponcode" id="exampleInputPassword1" placeholder="Enter Coupon Code">
                    @error('couponcode')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Amount</label>
                    <input type="text" class="form-control" name="couponamount" id="exampleInputPassword1" placeholder="Enter Coupon Amount">
                    @error('couponamount')
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
                  <th>Coupon Type</th>
                  <th>Coupon Name</th>
                  <th>Coupon Code</th>
                  <th>Amount</th>
                  
                  
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                  @php($i=1)
                 
                  @foreach($coupon as $data)

                      
                <tr>
                   <td>{{$i++}}</td>
                  <td>{{$data->coupon_type}}</td>
                  <td>{{$data->couponname}}</td>
                  <td>{{$data->couponcode}}</td>
                  <td>
                  @if($data->coupon_type=='Percentage')
                  {{$data->Amount}}%
                  @else
                  {{$data->Amount}}Tk
                  @endif


                  	</td>
                  
                  
                  

                  
                  <td>
                    
                    <a data-toggle="modal" data-target="#edit{{$data->id}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    <div id="edit{{$data->id}}" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Coupon Information</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <form action="{{route('admin.updatecoupon')}}" method="post" enctype="multipart/form-data">
        @csrf

              <div class="modal-body pd-10">
              
        <input type="hidden" name="id" value="{{$data->id}}" >
        

          <div class="row">
                   
 <div class="col-md-10">
        <div class="form-group">
    <label for="exampleInputEmail1">Coupon Type:</label>
    <input type="text" name="coupontype" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->coupon_type}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>

<div class="col-md-10">
        <div class="form-group">
    <label for="exampleInputEmail1">Coupon Name:</label>
    <input type="text" name="couponname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->couponname}}">
 @error('class_name')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror


 </div>
</div>
 <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Code</label>
                    <input type="text" class="form-control" name="couponcode" id="exampleInputPassword1" placeholder="Enter Coupon Code" value="{{$data->couponcode}}">
                    @error('couponcode')
                           <strong class="text-danger">{{$message}}</strong>
                                  @enderror     
                  </div>
              </div>
               <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Coupon Amount</label>
                    <input type="text" class="form-control" name="couponamount" id="exampleInputPassword1" placeholder="Enter Coupon Amount" value="{{$data->Amount}}">
                    @error('couponamount')
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

                    
                    
 <a href="{{url('admin/coupondelete',$data->id)}}"><i class="fa fa-trash" style="font-size:25px; color:red;"></i></a>


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

 













@endsection