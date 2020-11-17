@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Register</title>
<meta  name="description" content="Register">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Register"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.applogin')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
            <div class="row flex-grow">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="auth-form-transparent text-left p-3">
                        <div class="brand-logo">
                            <img src="{{asset($settings['logo']) }}" alt="logo">
                        </div>
                        <h4>Retrieve Password</h4>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <div class="clearfix"></div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="messages"></div>
                            <div class="form-group">
                                <label for="name">Enter your Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-user text-warning"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0" name="email" value='' placeholder="enter email">     

                                </div>

                                <div class="clearfix"></div>
                                <br/>
                                @error('email')
                                <span class="help-block with-errors" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="my-3">
                                <input type=submit value="Retrieve Password" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn text-white">
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{url('register')}}" class="text-warning">Create</a> <br>
                                <a href="indexc30b.html" class="text-warning">Login</a>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 login-half-bg d-flex flex-row">
                    <p class="text-white font-weight-medium text-center flex-grow align-self-end">{{$settings['copy_right']}}</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>


@endsection
