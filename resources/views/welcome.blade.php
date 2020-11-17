@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Investment Platform</title>
<meta  name="description" content="Investment Platform">
<meta itemprop="keywords" name="keywords" content="Investment Platform"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />
<style>
    @media only screen and (min-width : 993px) {
        .hide-on-large-only {
            display: none !important; } }
    @media only screen and (max-width : 600px) {
        .show-on-small {
            display: initial !important; 
            color: #fff!important;
        }

    }
    .info-about-us .about-us-item span  {

    background: #ff7e00!important;

}
</style>
@endsection
@extends('layouts.app')
@section('content')
<!--hero section start-->
<section id="home" class="home home-classic">
    <!--==   02 Home Header  Slider Hero ==-->
    <div class="slider-hero owl-carousel">

        <!-- New Item -->
        <div class="owl-item cover-background" style="background:linear-gradient(180deg, rgba(196, 196, 196, 0.21) 0%, rgba(196, 196, 196, 0) 100%), url(assets/images/bg.jpg); height: 650px; min-height: 100%;"> 
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-8">
                        <div class="banner display-table text-left">
                            <div class="info-header table-cell">
                                <div class="inner-banner" >
                                    <h2 style="color:#fff!important">Welcome <br/>to GlobalGreen Investment </h2>
                                    <p></p>
                                    <div class="text-header" style="color:#fff!important"><h5>We understand your goals and how to make your money work for you.</h5></div>
                             
                                    <div class="banner-btn">
                                        @Auth
                                        <a href="{{url('home')}}" data-lity class="play-video"><div class="play"><i class="fa fa-angle-double-right"></i></div> <span>Dashboard</span></a>

                                        @else
                                        <a href="{{url('register')}}" class="btn-one">Get Started</a>
                                        <a href="{{url('login')}}" data-lity class="play-video btn-one"><div class="play"><i class="fa fa-user" style="color:#fff!important"></i> </div><span class="hide-on-large-only show-on-small">Login </span> <span  style="color:#fff!important">Login</span></a>
                                        @endAuth
                                    </div>
                                </div>
                            </div>
                        </div>   

                    </div> 

                    <div class="col-lg-5 col-md-4">
                        <div class="banner display-table text-left">
                            <div class="info-header table-cell">
                                <div class="">


                                
                                
                                
                                </div>
                            </div>
                        </div>   

                    </div> 
                </div>
            </div>
        </div>


    </div>
</section>
<!--==================================================================== 
                                                     End Header 
     =====================================================================-->

<!--==================================================================== 
                                                    Start Top Contact Us 
    =====================================================================-->
<div class="info-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="about-us-item">
                    <span class="pe-7s-display1"></span>

                    <div class="inbox-item-info">
                        <h3> Excellent Return On Investment </h3>
                        <p>We offer the best returns on investment daily which can be withdrawn weekly, precisely Fridays. </p>
                    </div>

                </div>
            </div>


            <div class="col-md-4">
                <div class="about-us-item">
                    <span class="pe-7s-world"></span>

                    <div class="inbox-item-info">
                        <h3> Sustainable Investment Plans</h3>
                        <p>Our Investment Plans are simple and designed to ease the process of investing while meeting your budget.</p>
                    </div>

                </div>
            </div>


            <div class="col-md-4">
                <div class="about-us-item">
                    <span class="pe-7s-rocket"></span>

                    <div class="inbox-item-info">

                        <h3>Automated Withdrawal System </h3>
                        <p>All withdrawals are processed instantly by our programmed automated payment system.</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<!--==================================================================== 
                                                    End Top Contact Us 
    =====================================================================-->

<!--==================================================================== 
                                                 Start Section About Us One
 =====================================================================-->
<section id="about" class="about">
    <div class="about-classic ptb-120">
        <div class="container">
            <div class="row contact-classic">

                <div class="col-md-6 no-padding">
                    <div class="about-classic-img"></div>
                </div>

                <div class="col-md-6 no-padding">
                    <div class="info-about">



                        <div class="owl-carousel about-carousel">
                            <div class="owl-item">
                                <div class="section-title-left">
                                    <h3>Our company</h3>
                                    <div class="line-title"></div>
                                </div>


                                <p class="mb-40">
                                    GlobalGreen is a modern investment firm mapped out for prospective clients who would like to invest and earn passively through Forex, Crypto, Real Estate, Shares, Bonds and stock trading.
                                    With over 9 years experience in offering private fund management services, financial quantitative analytics and trading risk assessment. We focus on providing portfolio investment management 
                                    expertise to investors by leveraging our diverse platform and portfolio management technology.
                                    <br/><br/>
                                    Globally we stand transparently as one of the leading advanced proprietary electronic trading firm that explores through the collaboration of Highly
                                    motivated and intelligent CPT audited trading firm in Europe with a very positive reputation in the industry. Our Experience enables us to understand fully
                                    the fund management needs of our customers.
                                    <br/><br/>
                                    <a href="{{url('about-us')}}"><button class="btn btn-primary" style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>



                            </div>




                        </div>

                    </div>
                </div>



            </div>

        </div>

    </div>

