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
                        <li class="breadcrumb-item active">Category list</li>
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
                        <div class="card-header bg-dark">
                            <div class="d-flex justify-content-between">
                                <p class="m-0 font-weight-bold lead">Category list</p>
                                <a href="{{route('category.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i> Add New
                                    Category</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm text-center mb-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Post Count</th>
                                        <th width="15%">Aaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($Category->count())
                                    @foreach($Category as $value)
                                    <tr>
                                        <td>{{$Category->firstItem()+$loop->index}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->slug}}</td>
                                        <td>{{$value->id}}</td>
                                        <td class="d-flex justify-content-center">

                                            <a href="{{route('category.edit',[$value->id],'edit')}}"
                                                class="mx-1 btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                            <form action="{{route('category.destroy',[$value->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are Your Sure Delete ?')" class="btn btn-sm btn-danger"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">Category Not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{$Category->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
