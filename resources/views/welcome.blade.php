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
                                    <h2 style="color:#fff!important">Welcome <br/>to Global Green LTD. </h2>
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
<style>
    .btn-circle{
 
            padding: 10px 16px; 
            border-radius: 35px; 
            font-size: 12px; 
            text-align: center; 
            color: #ff7e00;
            background-color: transparent; 
            background-image: none;  
            border-color: #ff7e00;
    }
    .btn-outline-primary:hover{
      background-color: #ff7e00;    
    }
</style>
<div class="work-process pt-120">
    <div class="overlay"></div>
    <div class="container">

        <div class="row"> 

            <div class="col-md-8 offset-md-2">
                <div class="section-title text-center">
                    <h3 class="color-white"> Our Services </h3>
                    <div class="line-title"></div>
                </div>      
            </div>

        </div>
        <div class="accordion" id="accordion">
            <div class="row content-process">


                <div class="col-md-4 mb-4">


                    <div class="item-process">
                        <h3 class="text-dark"> Real Estate  </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-1.jpg')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>

                        <div  id="heading1">
                            <p>   Real estate investing involves the purchase, ownership, management, rental and/or sale of real estate for profit.
                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse1" href="#"><button class="btn btn-outline-primary  btn-circle">Read more </button></a>
                        </div>
                        <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
                            <p>      Real estate investing involves the purchase, ownership, management, rental and/or sale of real estate for profit. Improvement of realty property as part of a real estate investment strategy is generally considered to be a sub-specialty of real estate investing called real estate development.
                            </p>
                            Global Green helps you grow your investment in pursuance of a home of your choice and in any location as well.

                        </div> 

                    </div>
                </div>
                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <h3 class="text-dark"> Cryptocurrency </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-2.JPG')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>

                        <div  id="heading2">
                            <p>  
                                A cryptocurrency exchange or a digital currency exchange is a business that allows customers to trade cryptocurrencies 
                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse2" href="#"><button class="btn btn-outline-primary  btn-circle">Read more </button></a>
                        </div>
                        <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">

                            A cryptocurrency exchange or a digital currency exchange is a business that allows customers to trade cryptocurrencies or digital currencies for other assets, such as conventional fiat money or other digital currencies. Cryptocurrencies typically use a decentralised network to carry out secure financial transactions. Due to the massive popularity of cryptocurrencies over the past years, they have become a conventional and popular asset.
                            The main purpose of this new technology is to allow people to buy, trade and invest without having to rely on banks or any other financial institutions.
                        </div> 

                    </div>
                </div>

                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <h3 class="text-dark"> Forex </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-3.JPG')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>
                        <div  id="heading7">
                            <p>
                                Global Green traders will meet all your trading needs with our profitable Forex trading strategies    
                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse7" href="#"><button class="btn btn-outline-primary  btn-circle">Read more </button></a>
                        </div>
                        <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                            Global Green traders will meet all your trading needs with our profitable Forex trading strategies. The currency market is considered to be the largest financial market with over $5 trillion in daily transactions, which is more than the futures and equity markets combined. With many years of active trading experience across multiple platforms and markets, the progressive and dynamic Global Green forex management team recognized that traditional web based forex brokers would be placed to help us get our own cut of the trillions circulating on daily basis.


                        </div> 

                    </div>
                </div>

                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <h3 class="text-dark"> Cannabis </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-4.JPG')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>

                        <div  id="heading3">
                            <p>
                                If you're thinking about investing in marijuana stocks but aren't quite sure when to jump in, financial advisors say NOW   
                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse3" href="#"><button class="btn btn-outline-primary  btn-circle">Read more </button></a>
                        </div>
                        <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                            If you're thinking about investing in marijuana stocks but aren't quite sure when to jump in, financial advisors say NOW, before the global market becomes aware of this product. This is the right time to invest in it because Global Wealth Investment is here to make things safe and easier for you. We give everyday traders the opportunity to look over the shoulder of an equity analyst with a passion for the cannabis sector.

                        </div> 

                    </div>
                </div>
                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <h3 class="text-dark"> Financial planning </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-5.JPG')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>

                        <div  id="heading4">
                            <p>
                                Our financial advisor is often responsible for more than just executing trades in the market on behalf of our prospective clients.   

                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse4" href="#"><button class="btn btn-outline-primary  btn-circle"  >Read more </button></a>
                        </div>
                        <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                            <p> Our financial advisor is often responsible for more than just executing trades in the market on behalf of our prospective clients.
                            </p>
                            But use their knowledge and expertise to construct and personalized financial plans that aim to achieve the financial goals of clients.

                        </div> 

                    </div>
                </div>
                <div class="col-md-4 mb-4">

                    <div class="item-process">
                        <h3 class="text-dark"> Retirement Planning  </h3> 
                        <br/>
                        <img src="{{asset('images/services/ser-6.JPG')}}" style="width: 150px; height:150px;border-radius: 50%">
                        <div class="line-process"></div>

                        <div  id="heading5">
                            <p>
                                Workforce Optimization
                                Saving for retirement can be a daunting task, but with a sound strategy, it’s well within reach. NerdWallet is
                            </p>
                            <br/>
                            <a data-toggle="collapse" data-target="#collapse5" href="#"><button class="btn btn-outline-primary  btn-circle"  >Read more </button></a>
                        </div>
                        <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                            <p>
                                Workforce Optimization
                            </p>
                            <p>
                                Saving for retirement can be a daunting task, but with a sound strategy, it’s well within reach. NerdWallet is here to bring clarity to retirement planning and set you on your path to success. Here you’ll find key resources, articles, and tools to better understand your options and find the right strategy for you.
                            </p>
                            <p>
                                If you had the chance to double—or even quadruple—your retirement savings, you’d probably jump at that opportunity, right? Well, there’s one simple change you can make today that’s sure to boost your retirement savings.
                            </p>
                            <p>
                                Quadruple Your Retirement Savings? Really?
                            </p>
                            <p>
                                A CitadelTradings study of worldwide retirement saving habits discovered that people with some kind of retirement plan have more than three times as much in their nest egg than those with no plan at all.
                            </p>
                            <p>
                                And savers who take it one step further by working with an investing advisor to put their plan to paper? Their average nest egg is a whopping 445% bigger than non-planners. That’s a big deal!
                            </p>
                            Now, did you catch that? By working with an advisor and by having a plan in place, you can supercharge your retirement savings. 
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