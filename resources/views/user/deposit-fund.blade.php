@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; DEPOSIT CONFIRMATION</title>
<meta  name="description" content="DEPOSIT CONFIRMATION">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - DEPOSIT CONFIRMATION"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">


        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deposit Confirmation:</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Plan</td>
                                        <td>{{$plan->name}}</td>                          
                                    </tr>
                                    <tr>
                                        <td>Profit</td>
                                        <td>{{$plan->percentage}}%  for {{$plan->compound->name}} </td>                          
                                    </tr>
                                    <tr>
                                        <td>Principal Return:</td>
                                        <td>  @if($fund == 'fund')
                                            Not available
                                            @else
                                            Yes
                                            @endif</td>                          
                                    </tr>

                                    <tr>
                                        <td>Credit Amount:</td>
                                        <td> ${{$invest->amount,2}} </td>                          
                                    </tr>
                                    <tr>
                                        <td>Deposit Fee:</td>
                                        <td>${{number_format($invest->deposit_investment_charge,2)}}</td>                          
                                    </tr>
                                    <tr>
                                        <td>Debit Amount:</td>
                                        <td>${{number_format($invest->amount+$invest->deposit_investment_charge,2)}}</td>                          
                                    </tr> 
                                    <tr>
                                        <th>{{$name}} Debit Amount:</th>
                                        <td>{{number_format(floatval($amount_convert) , 8, '.', '')}}</td>
                                    </tr>   

                                    <tr>
                                        <td>Scan to Pay</th>
                                        <th>
                                            @if($fund == 'fund')
                                            <img id=coin_payment_image src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$sendaddress}}?amount={{number_format(floatval($amount_convert) , 8, '.', '')}}"/></td>
                                            @endif
                                            </td>
                                    </tr> 
                                </tbody>                      
                            </table>
                            @if($fund == 'fund')
                            <div class="btc_form btc1" id=btc_form>Please send exactly <b>{{number_format(floatval($amount_convert) , 8, '.', '')}} {{$name}}</b> to <i>
                                    <a href="{{$sendaddress}}?amount={{number_format(floatval($amount_convert) , 8, '.', '')}}&message=Deposit+to+Bitfury">{{$coin->address}}</a></i><br></div>
                            <div id=placeforstatus>
                                <strong>Order status:</strong> <span class="text-danger">Waiting for payment</span>
                            </div>
                            @else
                            <div id=placeforstatus>
                                <strong >Order status:</strong> <span class="text-success">Completed</span>
                            </div> 
                            @endif
                        </div>

                    </div>




                    @endsection
