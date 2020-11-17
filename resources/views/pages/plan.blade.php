@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; PLAN</title>
<meta  name="description" content="PLAN">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - PLAN"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')

<section id="page" class="header-breadcrumb">


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Plans</h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Plans</li>
                </ul>
            </div>

        </div>

    </div>
</section>
<!--==================================================================== 
           End Header 
=====================================================================-->



<!--==================================================================== 
          Start Section About Us One
=====================================================================-->
<section id="price" class="price pt-130">
    <div class="container">
        <div class="row">



            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h2>Our Trading Plans </h2>
                    <h3> Choose your preferred Plan </h3>
                    <div class="line-title"></div>
                    <p>Click trade now to signup and invest let our experts manage your account with good returns daily.</p>
                </div>      
            </div>






            @foreach($plans as $plan)
            <div class="col-lg-3 col-md-3">
                <div class="price-item @if($plan->featured == true) price-two @endif ">
                    <div class="header-price">
                        <h4>{{$plan->name}}</h4>
                        <div class="value">
                            <h3>{{number_format($plan->percentage,0)}}<span>%</span></h3>
                            <span class="per">/ {{$plan->compound->name}}</span>
                        </div>                      
                    </div>

                    <div class="features">
                        <ul>
                            <li><span class="typcn typcn-tick-outline"></span>Minimum Deposit: ${{$plan->min}} </li>
                            <li><span class="typcn typcn-tick-outline"></span>Maximum Deposit: {{$plan->max}}</li>
                            <li><span class="typcn typcn-tick-outline"></span>Automatic Deposit</li>
                            <li><span class="typcn typcn-tick-outline"></span>Automatic Withdrawal</li>
                            <li><span class="typcn typcn-tick-outline"></span>Referal {{$plan->ref}}%</li>
                            <li><span class="typcn typcn-tick-outline"></span>24x7 Support</li>                          
                        </ul>   
                    </div>
                    <div class="order">
                        <a href="{{url('register')}}" class="btn-one"><span>Trade now</span></a>
                    </div>

                </div>
            </div>

            @endforeach



        </div>
    </div>
</section>


@endsection