@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Banner</title>
<meta  name="description" content="Banner">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Banner"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')
<script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/js/banners.js')}}"></script>

    <div class="main-panel">        
        <div class="content-wrapper">

            <div class="card">
              <div class="card-body">


                <div class="col-md-12"><h6>SELECT PREFERRED SIZE</h6></div>

                <div class="col-md-12">
                    <div class="template-demo banner-container">
                        <button type="button" class="tabs active btn btn-primary btn-fw" id="banner125x125">125x125</button>
                        <button type="button" class="tabs btn btn-secondary btn-fw" id="banner468x60">468x60</button>
                        <button type="button" class="tabs btn btn-success btn-fw" id="banner728x90">728x90</button>          
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="banner-show">
                       
                    </div>
                </div>
                
                <br/>
                
                <hr style="border-color: rgba(255, 255, 255, 0.3)" />
                <br/>
                    <div class="my_link clearfix banner" style="background:#846653;">
                        <h6 class="link">
                            <textarea id="banners_link" class="full-width zero-padding" style="background: #846653;color: #fff;width:100%;text-align:center" readonly>
                                <a href="{{url('register')}}?ref={{Auth::user()->username}}">
                              </a>
                            </textarea>
                        </h6>
                        <form>
                            <input id="username" type="hidden" value="{{Auth::user()->username}}">
                            <input id="siteURL" type="hidden" value="{{url('register')}}?ref={{Auth::user()->username}}">
                        </form>
                    </div>
                    <div class="main-link-holder">
                        <button type="button" class="btn btn-warning btn-sm text-white" onclick="copyToClipboard('#banners_link')">COPY CODE</button>
                    </div>


                </div>
            </div>
                @endsection
