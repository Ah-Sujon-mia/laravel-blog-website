@extends('layouts.website')
  @section('content')


    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{asset('public/website/images/img_4.jpg')}}');">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <h2 class="">Contact Us</h2>
              <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            
            <div class="card">
              @if (session('message'))
                  <span class="alert alert-success">{{ session('message') }}</span>
              @endif
                <div class="card-body">
                    <form action="{{ route('contact.form') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-lg-6 form-group">
                                <label>First Name <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" name="first_name" class="form-control form-control-sm @error('first_name') is-invalid @enderror">
                                @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Last Name <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" name="last_name" class="form-control form-control-sm @error('last_name') is-invalid @enderror">
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-6 form-group">
                                <label>E-mail <span class="text-danger font-weight-bold">*</span></label>
                                <input type="email" name="email" class="form-control form-control-sm @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-6 form-group">
                                <label>Phone (optional)</label>
                                <input type="text" name="phone" class="form-control form-control-sm @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 form-group">
                                <label>Subject <span class="text-danger font-weight-bold">*</span></label>
                                <input type="text" name="subject" class="form-control form-control-sm @error('subject') is-invalid @enderror">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-12 form-group">
                                <label>Message <span class="text-danger font-weight-bold">*</span></label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class=".col-lg-6 form-group">
                                <input type="submit" value="SUBMIT" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

          </div>

          <div class="col-lg-6 col-md-6">

            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">{{ $Setting->location }}</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a class="text-dark" href="tel:{{ $Setting->phone }}">+88{{ $Setting->phone }}</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a class="text-dark" href="mailto:{{ $Setting->email }}">{{ $Setting->email }}</a></p>

            </div>

          </div>
        </div>
      </div>
    </div>

    @endsection
