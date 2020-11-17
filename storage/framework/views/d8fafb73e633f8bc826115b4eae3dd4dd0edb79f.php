<nav class="nav-bar">
    <!-- Background Color White -->    
    <div class="bg-white">
      <!-- Output Navbar -->   
      <div class="nav-output">
        <!-- Container  -->  
        <div class="container container-nav">
            <!-- Row -->  
            <div class="row">

                
                <!-- Column of Logo -->  
                <div class="col-lg-3 col-12">
                   <!-- My Logo -->
                   <a href="<?php echo e(url('/')); ?>" class="my-logo">
                       <img class="logo-two" src="<?php echo e(asset($settings['logo'])); ?>" alt="logo">
                   </a>
                   <span id="google_translate_element"></span>
                    
                   <!-- Button Menu -->
                   <a href="#" class="navbar-toggle">
                       <span></span>
                       <span></span>
                       <span></span>
                   </a>
                    
                </div>
                
                
                
                
                <!-- Column of Links -->
                <div class="col-lg-9 col-md-12 position-inherit">
                    
                    <!-- Icons  -->
                    <div class="icon-links">
                        <a href="" target="_blank">
                            <i class="fab fa-telegram" style="color: #0088cc; font-size: 30px;"></i>
                        </a>
                        
                        <a href="" target="_blank">
                            <i class="fab fa-whatsapp" style="color: #25D366; font-size: 30px;"></i>
                        </a>
						 <a href="https://www.facebook.com/groups/649519328548810/?ref=share" target="_blank">
                            <i class="fab fa-facebook" style="color: #0000ff; font-size: 30px;"></i>
                        </a>
                        <!-- Start Btn Side Menu -->
                        <a href="#" class="side-menu-btn">
                            <i class="fas fa-list-ul" style="margin-top: -10px;"></i>
                        </a>
                        
                        

                    </div>
                    
                    
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                  <!-- Main Menu Links -->                            
                  <ul id="main-menu" class="nav-menu">
                      
                      <li class="nav-item <?php if(request()->path() == '/'): ?> active <?php endif; ?>">
                          <a href="<?php echo e(url('/')); ?>" class="nav-link">
                              Home                            
                          </a>                                                  
                          
                      </li>
                      
                      <li class="nav-item <?php if(request()->path() == 'plan'): ?> active <?php endif; ?>">
                          <a href="<?php echo e(url('plan')); ?>" class="nav-link">
                              Trading Plans
                          </a>                                                  
                          
                      </li>
                      
                      
                      <li class="nav-item <?php if(request()->path() == 'about-us'): ?> active <?php endif; ?>">
                          <a href="<?php echo e(url('about-us')); ?>" class="nav-link">
                              About Us
                          </a>                                                    
                          
                      </li>

                    
                      </li>

                      <li class="nav-item <?php if(request()->path() == 'faq'): ?> active <?php endif; ?>">
                          <a href="<?php echo e(url('faq')); ?>" class="nav-link">
                              FAQ
                          </a>                                                    
                          
                      </li>

                      <li class="nav-item <?php if(request()->path() == 'terms-condition'): ?> active <?php endif; ?>">
                          <a href="<?php echo e(url('terms-condition')); ?>" class="nav-link">
                              Terms of Use
                          </a>                                                    
                          
                      </li>
                      <li class="nav-item <?php if(request()->path() == 'support'): ?> active <?php endif; ?>">
                          <a href="support"  class="nav-link">Support</a>
                      </li>
                      
<!--                      <li class="nav-item">
                          <a href="assets/WHITE-PAPER%20-CRYPTOTRADE-GROUP-LTD.pdf" target="_blank" class="nav-link">
                              White Paper
                          </a>                                                  
                          
                      </li>-->
                  </ul> 

                </div>
                

                
                
                

            </div>

        </div>
      </div>
    </div>
    
</nav>
    
    <!--====================================================================
                            End Navbar
    ====================================================================-->
<!--==================================================================== 
              Start Side Menu 
  =====================================================================-->
<div class="side-menu">
    
    <a href="#" class="close-side-menu">
        <span class="pe-7s-close"></span>
    </a>

    <div class="inner-side">
        <!-- Intro side -->
        <div class="about-side">
            <img src="<?php echo e(asset($settings['logo'])); ?>" alt="logo">
    
            <p>
			CapitalFlow's main task is to extract the largest possible profit from exchange operations at crypto-currency/Forex trading markets. We guarantee a stable inflow of profit, as we are always searching for new, more appealing and profitable operation methods.</p>
        
        </div>
        
        <!-- contact us -->
        <div class="contact-side">
            <h6>Contact Info</h6>
            <div class="line-side"></div>
            <div class="contact-info">

                <div class="single-contact">
                    <span><i class="fa fa-phone"></i></span>
                    <div class="info-cont">
                        <p><?php echo e($settings['site_phone']); ?></p>                               

                    </div>
                </div>

                <div class="single-contact">
                    <span><i class="fa fa-envelope"></i></span>
                    <div class="info-cont">
                        <p><?php echo e($settings['site_email']); ?></p>                        
                    </div>
                </div>

                <div class="single-contact">
                    <span><i class="fa fa-location-arrow"></i></span>
                     <div class="info-cont">
                        <p><?php echo e($settings['site_address']); ?></p>                        
                     </div>
                </div>


                <div class="single-contact">
                    <span><i class="fas fa-clock"></i></span>
                    <div class="info-cont">    
                        <p>Online 24/7</p>                        

                    </div>
                </div>


            </div>
                        
        </div>

        
        
    
    </div>

</div>
<!-- Overlay Close Sidebar -->
<div class="close-menu-sidebar"></div><?php /**PATH /home/capildee/public_html/resources/views/layouts/nav.blade.php ENDPATH**/ ?>