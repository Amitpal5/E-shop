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
            <h4>Admin Pending Order List</h4>
            </div>
        




       
      </div>


</div>
                    </div>


            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                 <tr>
                   <th>Date</th>
                 <th>Order ID</th>
                 <th>Payment Method</th>
                 <th>Sub Total</th>
                 <th>Status</th>
                 
                 <th>Action</th>
                </tr>
              </thead>
       @foreach($order as $data)
        <tbody>
         
        <tr>
        <td>{{$data->day}}-{{$data->month}}-{{$data->year}}</td>
        <td>{{$data->order_id}}</td>
         <td>{{$data->Payment_method}}</td>
         <td>{{$data->subtotal}} TK</td>
           <td>@if($data->Status	== 0)
			<span class="badge badge-warning">Pendding</span>
			@elseif($data->Status	== 1)
			<span class="badge badge-info">Accept Order</span>
			@elseif($data->Status	== 2)
			<span class="badge badge-info">Hand Over to Delivery boy</span>
			@elseif($data->Status	== 3)
			<span class="badge badge-success">Delivered</span>

			
			
			
			@else
				<span class="badge badge-danger">Cancel</span>
			@endif</td>
       
                <td>
    <a href="{{route('show.order',['id'=>$data->id,'order_id' =>$data->order_id])}}"><i class="fa fa-edit" style="font-size:25px;"></i></a>
    

        
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