@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; {{Auth::user()->usernme}} Mailling</title>
<meta  name="description" content="{{Auth::user()->usernme}} Mailling">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - {{Auth::user()->usernme}} Mailling"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
@endsection
@extends('layouts.home')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Settings</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>



                                        <form class="" method="Post" action="{{route('mailing')}}" enctype="multipart/form-data">
                                            @csrf    
                                            <div class="form-group">
                                                <label>To Emails</label>
                                                <textarea  class="form-control" rows="4" name="emails" placeholder="separate with comma eg admin@gmail.com,example@gmail.com"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" name="title"  class="form-control" placeholder="Enter Title">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea  class="form-control" rows="10" name="message"></textarea>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-theme btn-circle">Send</button>
                                    </div>
                                    </form>  






                    </div>
                </div>
            
                    </div>
                </div>
                   
                   
                @endsection
