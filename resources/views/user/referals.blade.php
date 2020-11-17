@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Referals </title>
<meta  name="description" content=" Referals ">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} -  Referals "/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')
<div class="main-panel">        
        <div class="content-wrapper">

          <div class="row">
              

              <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Total Referrals</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">{{count($ref)}}</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class=" ml-1 mb-0">Updated: now</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Your total referrals</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-users text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Active Referrals</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">{{$active}}</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: now</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Your active referrals</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-users text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Earned Commissions</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">${{number_format($commission,2)}}</h2>
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: now</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">Yout earned commissions</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-wallet text-warning icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          </div>


                @endsection
