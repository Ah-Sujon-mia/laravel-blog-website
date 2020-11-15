@extends('layouts.admin')

@section('content')
<!-- Editor -->
<!-- <div class="card-body pad">
  <div class="mb-3">
    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;"></textarea>
  </div>
</div> -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content"> 
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row mt-3">
        	<div class="col-lg-12 col-md-12">
        		<div class="card card-primary card-outline">
        			<div class="card-header">
        				<div class="d-flex justify-content-between">
        					<p class="m-0 font-weight-bold lead">Create Setting</p>
        				</div>
        			</div>
        			<div class="card-body">

                <form action="{{route('setting.store',$Setting->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                    <div class="form-row">
                      <div class="col-md-6 form-group">
                        <label>Facebook ID</label>
                        <input type="text" value="{{ $Setting->facebook }}" name="facebook" class="form-control" placeholder="facebook id">
                      </div>

                      <div class="col-md-6 form-group">
                        <label>Twitter ID</label>
                        <input type="text" value="{{ $Setting->twitter }}" name="twitter" class="form-control" placeholder="twitter id">
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="col-md-6 form-group">
                        <label>Linkedin ID</label>
                        <input type="text" value="{{ $Setting->linkedin }}" name="linkedin" class="form-control"  placeholder="linkedin id">
                      </div>

                      <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input type="text" value="{{ $Setting->email }}" name="email" class="form-control"  placeholder="email">
                      </div>
                    </div>
                    
                    <div class="form-row">
                      <div class="col-md-6 form-group">
                        <label>Mobile</label>
                        <input type="number" value="{{ $Setting->phone }}" name="mobile" class="form-control"  placeholder="mobile">
                      </div>
  
                      <div class="col-md-6 form-group">
                        <label>Address</label>
                        <input type="text" value="{{ $Setting->location }}" name="address" class="form-control"  placeholder="address">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="col-md-6 form-group">
                        <label>Description</label>
                        <input type="hidden" name="old_img" value="{{ $Setting->logo }}">
                        <textarea type="text" name="shologan" class="textarea form-control"  placeholder="shologan">{{ $Setting->description }}</textarea>
                      </div>
  
                      <div class="col-md-6 form-group">
                        <div class="d-flex justify-content-between">
                          <div>
                            <label>Logo</label><br>
                            <input type="file" name="logo"><br>
                          </div>
                          <img style="width: 70px; height: 70px;" src="{{ asset('public/website/images/logo/'.$Setting->logo) }}" alt="">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Copyright</label>
                      <textarea type="text" name="copyright" class="form-control" >{{ $Setting->copyright }}</textarea>
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-sm">SUBMIT</button>
                    </div>
                  </div>
                  <!-- /.card-body -->

              </form>

        			</div>
        		</div>
        	</div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
  