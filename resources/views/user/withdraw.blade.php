@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Withdrawal</title>
<meta  name="description" content="Withdrawal">
<meta itemprop="keywords" name="keywords" content="Withdrawal"/>
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
                  



                            <form  class="form-group"  method="POST" action="{{route('withdraw')}}" enctype="multipart/form-data">
                                @csrf
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;">
                                    <tr>
                                        <td>Account Balance:</td>
                                        <td>$<b>{{number_format($total_balance,2)}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Pending Withdrawals: </td>
                                        <td>$<b>{{number_format($pending_withdraw,2)}}</b></td>
                                    </tr>
                                </table>
                                <br><br><br>
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;" >
                                    <tr>
                                        <th></th>
                                        <th>Processing</th>
                                        <th>Available</th>
                                        <th>Profit</th>
                                         <th>Referal Bonus</th>

                                    </tr>
                                    @forelse($usercoin as $ucoin)
                                    <tr>
                                        <td><input type="radio" name="coin" value="{{$ucoin->coin_id}}" required ></td>
                                        <td><img src="{{asset($ucoin->coin->photo)}}" width=44 height=17 align=absmiddle> {{$ucoin->coin->name}}</td>
                                        <td><b style="color:green">${{number_format($ucoin->amount,2)}}</b></td>
                                        <td><b style="color:red">${{number_format($ucoin->earn,2)}}</b></td>
                                         <td><b style="color:green">${{number_format($ucoin->bonus,2)}}</b></td>

                                    </tr>
                                    @empty
                                    No Coin Set
                                    <a href="{{url('edit-account')}}"> Add Coin </a>
                                    @endforelse
                                </table>
                                <br><br><br>
                                <table cellspacing=10 cellpadding=12 border=1 width=100% style="border: 1px solid #0f1531;">
                                    <tr>
                                        <td colspan=2>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>Withdraw from:</td>
                                        <td>
                                            <select name="withdraw_from"  class=form-control required>
                                                <option value="" selected disabled>Choose Option</option>
                                                 <option value="all" {{old('withdraw_from') == 'all' ? 'selected' : '' }}>All </option>
                                                <option value="Balance" {{old('withdraw_from') == 'Balance' ? 'selected' : '' }}>Balance</option>
                                                <option value="Profit" {{old('withdraw_from') == 'Profit' ? 'selected' : '' }}>Profit</option>
                                                
                                                <option value="Referal Bonus" {{old('withdraw_from') == 'Referal Bonus' ? 'selected' : '' }}>Referal Bonus</option>
                                            </select>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Withdrawal ($):</td>
                                        <td><input type=text name=amount value="{{old('amount') }}" class=form-control size=15 required></td>
                                    </tr>

                                    <tr>
                                        <td colspan=2><textarea name=comment class=form-control cols=45 rows=4 placeholder="Your Comment">{{old('comment') }}</textarea>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><input type=submit value="Request" class="btn btn-theme btn-circle"></td>
                                    </tr></table>
                            </form>


                        </div>


                    </div>
                </div>
                </div>
       

                @endsection