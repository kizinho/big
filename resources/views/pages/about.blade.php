@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; About Us</title>
<meta  name="description" content="About Us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - About Us"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<section id="page" class="header-breadcrumb">


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>About Us</h1>

                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>About Us</li>
                </ul>
            </div>

        </div>

    </div>
</section>
<section id="about" class="about">
    <div class="about-one pt-120 pb-70">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-50">
                    <div class="about-img-one">
                        <div class="overlay-about">
                            <div class="text-overlay">
                                <div class="pos-text">
                                  
                                    <span style="color:blue"><h5>Realising Ambitions Since 2008</h5></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-50">
                    <div class="info-about">

                        <div class="section-title-left">
                            <h3>About Us. </h3>
                            <div class="line-title"></div>
                        </div>

                        <p class="mb-25">
                           
                            Established in 2008 by Mr. Razouk Abdulrahman. Global Green investment is a professional wealth management
                            company with emphasis on Wealth Creation and Digital Assets across a wide range of traditional 
                            and alternative investment options, including fixed income securities. We offer various insured services involved in Blockchain with our prime interest in Digital currency trading, Forex, Real Estate, CBD and Financial Investment planning. Our qualified and licensed financiers manage and provide financial consulting services for investors. Throughout our history, we have strategically positioned ourselves to take advantage of growth opportunities within the global market on behalf of our clients. Our disciplined and consistent approach to investment management has helped us not only to maintain long-term relationships with our clients, but also to continue attracting and retaining good people.


                    </div>
                </div>



            </div>

            <div class="row">

                <div class="col-lg-4 mb-30">
                    <div class="career-item" style="background: #ddd">


                        <b>AIM</b>
                        <p>
                            We aim at equipping our traders with the best tools possible . This is achieved through channelling the advances in computer learning, processing power and network capacity into streamlining and improving all aspects of the trading operations, from front office to settlements. This is paired with meticulous/attentive execution and conservative risk management.
                        </p>


                    </div>
                </div>

                <div class="col-lg-4 mb-30">
                    <div class="career-item" style="background: #ddd">
                        <b>VISION </b>
                        <p>
                            To be the most successful financial investment company through the application of the highest professional standards, drawing on our investment experience and with adherence to company’s norms and values.		
                        </p>




                    </div>
                </div>

                <div class="col-lg-4 mb-30">
                    <div class="career-item" style="background: #ddd">
                        <b>MISION </b>
                        <p>
                            To build trust in alignment with our client’s investment objectives. To help private, corporate and individual investors of all types achieve their financial goals.
                        </p>




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
                    <h3 class="color-white">Why choose us</h3>
                    <div class="line-title"></div>
                </div>      
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 mb-30">
                <div class="career-item">
                

                    <p>Our team is responsible for an investment entire life cycle and directly accountable for performance. Regional Investment Committee comprises of Global Green’s most senior talents to oversee all accounts and funds.
                    </p>
                </div>
            </div>

            <div class="col-lg-6 mb-30">
                <div class="career-item">
                  

                    <p>Our value is measured by the degree of positive change we bring about. We strive to make a difference to the people who believe in us ‐ our clients, our shareholders and business partners
</p>

                </div>
            </div>
              <div class="col-lg-6 mb-30">
                <div class="career-item">
                  

                    <p>
                        Honesty, trust and integrity are at the heart of everything we say and do. We keep our promises
                    </p>                                        

                </div>
            </div>
            <div class="col-lg-6 mb-30">
                <div class="career-item">
                  

                    <p>
                        Honesty, trust and integrity are at the heart of everything we say and do. We keep our promises
                    </p>                                        

                </div>
            </div>
           

        </div>
    </div>
</div>

<!--==================================================================== 
                                                End Work Process
=====================================================================-->



   

@endsection