</section>
<div style="height:433px; background-color: #FFFFFF; overflow:hidden; box-sizing: border-box; border: 1px solid #56667F; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #56667F; padding: 0px; margin: 0px; width: 100%;"><div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #FFFFFF; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #FFFFFF; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Global Green</div></div>  <!--==================================================================== 
                                                        End Section About Us One
        =====================================================================-->
<!--==================================================================== 
                                                        Start Section Services
        =====================================================================-->
<section id="service" class="services services-three ptb-120">
    <style>
        .section-title .line-title {

            background: #ff7e00!important;
        }
    </style>
    <!--========== My Services Info ==========-->
    <div class="container">

        <div class="row">

            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h2 class="color-black"> How To Get Started</h2>
                    <div class="line-title"></div>
                </div>      
            </div>

            <div class="row services-classic mrl-row">
                <!-- Services Items Column -->
                <div class="col-md-6 col-lg-3 item-server-three">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class="pe-7s-user" style="color:#ff7e00"></span>
                            <h4>Create An Account
                            </h4>
                            <p>

                                To register, you only need to fill the registration form and if you've been referred to us, you need to sign up with your referrer's link.


                            </p>                                             
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 item-server-three">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class="pe-7s-plugin" style="color:#ff7e00"></span>
                            <h4>Select Plan And Amount</h4>
                            <p>
                                Login to your personal dashboard, click on 'Deposit' to select your preferred Investment plan , enter the amount and deposit. Not the minimum investment is 100 USD.  

                            </p>                        
                        </div>

                        <div class="services-box-img" style="background-image: url(assets/images/services/02.jpg)"></div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 item-server-three">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class="pe-7s-cash" style="color:#ff7e00"></span>
                            <h4>Start Earning Profits Weekly</h4>
                            <p>
                                After signing up and making deposit, you'll start earning 4% of your deposited amount weekly.   </p>                        
                        </div>

                    </div>
                </div>

                <div class="col-md-6 col-lg-3 item-server-three">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class="pe-7s-wallet" style="color:#ff7e00"></span>
                            <h4>Referrals </h4>
                            <p>
                                We offer 5% - 8% reward to investors that wants to increase their earnings through our affiliate program   </p>                        
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>    

<!--==================================================================== 
                                                    End Section Services
    =====================================================================-->
<!--==================================================================== 
                                                       Start Bar Get A Free
       =====================================================================-->
<div class="bar-get bar-get-two">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2><span>Join us now </span> and Start making Profit</h2>
            </div>
            <div class="col-md-4">
                <div class="btn-get-free">
                    <a href="{{url('register')}}" class="btn-one">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================================== 
                                                    End Bar Get A Free
    =====================================================================-->
<!--==================================================================== 
                                                        Start Work Process
        =====================================================================-->
<div class="work-process pt-120">
    <div class="overlay"></div>
    <div class="container">

        <div class="row"> 

            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h2 class="color-gray"> Work Process</h2>
                    <h3 class="color-white"> HOW DOES IT WORK? </h3>
                    <div class="line-title"></div>
                </div>      
            </div>

        </div>

        <div class="row content-process">


            <div class="col-md-12 no-padding">
                <div class="item-process">

                    <h4>Profitability is our priority</h4>
                    <div class="line-process"></div>
                    <p>The technology developed by GlobalGreen allows us to study the evolution of the main crypto-assets and their prices
                        in different currencies and operate in the market by using advanced algorithms. After years of research, we have optimized the
                        system to obtain maximum profitability.

                    <ul>
                        <li>Real-time monitoring and analysis of the main crypto-assets and their prices in different currencies</li>

                        <li>All algorithms developed to find the best opportunities</li>

                        <li>Optimization and continuous adaptation of the platform</li>
                    </ul>
                    </p>
                </div>
            </div>









        </div>
    </div>
</div>
<div class="work-process pt-120">
    <div class="overlay"></div>
    <div class="container">

        <div class="row"> 

            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h3 class="color-white"> How can I participate? </h3>
                    <div class="line-title"></div>
                </div>      
            </div>

        </div>

        <div class="row content-process">


            <div class="col-md-4 ">

                <div class="item-process">
                    <h4>Create an account</h4>
                    <div class="line-process"></div>
                    <p>To register you only need to fill in the registration form and if you have been referred to us, the registration is free.
                    </p>
                </div>
            </div>


            <div class="col-md-4 ">
                <div class="item-process">

                    <h4>Select Amount</h4>
                    <div class="line-process"></div>
                    <p>Once inside your administration panel, click on deposit to select your preferred investment plan and deposit the amount starting from $100
                    </p>
                </div>
            </div>

            <div class="col-md-4 ">
                <div class="item-process panel-body">

                    <h4>Start making profits</h4>
                    <div class="line-process"></div>
                    <p>From the first moment you will begin to receive daily in your account the part that corresponds to you from the profitability obtained by the system the previous day.
                    </p>
                </div>
            </div>




        </div>
    </div>
</div>

<!--body content end--> 
@endsection