@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Privacy Policy</title>
<meta  name="description" content="Privacy Policy">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Privacy Policy"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<section class="page-title o-hidden" data-overlay="7" data-bg-img="{{asset('images/bg/02.jpeg')}}" style="background-image: url({{url('images/bg/02.jpeg')}});">
 <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-12">
        

 <h1>Privacy <span class="text-theme">Policy</span></h1>
        <p>Our Privacy Policy</p>
      </div>
      <div class="col-lg-6 col-md-12 text-lg-right md-mt-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-4 justify-content-end">
            <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('privacy-policy')}}">Pages</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Privacy Policy</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!--page title end-->


<!--body content start-->

<div class="page-content">

<!--privacy start-->

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <h2 class="title-2">Privacy <span>Policy</span></h2>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-lg-12 col-md-12">
        <p>Thank you for taking part in {{$settings['site_name']}}, that is engaged in receiving of profits within the Crypto currency market.</p>
        <p>Our company understands the importance of private info of each participant. Cooperating with our company, you'll take care in privacy of your personal data and in its protection by our staff.</p>
         <p>Our staff shield the collected info from unauthorized access. We tend to use a range of technologies to decrease the danger of stealing of accounts and "Personal information" includes such things as </p>
        <h5 class="mt-5 text-theme">Personal Information</h5>
        <ul class="list-unstyled">
          <li> <i class="fa fa-angle-right"></i> Name and surname of the Investor/Members</li>
          <li> <i class="fa fa-angle-right"></i> Locations</li>
          <li> <i class="fa fa-angle-right"></i>  Telephone number</li>
          <li> <i class="fa fa-angle-right"></i> Personal account of electronic currency</li>
          <li> <i class="fa fa-angle-right"></i> Login and password</li>
        </ul>
        <p class="mt-5">Our company collects your personal data solely along with your consent and confidence within the security of your personal data on our program. Users ought to note, that the gathering of private data is just from adult. The principles of our company justify, however your data is collected and used. These rules apply solely in our web site. Data that is collected after you visit this website. 
</p>
        
        <h5 class="mt-5 text-theme">Visiting our web site, such data is mechanically collected :</h5>
       <p>This varieties of data also are the a part of the private info. data Storage. </p>
        <ul class="list-unstyled">
          <li> <i class="fa fa-angle-right"></i> Your net supplier</li>
          <li> <i class="fa fa-angle-right"></i> Your location and country of residence</li>
          <li> <i class="fa fa-angle-right"></i> Your browser and kind of OS </li>
          
        </ul>
         
         
        <p class="mt-5 mb-0">Saving of data is just in our company or its instrumentality. 
            Personal data is keep in accordance with the principles of storage and disposal, that area unit set for archive of our company. 
            To receive your personal info, contact direct with our staff. Our email is {{$settings['site_email']}}.</p>
      </div>
    </div>
  </div>
</section>

<!--privacy end-->

    @endsection