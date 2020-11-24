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
                                    <h2 style="color:#fff!important">Welcome <br/>to Global Green Investment </h2>
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
                                    Established in 2008 by Mr. Razouk Abdulrahman. Global Green investment is a professional wealth management
                                    company with emphasis on Wealth Creation and Digital Assets across a wide range of traditional 
                                    and alternative investment options, including fixed income securities. We offer various insured ...

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
<div class="text-center mb-3 mt-3">
    <b> CRYPTOCURRENCIES , COINS OF THE FUTURE</b>
</div>
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
                                After you have signed up and made your deposit, you'll start earning from 5%  of your deposited amount weekly depending on your investment plan.   </p>                        
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

<div class="work-process pt-120">
    <div class="overlay"></div>
    <div class="container">

        <div class="row"> 

            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h3 class="color-white"> Our Teams </h3>
                    <div class="line-title"></div>
                </div>      
            </div>

        </div>
        <div class="accordion" id="accordion">
            <div class="row content-process">


                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-1.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                        <h4> Mr. Hulme  </h4>
                        <h6 class="mt-2"> CEO </h6>
                        <br/>
                        <div  id="heading1">
                            <a data-toggle="collapse" data-target="#collapse1" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                            Mr. Hulme joined Global Green in 2010 as Director of Trading & Risk Management. Prior to that, he was with Asset Management Groups in London and Dublin as the Head of Corporate Forex for large international specialist banking. Mr.Douglas Hulme holds degrees in Computers and Business from the University College Dublin, Ireland and from University of Manchester, England.
                        </div> 

                    </div>
                </div>
                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-7.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                        <h4>  Mr. Logan </h4>
                       <h6 class="mt-2"> COO </h6>
                        <br/>
                        <div  id="heading2">
                            <a data-toggle="collapse" data-target="#collapse2" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
                            Mr. Logan joined Global Green in 2014 as an Operations Manager after serving at several companies including MicroWorks, Minneapolis, MN as a Chief Operating Officer and also at Insara Tech. Inc. Mr. Logan has 9+ years experience as a change agent, a leader with excellent business acumen and a communicator. Mr. Logan holds a degree in Finance and also an accounting certification (ACCA).
                        </div> 

                    </div>
                </div>

                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-2.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                        <h4>   Mrs. Davis </h4>
                        <h6 class="mt-2"> CFO </h6>
                        <br/>
                        <div  id="heading7">
                            <a data-toggle="collapse" data-target="#collapse7" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                            Sarah Davis, CFO   Mrs. Davis joined Global Green in 2015 as Finance Manager after serving as a Senior Manager at PwC, one of the big 5 global CPA firms. Mrs. Davis holds an LLM in Law, a B.A in Accounting and Information Systems and also an Accounting Certification (CPA).   </p>

                        </div> 

                    </div>
                </div>

                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-3.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                        <h4> Mr. Fernandez </h4>
                       <h6 class="mt-2"> VP Risk Management </h6>
                        <br/>
                        <div  id="heading3">
                            <a data-toggle="collapse" data-target="#collapse3" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                           Leo Fernandez, VP Risk Management  Mr. Fernandez joined Global Green in 2011 after holding positions in  a major accountancy firm in Ireland. He has over 9 years experience in the financial markets.  Mr. Fernandez holds a degree in Single Honours Mathematics from the National University of Ireland, Maynooth, a Master of Science in Finance and Capital Markets from Dublin City University and a Master of Arts in Mathematics from the National University of Ireland, Galway.  

                        </div> 

                    </div>
                </div>
                <div class="col-md-4 ">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-4.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                       <h4>  Mr. Conor </h4>
                      <h6 class="mt-2"> VP Compliance </h6>
                        <br/>
                        <div  id="heading4">
                            <a data-toggle="collapse" data-target="#collapse4" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                              Sean Conor, VP Compliance  Mr. Conor joined Global Green in 2015. He has over 15 years’ compliance experience working in the financial services industry. Prior to joining Global Green, he spent 10 years at Citco Bank Nederland N.V as Head of Compliance and MLRO. Mr. Conor is a Certified Anti-Money Laundering Specialist (ACAMS). He also holds diplomas in Compliance from The Irish Institute of Banking and Financial Regulation from the National College of Ireland.
                      
                        </div> 

                    </div>
                </div>
                <div class="col-md-4 ">

                    <div class="item-process">
                        <img src="{{asset('images/teams/tm-5.jpg')}}" style="width: 100%; height:200px">
                        <div class="line-process"></div>
                         <h4>  Mr. Peterson </h4>
                       <h6 class="mt-2"> Non Executive Director </h6>
                        <br/>
                        <div  id="heading5">
                            <a data-toggle="collapse" data-target="#collapse5" href="#"><button class="btn btn-primary"  style="background-color: #ff7e00!important;color:#fff!important">Read more </button></a>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                           Ralph Peterson, Non Executive Director  Mr. Peterson currently serves as an advisory director for a leading hedge fund firm as well as holding several board. He spent his professional career at the heart of the global capital markets, with the Central Bank of Ireland and culminating as Managing Director with Morgan Stanley’s London Office.
                         
                        </div> 

                    </div>
                </div>
                <div class="col-md-12 ">
         <!--<iframe width="100%" height="100" src="https://www.youtube.com/embed/SgTpXv2QWkY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    -->
                </div
                <div class="mb-5">

                </div>
            </div>
            <br/> <br/> <br/> <br/>
        </div>

    </div>
</div>

<!--body content end--> 
@endsection