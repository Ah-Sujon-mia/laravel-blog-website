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
            <h1 class="m-0 text-dark">Create Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="{{route('posts.index')}}">Post list</a></li>
              <li class="breadcrumb-item active">Create Post</li>
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
        					<p class="m-0 font-weight-bold lead">View Post</p>
        					<a href="{{route('posts.index')}}" class="btn btn-sm btn-primary">Go Back to Post List</a>
        				</div>
        			</div>
        			<div class="card-body">
						<div class="blog">
							<img src="{{asset('public/admin/post-img/'.$Post->image)}}" width="100%" height="300px">
							<h5 class="mb-3 mt-3"><strong>Title:</strong> {{$Post->title}}</h5>
							<p><strong>Description:</strong> {{$Post->description}}</p>
							<p><strong>Category:</strong> {{$Post->Category->name}}</p>
							<p><strong>Author by:</strong> {{ucwords(Auth::user()->name)}}</p>
							<p><strong>Publish:</strong> {{Carbon\Carbon::parse($Post->publish_at)->diffForHumans()}}</p>
	                	</div>
        			</div>
        		</div>
        	</div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
