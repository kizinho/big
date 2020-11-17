<?php $__env->startSection('title'); ?>
<title><?php echo e(ucfirst($settings['site_name'])); ?> &mdash; Investment Platform</title>
<meta  name="description" content="Investment Platform">
<meta itemprop="keywords" name="keywords" content="Investment Platform"/>
<meta name="author" content="<?php echo e(ucfirst($settings['site_name'])); ?>" />
<style>
	@media  only screen and (min-width : 993px) {
  .hide-on-large-only {
    display: none !important; } }
@media  only screen and (max-width : 600px) {
  .show-on-small {
    display: initial !important; 
	color: #fff!important;
	}

	}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!--hero section start-->
<section id="home" class="home home-classic">
    <!--==   02 Home Header  Slider Hero ==-->
<div class="slider-hero owl-carousel">
    
    <!-- New Item -->
    <div class="owl-item cover-background" style="background-image: url(assets/images/bg.jpg); height: 650px; min-height: 100%;"> 
        <div class="overlay"></div>
        <div class="container">
           <div class="row">
            <div class="col-lg-7 col-md-8">
                <div class="banner display-table text-left">
                    <div class="info-header table-cell">
                        <div class="inner-banner"  style="background-color: #2e7ad0!important;color:#fff!important">
                            <h3 style="color:#fff!important">Welcome to CapitalFlow</h3>
                            <div class="text-header" style="color:#fff!important">A Modern Investment Firm For Cryptocurrencies And Digital Assets Management.</div>
                            <div class="banner-btn">
                                <?php if(auth()->guard()->check()): ?>
                                   <a href="<?php echo e(url('home')); ?>" data-lity class="play-video"><div class="play"><i class="fa fa-angle-double-right"></i></div> <span>Dashboard</span></a>
                          
                                <?php else: ?>
                                <a href="<?php echo e(url('register')); ?>" class="btn-one">Get Started</a>
                                <a href="<?php echo e(url('login')); ?>" data-lity class="play-video"><div class="play"><i class="fa fa-user" style="color:#fff!important"></i> </div><span class="hide-on-large-only show-on-small">Login </span> <span  style="color:#fff!important">Login</span></a>
                           <?php endif; ?>
                            </div>
                        </div>
                    </div>
               </div>   

            </div> 
               
        <div class="col-lg-5 col-md-4">
                <div class="banner display-table text-left">
                    <div class="info-header table-cell">
                        <div class="">
                          
                            
                           <div style="width: 250px; height:335px; background-color: #232937; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; block-size:335px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38;margin: 0;width: 250px;padding:1px;padding: 0px; margin: 0px;"><div style="height:315px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=converter&theme=dark" width="250" height="310px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div> 
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
                        <h3>Best Consulting</h3>
                        <p>Provide the best consulting services.</p>
                    </div>
                    
                </div>
            </div>
            
            
            <div class="col-md-4">
                <div class="about-us-item">
                    <span class="pe-7s-world"></span>
                    
                    <div class="inbox-item-info">
                        <h3>Our Experience</h3>
                        <p>We have over 9 years experience in Cryptocurrency and 20 years in several other fields.</p>
                    </div>
                    
                </div>
            </div>
            
            
            <div class="col-md-4">
                <div class="about-us-item">
                    <span class="pe-7s-headphones"></span>
                    
                    <div class="inbox-item-info">
                        
                        <h3>Online Support 24/7</h3>
                        <p><?php echo e($settings['site_email']); ?></p>
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
CapitalFlow is a modern investment firm mapped out for prospective clients who would like to invest and earn passively through Forex, Crypto, Real Estate, Shares, Bonds and stock trading.
 With over 9 years experience in offering private fund management services, financial quantitative analytics and trading risk assessment. We focus on providing portfolio investment management 
 expertise to investors by leveraging our diverse platform and portfolio management technology.
<br/><br/>
Globally we stand transparently as one of the leading advanced proprietary electronic trading firm that explores through the collaboration of Highly
 motivated and intelligent CPT audited trading firm in Europe with a very positive reputation in the industry. Our Experience enables us to understand fully
 the fund management needs of our customers.
<br/><br/>
<a href="<?php echo e(url('about-us')); ?>"><button class="btn btn-primary" style="background-color: #2e7ad0!important;color:#fff!important">Read more </button></a>


                            
                            </div>
                            
                            
                            
                            
                        </div>

                    </div>
                </div>
                
                

            </div>
        
        </div>
         
    </div>
    
