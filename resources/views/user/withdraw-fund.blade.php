@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; WITHDRAWAL</title>
<meta  name="description" content="WITHDRAWAL">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - WITHDRAWAL"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')
 <div class="main-panel">
          <div class="content-wrapper">



          
            <div class="col-lg-12">
              















          

            

            </div>

            <div class="grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Withdrawal</h4>

                            <form  class="form-group"  method="POST" action="{{route('withdraw-fund')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="withdraw" value="{{$withdraw->id}}">

                                <table cellspacing="0" cellpadding="2" border="0" class="form deposit_confirm">
                                    <tbody><tr>
                                            <th>Payment System:</th>
                                            <td>{{ucfirst($name_full)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Account:</th>
                                            <td>{{$address}}</td>
                                        </tr>
                                        <tr>
                                            <th>Debit Amount:</th>
                                            <td>${{number_format($withdraw->total_amount,2)}}</td>
                                        </tr>

                                        <tr>
                                            <th>Withdrawal Fee:</th>
                                            <td>
                                                ${{number_format($withdraw->withdraw_charge,2)}}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Credit Amount:</th>
                                            <td>${{number_format($withdraw->amount - $withdraw->withdraw_charge,2)}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{$name}} Amount:</th>
                                            <td>{{number_format(floatval($amount_convert) , 8, '.', '')}}</td>
                                        </tr>


                                        <tr>
                                            <th>Note:</th>
                                            <td>{{$withdraw->comment}}</td>
                                        </tr>
                                        @if($withdraw->confirm == false)
                                        <tr>
                                            <td colspan="2"><input type="submit" value="Confirm" class="sbmt"></td>
                                        </tr>
                                        @else
                                    <td class="text-success" colspan="2">Confirmed</td>
                                    @endif

                                    </tbody></table>
                            </form>
                        </div>


                    </div>
                </div>
                </div>
     
                @endsection
