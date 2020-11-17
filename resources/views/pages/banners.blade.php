@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Banner</title>
<meta  name="description" content="Banner">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Banner"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<section class="page-title o-hidden" data-overlay="7" data-bg-img="{{asset('images/bg/02.jpeg')}}" style="background-image: url({{url('images/bg/02.jpeg')}});">
 <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12">
        
<h1>Promotional <span class="text-theme">Banners</span></h1>
        <p>Latest Promotional Banners</p>
      </div>
      <div class="col-lg-6 col-md-12 text-lg-right md-mt-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-4 justify-content-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('banners')}}">Pages</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Banners</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="title-2">Promotional <span>Banners</span></h2>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 col-md-12">

<a href="{{url('/')}}">
<img src="{{asset('images/banner125.jpg') }}" alt="" width="125" height="125" /><br>
</a>

<br><br>
<textarea cols=60 rows=4 class=form-control>
<a href="{{url('/')}}">
<img src="{{asset('images/banner125.jpg') }}" alt="" width="125" height="125" /><br>
</a>
</textarea><br><br><br>


<a href="{{url('/')}}">
<img src="{{asset('images/banner468.jpg') }}" alt="" width="468" height="60" /><br>
</a>

<br><br>
<textarea cols=60 rows=4 class=form-control>
<a href="{{url('/')}}">
<img src="{{asset('images/banner468.jpg') }}" alt="" width="468" height="60" /><br>
</a>
</textarea><br><br><br>


<a href="{{url('/')}}">
<img src="{{asset('images/banner728.jpg') }}" alt="" width="728" height="90" /><br></a>
<br><br>
<textarea cols=60 rows=4 class=form-control>
<a href="{{url('/')}}">
<img src="{{asset('images/banner728.jpg') }}" alt="" width="728" height="90" /><br>
</a>
</textarea><br><br><br>


</div>
</div>
</section>

    @endsection