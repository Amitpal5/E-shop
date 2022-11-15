@extends('Admin.admin_layout')
@section('admin.content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Header and Footer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Header and Footer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Header Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.updateheader')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$header->id}}">
                <input type="hidden" name="old" value="{{$header->logo}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$header->title}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Heading</label>
                    <input type="text" name="heading" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$header->heading}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$header->phone}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Old logo</label>
                    <img src="{{asset('/image/'.$header->logo)}}" width="150px" height="150px">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">New Logo</label>
                    
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
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         

           
            <!-- /.card -->

           
            <!-- /.card -->
            <!-- Horizontal Form -->
            

          </div>
          <!--/.col (left) -->

          <!--/.col (right) -->
        </div>
          <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Footer Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('admin.updateadminfooter')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$footer->id}}">
                <input type="hidden" name="old" value="{{$footer->logo}}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{$footer->phone}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$footer->email}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$footer->address}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Old logo</label>
                    <img src="{{asset('/image/'.$footer->logo)}}" width="150px" height="150px">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">New Logo</label>
                    
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

                  <div class="form-group">
                    <label for="exampleInputPassword1">Facebook Link</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$footer->facebook}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter Link</label>
                    <input type="text" name="twitter" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$footer->twitter}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Linkedin Link</label>
                    <input type="text" name="linkedin" class="form-control" id="exampleInputPassword1" placeholder="Password" value="{{$footer->linkedin}}">
                  </div>


                 
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

         

           
            <!-- /.card -->

           
            <!-- /.card -->
            <!-- Horizontal Form -->
            

          </div>
          <!--/.col (left) -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>



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