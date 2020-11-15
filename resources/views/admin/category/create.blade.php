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
            <h1 class="m-0 text-dark">Create Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{route('category.index')}}">Category list</a></li>
              <li class="breadcrumb-item active">Create Category</li>
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
        	<div class="col-lg-8 col-md-10 col-xl-7 m-auto">
        		<div class="card card-primary card-outline">
        			<div class="card-header">
        				<div class="d-flex justify-content-between">
        					<p class="m-0 font-weight-bold lead">Create Category</p>
        					<a href="{{route('category.index')}}" class="btn btn-sm btn-primary">Go Back to Category List</a>
        				</div>
        			</div>
        			<div class="card-body">

                <form action="{{route('category.store')}}" method="POST">
                  @csrf
                  <div class="card-body">
                    @include('include.errors')
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="name" class="form-control" placeholder="Enter Category Name">
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Category Description"></textarea>
                    </div>
                    
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-sm">Add Category</button>
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
  