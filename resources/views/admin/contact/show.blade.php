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
                        <li class="breadcrumb-item active">Contact</li>
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
                <div class="col-lg-6 mx-auto">
                    <div class="card">
                        <div class="card-header bg-dark">
                            <div class="d-flex justify-content-between">
                                <p class="m-0 font-weight-bold lead">Contact info</p>
                                <a href="{{ route('contact.us') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-row">
                                    <div class="col-lg-6 form-group">
                                        <label>First Name</label>
                                        <input type="text" value="{{ $Show->fname }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Last Name</label>
                                        <input type="text" value="{{ $Show->lname }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-6 form-group">
                                        <label>E-mail</label>
                                        <input type="email"value="{{ $Show->email }}"  class="form-control form-control-sm">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label>Phone</label>
                                        <input type="text" value="0{{ $Show->phone }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 form-group">
                                        <label>Subject</label>
                                        <input type="text" value="{{ $Show->subject }}" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 form-group">
                                        <label>Message</label>
                                        <textarea class="form-control" rows="5">
                                            {{ $Show->message }}
                                        </textarea>
                                    </div>
                                </div>
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
