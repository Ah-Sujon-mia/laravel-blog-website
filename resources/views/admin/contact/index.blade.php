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
                        <li class="breadcrumb-item active">Contact list</li>
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
                                <p class="m-0 font-weight-bold lead">Contact</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered table-sm text-center mb-3 responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Aaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($Contact as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->fname }} {{ $item->lname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>
                                            <a onclick="return confirm('Are you sure delete?')" href="{{ route('contact.delete', $item->id) }}" class="btn btn-sm btn-danger"><i class=" fa fa-trash"></i></a>
                                            <a href="{{ route('contact.show', $item->id) }}" class="btn btn-sm btn-primary"><i class=" fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
