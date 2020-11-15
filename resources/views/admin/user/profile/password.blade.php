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
                    <h1 class="m-0 text-dark">My Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}"><i class="fa fa-home fa-sm"></i> Home</a></li>
                        <li class="breadcrumb-item active">Password</li>
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
                <div class="col-lg-4 col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                @if ($User->role == 1)
                                    <span class="badge badge-success font-weight-normal">Admin</span>
                                @elseif($User->role == 2)
                                    <span class="badge badge-success font-weight-normal">User</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="info text-center">
                                @if ($User->image)
                                    <img style="width: 100px; height: 100px;" class="rounded-circle" src="{{ asset('public/admin/user-img/'.$User->image) }}" alt="">
                                @else
                                <img style="width: 100px; height: 100px;" class="rounded-circle" src="{{ asset('public/admin/user-img/user.jpg') }}" alt="">
                                @endif
                                <h4 class="mb-0 mt-1 font-weight-bold lead">{{ $User->name }}</h4>
                                <span>{{ $User->email }}</span>
                            </div>
                            <table class="table table-borderless table-sm mt-5">
                                <tr class=" d-flex justify-content-between">
                                    <td class="font-weight-bold">Gender:</td>
                                    <td>
                                        @if ($User->gender == 1)
                                            {{ 'Male' }}
                                        @elseif($User->gender == 2)
                                        {{ 'Female' }}
                                        @else
                                            {{ 'Undefind' }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="12" class="font-weight-bold">Bio:</td>
                                </tr>
                                <tr>
                                    <td colspan="12">
                                        @if ($User->description)
                                            {{ $User->description }}
                                        @else
                                            <span>Most people don't think about their professional bio until they're suddenly asked to "shoot one over via email," and have approximately one afternoon to come up with it. That's when we scramble, and our bio ends up reading like this</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <p class="font-weight-bold lead m-0">Change Password
                            </p>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update.password')}}" method="POST" >
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-4 form-group">
                                        <label>Old Password</label>
                                        <input type="password" value="{{ old('old_password') }}" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="old password" required min="8">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>New Password</label>
                                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="new password" required min="8">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="confirm password" required min="8">
                                        @error('confirm_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
