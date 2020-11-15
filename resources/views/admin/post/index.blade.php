@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home fa-sm"></i> Home</a></li>
                        <li class="breadcrumb-item active">Post list</li>
                    </ol>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header card-pink card-outline bg-info">
                            <div class="d-flex justify-content-between">
                                <p class="m-0 font-weight-bold lead">Post list</p>
                                <a href="{{route('posts.create')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus fa-sm"></i> Add New Post</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-striped table-bordered table-sm text-center mb-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Author</th>
                                        <th width="15%">Aaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($Post->count())
                                    @foreach($Post as $value)
                                    <tr>
                                        <td width="4%">{{$Post->firstItem()+$loop->index}}</td>
                                        <td width="6%"><img src="{{asset('public/admin/post-img/'.$value->image)}}" class="rounded"
                                            width="60px" height="60px"></td>
                                        <td width="35%">{{$value->title}}</td>
                                        <td>{{$value->Category->name}}</td>
                                        <td>
                                            @foreach ($PostTag as $Tag)
                                                @if ($Tag->post_id == $value->id)
                                                    <span class="badge badge-primary font-weight-normal">{{ $Tag->Tag->name }}</span>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ucwords($value->User->name)}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('posts.edit',[$value->id],'edit')}}"
                                                    class="mx-1 btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('posts.destroy',[$value->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure Delete ?')" class="btn btn-sm btn-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>

                                                <a href="{{route('posts.show',[$value->id])}}"
                                                    class="mx-1 btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">Post Not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{$Post->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
