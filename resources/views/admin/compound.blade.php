@section('title')
<title>{{ucfirst($settings['site_name'])}} &mdash; Manage Compound</title>
<meta  name="description" content="Manage Compound">
<meta itemprop="keywords" name="keywords" content="{{ucfirst($settings['site_name'])}} -Manage Compound"/>
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
                        <h4 class="card-title">Coins</h4>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>
                            <button type="button" class="btn btn-theme btn-circle" data-toggle="modal" data-target="#modal-default">
                                Add New Compound
                            </button>
                            <div class="modal fade" id="modal-default" >
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header ">
                                            <h4 class="modal-title">Add Compound</h4>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form class="" method="Post" action="{{url('add-compound')}}">
                                                @csrf    

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group"> 
                                                            <input  type=text name=name value="" class="form-control" placeholder="Name" required="required" data-error="Name is required.">
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type=text name=compound value="" class="form-control" placeholder="Must be in Hours" required="required">

                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>

                                                  

                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-theme btn-circle">Add</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <div class="clearfix"></div>
                            <br/>
                            <div class="">

                                <!-- right column -->
                                <div class="">
                                    <!-- general form elements disabled -->
                                    <div class="card card-warning">

                                        <!-- /.card-header -->
                                        <div class="card-body" style="overflow: auto!important">

                                            <table id="example5" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Compound</th>
                                                        <th>Date Created</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($compounds as $compound)
                                                    <tr>
                                                        <td>{{$compound->name}}</td>
                                                        <td>{{$compound->compound}}</td>
                                                        <td>{{ date('F d, Y', strtotime($compound->created_at)) }}</td>
                                                        <td style='white-space: nowrap'>
                                                            <button type="button" class="" data-toggle="modal" data-target="#edit{{$compound->id}}">
                                                                <i class="fa fa-edit text-success"></i>
                                                            </button>

                                                            <form  class="deleted" style="display: inline-block!important"  role="form" method="POST"
                                                                   action="{{route('delete-compound',['id'=>$compound->id])}}" >
                                                                @csrf   
                                                                <button type="submit"class="">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </button>
                                                            </form> 

                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <div class="modal fade" id="edit{{$compound->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Compound - {{$compound->name}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <form class="" method="Post" action="{{route('edit-compound',['id'=>$compound->id])}}">
                                                                    @csrf  
                                                                    <div class="form-group">
                                                                        <label>Name</label>
                                                                        <input type="text" name="name" value="{{$compound->name}}" class="form-control" placeholder="Name">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Compound</label>
                                                                        <input type="text" name="compound" value="{{$compound->compound}}" class="form-control" placeholder="must be in hours">
                                                                    </div>
                                                                    

                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-theme btn-circle">Save</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>

                                                @empty
                                                <div class="text-center ">
                                                    <h5 class="grey-text">No Compound created yet.</h5>
                                                    <img src="{{asset('images/empty.png')}}" style="width: 80px;height: 80px">
                                                </div>

                                                @endforelse
                                              <th>Name</th>
                                                        <th>Compound</th>
                                                        <th>Date Created</th>
                                                        <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                            </table>

                                            {{$compounds->appends($_GET)->links()}}
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (right) -->

                               </div>
                </div>
            
                    </div>
                </div>
                        @endsection
