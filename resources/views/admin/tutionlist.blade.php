@extends('admin.layouts.userlist')

@section('title')
Tution Details Info
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
       @if(count($errors)>0)
        <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
          <ul>
            @foreach($errors->all() as $error)
              <li style="list-style: none;">{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif
<div class="box">
            <div class="box-header">
              <h3 class="box-title">User Request</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Teacher Name</th>
                 <th>Teacher Email</th>
                 <th>Teacher Phone</th>
                 <th>Parents Name</th>
                 <th>Parents Phone</th>
                 <th>Subject</th>
                 <th>Address</th>
                 <th>Date</th>
                 <th>Status</th>                                
                 <th>Action</th>   
                 <th>Chnage Teacher</th>
                </tr>
                </thead>
                              <tbody>
                                @foreach($freelancers as $freelancer)
                                <tr>
                                  <td> {{ $freelancer->t_name }} </td>
                                  <td> {{ $freelancer->t_email}} </td>
                                  <td> {{ $freelancer->t_phone}} </td>
                                  <td> {{ $freelancer->p_name}} </td>
                                  <td> {{ $freelancer->p_phone}} </td>
                                  <td>{{ $freelancer->class}}, {{ $freelancer->subject}} </td>
                                  <td> {{ $freelancer->address}} </td>
                                   <td> {{ $freelancer->created_at->format('M j, Y') }} </td>
                                   @if($freelancer->status  == '0')
                                    <td><span class="label label-danger">Pending</span> </td>
                                @else
                                      <td><span class="label label-success">Confirm</span> </td>
                                 @endif
                                  <td>
                                    @if($freelancer->status == '0')
                                     <button class="btn btn-success unbanTution" data-id="{{$freelancer->id}}"><i class="fa fa-smile-o"></i> Confirm</button>
                                    @elseif($freelancer->status == '1')
                                    <button class="btn btn-danger banTution" data-id="{{$freelancer->id}}"><i class="fa fa-ban"></i> Ban</button>
                                    @endif
                                 </td>
                                  <th><button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info"><i class="fa  fa-exchange"></i> Change Teacher</button></th>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
               </div>
                  </div>
                </div>
  <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection
