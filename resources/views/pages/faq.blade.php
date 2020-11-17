@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; FAQ</title>
<meta  name="description" content="FAQ">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - FAQ"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.app')
@section('content')
<section id="page" class="header-breadcrumb">

    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>FAQ Asked Questions</h1>
                
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>FAQ</li>
                </ul>
            </div>
        
        </div>
    
    </div>
</section>
   <!--==================================================================== 
							End Header 
	=====================================================================-->
    
<div class="faq faq-three pb-120">
    <div class="container">


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

               
                <div id="accordion" class="acco">
                    
                    
                    
                  <div class="card active">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Who can participate in GlobalGreen? Dot you accept investors from different countries?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                       We  have no restriction on who can participate in regards to our services. We accept users from all countries as long as they accept our outlined terms and services
                      </div>
                    </div>
                  </div>
                    
                    
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                         Who manages the Funds?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                      All funds are managed by our team that consist of professional well networked traders, investors, lawyers, financial specialists and research analysts who work together to assist our clients to accomplishing optimal returns.
                      </div>
                    </div>
                  </div>
                    
                    
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Who can participate in GlobalGreen? Dot you accept investors from different countries?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                      We have no restriction on who can participate in regards to our services. We accept investors from all countries as long as they accept our outlined terms of service.
                      </div>
                    </div>
                  </div>
                    
                    
                 <div class="card">
                    <div class="card-header" id="headingFour">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Who Manages The Funds?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                      All funds are managed by our team that consists of professional well networked traders, investors, lawyers, financial specialists and research analysts who work together to assist our clients to accomplishing optimal returns.
                      </div>
                    </div>
                  </div>
                    
        
                    
                    
                <div class="card">
                    <div class="card-header" id="headingFive">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                         How can I deposit?

                        </button>
                      </h5>
                    </div>
                    
                    <div id="collapse-5" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body">
                        If you have already registered, simply login to your account with your email and password, select the options , click deposit , select your preferred investment plan, enter the amount you want to deposit and submit it. Automatically you will see the company’s wallet address which you will deposit into.
                      </div>
                    </div>
                  </div>
                    
                    
                    
           
                    
                    <div class="card">
                    <div class="card-header" id="heading-6">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">
                         Are there withdrawal or Deposit charges
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
                      <div class="card-body">
                     No withdrawal or deposit charges required
                      </div>
                    </div>
                  </div>
                    
                    
                    
                    <div class="card">
                    <div class="card-header" id="heading-7">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">
                          How do I make withdrawals ?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
                      <div class="card-body">
                      Simply login to your account, select the option, click withdraw, enter the amount you want to withdraw, paste your wallet address and submit it .
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="heading-8">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-8" aria-expanded="false" aria-controls="collapse-8">
                          How does the trading investment contract work?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion">
                      <div class="card-body">
                       The trading investment contract states that all active investments has it’s maturity period which means that you can withdraw your invested capital at the end of the contract period of 6 months to 1 year
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="heading-9">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse-9" aria-expanded="false" aria-controls="collapse-9">
                         when can I withdraw my earnings?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse-9" class="collapse" aria-labelledby="heading-9" data-parent="#accordion">
                      <div class="card-body">
                     Your can withdraw daily
                      </div>
                    </div>
                  </div>

                
                    
                    
                    
                </div>
    
            
            </div>
            <div class="col-md-2"></div>
        
        </div>
    
    </div>
    
</div>    
    


    @endsection