@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Deposit List</title>
<meta  name="description" content="Deposit List">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - Deposit List"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')



<div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Your deposits
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">Total: ${{number_format($total_deposit,2)}}</li>                
              </ol>
            </nav>
          </div>
          <div class="row">
                  

                               @foreach($plans as $plan)
                                 <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                  <div class="table-responsive">
                            <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #212529;"><tr><td class=item>
                                        <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #212529;">
                                            <tr>
                                                <td colspan=3 align=center><b>{{$plan->name}}</b></td>
                                            </tr><tr>
                                                <td class=inheader>Plan</td>
                                                <td class=inheader width=200>Amount Spent ($)</td>
                                                <td class=inheader width=100 nowrap><nobr> Profit (%)</nobr></td>
                                </tr>
                                <tr>
                                    <td class=item>{{$plan->name}}</td>
                                    <td class=item align=right>${{$plan->min}} -  ${{$plan->max}}</td>
                                    <td class=item align=right>{{$plan->percentage}}</td>
                                </tr>
                            </table>
                            <br>
                            <table cellspacing=1 cellpadding=2 border=0 width=100%><tr>
                                    @if($plan->investmentAuth->isEmpty())
                                    @else
                                    <td colspan=4 class=inheader style="text-align:left">Your deposits:</td>
                                    @endif
                                </tr>
                                @if($plan->investmentAuth->isEmpty())
                                @else
                                <tr>
                                    <td class=inheader>Date</td>
                                    <td class=inheader>Amount</td>
                                </tr>
                                @endif
                                @forelse($plan->investmentAuth as $invest)
                               <tr>
                                    <td align=center class=item><b>{{ date('F d, Y', strtotime($invest->created_at)) }} {{ date('g:i A', strtotime($invest->created_at)) }}</b>
                                        <br>
                                        @if(empty($invest->due_pay))
                                        Deposit Not Started Running
                                        @else
                                        Expire in {{$invest->due_pay->diffForHumans()}}

                                        @endif
											<hr>
                                    </td>
                                    <td align=center class=item><b>
                                            @if($invest->plan->name == 'PLAN 6')
                                            {{number_format($invest->amount, 2)}} BTC <img src="{{asset($invest->coin->photo)}}" align=absmiddle hspace=1 height=17></b> 
                                        @else
                                        ${{number_format($invest->amount, 2)}} <img src="{{asset($invest->coin->photo)}}" align=absmiddle hspace=1 height=17></b>
										<br/><br/><hr>
									</td>


                                    @endif
								
                                </tr>
                               
                                @empty
                                <b> No deposits for this plan</b>

                                @endforelse
                            </table>
                            @if($plan->investmentAuth->isEmpty())
                            @else
                            <table cellspacing=0 cellpadding=1 border=0>
                                <tr><td>Deposited Total:</td><td><b>
                                            @if($plan->name == 'PLAN 6')
                                            {{number_format($plan->investmentAuth->sum('amount'), 2)}} BTC
                                            @else
                                            ${{number_format($plan->investmentAuth->sum('amount'), 2)}}


                                            @endif

                                        </b></td></tr>
<!--                                <tr><td>Profit Today:</td><td><b>$0.00</b></td></tr>-->
                                <tr><td>Total Profit:</td><td><b>

                                            ${{number_format($plan->investmentAuth->sum('earn'), 2)}}
                                        </b></td></tr>
                            </table>
                            @endif
                            <br>
                            </td></tr></table>

                            <br>



                            <br>
                               </div>


                    </div>
                </div>
                                       </div>

                            @endforeach

              
              
              
                                        
          </div>


                @endsection
