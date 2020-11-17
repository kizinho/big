@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; View User</title>
<meta  name="description" content="View User">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} - View User"/>
<meta name="author" content="{{ucfirst($settings['site_name'])}}" />

@endsection
@extends('layouts.home')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">

 <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View User</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>


                            <div class="container profile">
                                <div class="row">
                                    <div class="col text-center mt-3">
                                        <img alt="picture" src="{{asset('images/user.jpg') }}" class="img-lg rounded-circle border shadow" />
                                        <h2 class="mt-3"> {{$user->username}}</h2>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">User Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#coin" role="tab" aria-controls="contact" aria-selected="false">Funds</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content card" id="myTabContent">
                                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <table class="table table-hover table-sm table-properties">
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 20rem;">{{$user->full_name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Username</th>
                                                        <td>{{$user->username}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{$user->email}}</td>
                                                    </tr>

                                                </table>
                                            </div>

                                            <div class="tab-pane fade" id="coin" role="tabpanel" aria-labelledby="address-tab">
 <table id="example5" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Coin</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>Bonus</th>
                                                  <th>image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($usercoin as $ucoin)
                                                    <tr>
                                                        <td>{{$ucoin->coin->name}}</td>
                                                        <td>{{$ucoin->address}}</td>
                                                        <td>${{number_format($ucoin->amount)}}</td>
                                                        <td>${{number_format($ucoin->earn)}}</td>
                                                        <td>${{number_format($ucoin->bonus)}}</td>
                                                        <td> <img src="{{asset($ucoin->coin->photo)}}" align=absmiddle hspace=1 height=17></td>
                                                       
                                                    </tr>
                                                </tbody>

                                                @endforeach
                                                <th>Coin</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Profit</th>
                                                <th>Bonus</th>
                                                 <th>image</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                               

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>




    </div>
                </div>
            
                    </div>
                </div>
                    @endsection
