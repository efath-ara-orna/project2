@extends('admin.layouts.userlist')

@section('title')
Tution Details Info
@endsection

@section('content')
<div class="wrapper">

  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Resource</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('tutionstatus.store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Parents Name</label>
                  <input type="text" class="form-control" name="p_name" value="{{$tution->p_name}}" placeholder="Enter Parents Name" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Parents Email address</label>
                  <input type="email" name="p_email" class="form-control" placeholder="Enter Parents Email" value="{{$tution->p_email}}" readonly>
                </div>
                   
                <div class="form-group">
                  <label for="exampleInputPassword1">Resouce Topic</label>
                  <input type="text" class="form-control" name="r_topic" placeholder="Enter Resouce Topic">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Resouce link</label>
                 <input type="text" class="form-control" name="r_link" placeholder="Resouce Link">

                  <p class="help-block">Example:https://example.com/ </p>
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Comment</label>
                 <textarea class="form-control" name="comment" placeholder="Comment "></textarea>
                  <p class="help-block" >********Optional*************</p>
                </div>
                
              </div>
              <!-- /.box-body -->

               <!-- /.box-body -->
              <div class="box-footer">

                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->

        </div>
@endsection