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
                                <p class="m-0 font-weight-bold lead">Create Post</p>
                                <a href="{{route('posts.index')}}" class="btn btn-sm btn-primary">Go Back to Post
                                    List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @include('include.errors')
                                    <div class="form-group">
                                        <label>Post Name</label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="Enter Post Title Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Post Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="">--Select One--</option>
                                            @foreach($Category as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Tags</label>
                                        <div class="d-flex justify-content-start">
                                            @foreach($Tag as $value)
                                        <div class="form-check mr-2">
                                            <input type="checkbox" name="post_tag[]" value="{{$value->id}}"
                                                class="form-check-input" id="tag{{$value->id}}">
                                            <label class="form-check-label"
                                                for="tag{{$value->id}}">{{$value->name}}</label>
                                        </div>
                                        @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="textarea form-control" cols="30" rows="5"
                                            placeholder="Post Description" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <p class="font-weight-bold mb-1">Post Image</p>
                                        <div class="custom-file">
                                            <input type="file" name="post_image" class="custom-file-input">
                                            <label class="custom-file-label" data-browse="Browse">
                                                Choose image
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Add Post</button>
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
