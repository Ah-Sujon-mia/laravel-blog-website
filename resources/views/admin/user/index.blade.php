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
                        <li class="breadcrumb-item active">User</li>
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
                                <p class="m-0 font-weight-bold lead">User List</p>
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i> Add New User</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-responsive-sm table-bordered table-sm text-center mb-3">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($User->count() > 0)
                                    @foreach($User as $value)
                                    <tr>
                                        <td>{{$User->firstItem()+$loop->index}}</td>
                                        <td>
                                            @if ($value->image)
                                                <img style="width: 60px; height: 60px;" src="{{ asset('public/admin/user-img/'.$value->image) }}" alt="">
                                            @else
                                                <img style="width: 60px; height: 60px;" src="{{ asset('public/admin/user-img/user.jpg') }}" alt="">
                                            @endif
                                        </td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>
                                            @if ($value->role == 1)
                                                {{ 'Admin' }}
                                            @elseif($value->role == 2)
                                            {{ 'User' }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{route('user.edit',[$value->id],'edit')}}"
                                                    class="mx-1 btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                                <form action="{{route('user.destroy',$value->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are You Sure Delete ?')" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="6" class="text-center">User Not Found</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                            {{$User->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