</section>
    <div style="height:433px; background-color: #1D2330; overflow:hidden; box-sizing: border-box; border: 1px solid #282E3B; border-radius: 4px; text-align: right; line-height:14px; font-size: 12px; font-feature-settings: normal; text-size-adjust: 100%; box-shadow: inset 0 -20px 0 0 #262B38; padding: 0px; margin: 0px; width: 100%;"><div style="height:413px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=dark&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe></div><div style="color: #626B7F; line-height: 14px; font-weight: 400; font-size: 11px; box-sizing: border-box; padding: 2px 6px; width: 100%; font-family: Verdana, Tahoma, Arial, sans-serif;"><a href="https://coinlib.io" target="_blank" style="font-weight: 500; color: #626B7F; text-decoration:none; font-size:11px">Cryptocurrency Prices</a>&nbsp;by Coinlib</div></div>
    <!--==================================================================== 
							End Section About Us One
	=====================================================================-->
<!--==================================================================== 
							Start Section Services
	=====================================================================-->
<section id="service" class="services services-three ptb-120">
    
    <!--========== My Services Info ==========-->
    <div class="container">

        <div class="row">
            
            


            <div class="row services-classic mrl-row">
           <!-- Services Items Column -->
            <div class="col-md-6 col-lg-4 item-server-three">
                <div class="services-item-three">
                    <div class="content-box">
                        <span class="pe-7s-science"></span>
                        <h4>Profitability, Security, Liquidity
</h4>
                        <p>
						
					We work to maximize profitability unlike other platforms, we are 100% integrated with Blockchain technology 
					(ensuring that your investments must always be on the platform with just one click away from your wallet) and you can
					request the return of your investments at the end of the period.

<h4>Proven investment system</h4>
Profit<br/>
Blockchain integrated<br/>
Security<br/>
Possibility of withdrawing the contribution<br/>
Liquidity	<br/>
						
						</p>                                             
                    </div>
                </div>
            </div>
            
           <div class="col-md-6 col-lg-4 item-server-three">
                <div class="services-item-three">
                    <div class="content-box">
                        <span class="pe-7s-display1"></span>
                        <h4>Safe And Secure</h4>
                        <p>Here at our company, the most prevalent focus that we maintain relate to providing our clients with optimal returns on their investments and operations using a secure system that
						ensures the safety of our client's personal information during transactions. <br><br> In order to accomplish the later, we implement a variety of strict guidelines that contribute 
						to safeguarding the assets and private data of those that we work with on a daily basis.</p>                        
                    </div>
                    
                    <div class="services-box-img" style="background-image: url(assets/images/services/02.jpg)"></div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 item-server-three">
                <div class="services-item-three">
                    <div class="content-box">
                        <span class="pe-7s-safe"></span>
                        <h4>Performance</h4>
                        <p>
						<h4>Historical profitability </h4>

In the latest reports CapitalFlow is producing a daily return of 1.5% - 2%.

<h4>THE INTEREST </h4>

<h4>DISTRIBUTION OF PROFIT </h4>

Every day the profit obtained the previous day are distributed among the participants, of which CapitalFlow retains 35% in management and maintenance expenses.
						</p>                        
                    </div>

                </div>
            </div>
               

            <div class="col-md-12 col-lg-12 ">
                <div class="services-item-three">
                    <div class="content-box">
                        <h4>Referral program</h4>
                        <p>
You can increase your earnings by inviting people to join our platform. You'll receive 5- 8% of the funds deposited by them as a bonus depending on the investment plan chosen.</p>                        
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
                    <a href="<?php echo e(url('register')); ?>" class="btn-one">Get Started</a>
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
                    <p>The technology developed by CapitalFlow allows us to study the evolution of the main crypto-assets and their prices
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
            
            
            <div class="col-md-4 no-padding">
			
                <div class="item-process">
                    <h4>Create an account</h4>
                    <div class="line-process"></div>
                    <p>To register you only need to fill in the registration form and if you have been referred to us, the registration is free.
					</p>
                </div>
            </div>
            
            
             <div class="col-md-4 no-padding">
                <div class="item-process">
                    
                    <h4>Select Amount</h4>
                    <div class="line-process"></div>
                    <p>Once inside your administration panel, click on deposit to select your preferred investment plan and deposit the amount starting from $100
					</p>
                </div>
            </div>
            
      <div class="col-md-4 no-padding">
                <div class="item-process">
                    
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/capildee/public_html/resources/views/welcome.blade.php ENDPATH**/ ?>