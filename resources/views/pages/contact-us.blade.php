@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Contact Us</title>
<meta  name="description" content="Contact Us">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Contact Us"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<section id="page" class="header-breadcrumb">

    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Contact Us </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    
                    <li class="active"><i class="fas fa-angle-right"></i></li>
                    
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    
    </div>
</section>
   <!--==================================================================== 
							End Header 
	=====================================================================-->

    
   
    <!--==================================================================== 
							contact us page
	=====================================================================-->
<section class="contact-us-page  ptb-120">  
    <div class="container">
        
        
        <div class="row">
            
            
            <div class="col-12">
                
                
                <div class="contact-us-meta">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="contact-item">
                                <div class="inner-contact">
                                    <span><i class="fa fa-phone"></i></span>
                                    <h4>Phone</h4>
                                </div>
                                
                                <p>{{$settings['site_phone']}}</p>                                
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="contact-item">
                                <div class="inner-contact">
                                    <span><i class="fa fa-envelope"></i></span>
                                    <h4>Email</h4>
                                </div>
                                
                                <p>{{$settings['site_email']}}</p>                               
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="contact-item">
                                <div class="inner-contact">
                                    <span><i class="fa fa-location-arrow"></i></span>
                                    <h4>Address</h4>
                                </div>
                                
                                <p>{{$settings['site_address']}}</p>                                
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="contact-item">
                                <div class="inner-contact">
                                    <span><i class="fas fa-clock"></i></span>
                                    <h4>Online 24/7 </h4>
                                </div>
                              
                                  </li>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="line-contact"></div>
                    
                    <div class="row">

                      <div class="col-sm-12">
                                              </div>

                     
                        
                         <div class="col-lg-4 mb-50">
                            <div class="img-contact">
                                <img src="assets/images/about/contact-us.jpg" alt="contact">
                                
                                <div class="overlay-contact-us">
                                    <div class="text-overlay">
                                        <h3>Write To Us</h3>  
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-8 mb-50">
                            

                            
                            
                            <form class="form" id="contact">
                             

                                                              <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="name" value="" placeholder="Your Name">
                                        </div>

                                    </div>  

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="email" value="" placeholder="Your Email">
                                        </div>

                                    </div>
                                                                    

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="message" placeholder="Your Message Here "></textarea>
                                        </div>
                                    </div>

                                                                    </div>


                                <!-- Button Send Message  -->
                                <input class="btn-one" type=submit value="Send Message">
                            </form>

                            
                            
                        </div>
                        
                       
                        
                    </div>
                    
                    
                    
                </div>
            </div>
       
        </div>
    </div>  
</section>

    <!--map end-->
    @section('script')
    <script>
    /*
     login
     */
    $('#contact').submit(function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $(".modal").show();
            },
            complete: function () {
                $(".modal").hide();
               
            }
        });
        jQuery.ajax({
            url: "{{url('/contact')}}",
            type: 'POST',
            data: {
                name: jQuery('#name').val(),
                email: jQuery('#email').val(),
                action: jQuery('#action').val(),
                message: jQuery('#message').val()


            },
            success: function (data) {
                if (data.status === 401) {
                    jQuery.each(data.message, function (key, value) {
                        var message = ('' + value + '');
                        toastr.options.onHidden = function () {
                            //  window.location.href = "{{url('/register')}}";
                        };
                        toastr.error(message, {timeOut: 50000});
                    });
                    return false;
                }
                if (data.status === 200) {
                    var message = data.message;
                    toastr.options.onHidden = function () {
                        // window.location.href = "{{url('/user/home')}}";
                    };
                    toastr.success(message, {timeOut: 50000});
                     $("#contact")[0].reset();
                    return false;
                }
            }

        });
    });

</script> 
    @endsection
    @endsection