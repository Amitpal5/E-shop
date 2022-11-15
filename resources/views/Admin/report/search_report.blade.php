@extends('Admin.admin_layout')
@section('admin.content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Report</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Search Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Serach By Date</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('date.report')}}" method="post">
			  @csrf
                <div class="card-body">
                  <div class="form-group">
                      <label class="">Serach By Date</label>
                <div class="col-sm-12 mg-t-10 mg-sm-t-0">
                  <input type="date" class="form-control" name="date" >
                </div>
                  </div>
                 
                 
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

            
            <!-- /.card -->

          
          

          </div>
          <!--/.col (left) -->
               <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Serach By Month</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form action="{{route('month.report')}}" method="post">
			 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serach By Month</label>
                    <select name="month" id="" class="form-control">
				 
				 <option value="01">January</option>
				 <option value="02">February</option>
				 <option value="03">March</option>
				 <option value="04">April</option>
				 <option value="05">May</option>
				 <option value="06">June</option>
				 <option value="07">July</option>
				 <option value="08">August</option>
				 <option value="09">September</option>
				 <option value="10">October</option>
				 <option value="11">November</option>
				 <option value="12">December</option>
				 
				 
				 
				 
				 
				 
				 
				 </select>
                  </div>
                 
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

            
            <!-- /.card -->

          
          

          </div>
          <!--/.col (left) -->
            <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Serach By Year</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('year.report')}}" method="post">
			 @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Serach By Year</label>
                     <select name="year" id="" class="form-control">
				 
				 
				 <option value="2022">2022</option>
				 <option value="2023">2023</option>
				 <option value="2024">2024</option>
				 <option value="2025">2024</option>
				
				 
				 
				 
				 
				 
				 
				 </select>
                  </div>
                
             
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

            
            <!-- /.card -->

          
          

          </div>
          <!--/.col (left) -->
        
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

















@endsection