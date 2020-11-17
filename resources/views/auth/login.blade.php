@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Login</title>
<meta  name="description" content="Login">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Login"/>
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
                        <h4>Login to Proceed</h4>
                        <!-- <h6 class="font-weight-light">Login you</h6> -->
                        <form method=post action="{{ route('login') }}" class="pt-3">
                            @csrf 
                            <div class="form-group">
                                <label for="name">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-user text-warning"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0"  name="username" value=''>

                                </div>
                                @error('username')
                                <span class="help-block with-errors text-center">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend bg-transparent">
                                        <span class="input-group-text bg-transparent border-right-0">
                                            <i class="fa fa-lock text-warning"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg border-left-0"  name="password" placeholder="Password">    

                                </div>
                                @error('password')
                                <span class="help-block with-errors" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror      
                            </div>

                            <div class="my-3">
                                <input type=submit value="Login" class="btn btn-block btn-warning btn-lg font-weight-medium auth-form-btn  text-white">
                            </div>

                            <div class="text-center mt-4 font-weight-light">
                                Don't have an account? <a href="{{url('register')}}" class="text-warning">Create</a> <br>
                                <a href="{{route('login')}}" class="text-warning">Login</a>

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
