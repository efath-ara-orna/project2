@extends('admin.layouts.master')

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
              <h3 class="box-title">Parents Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Teacher Name</th>
                 <th>Teacher Phone</th>
                 <th>Teacher Phone</th>
                 <th>Class</th>
                 <th>Subject</th> 
                 <th>Parents Name</th>
                 <th>Parents Phone</th>
                  <th>Parents Email</th>
                 <th>Started Date</th>                                      
                 <th>Teacher Status</th>
                 <th>Admin Status</th> 
                </tr>
                </thead>
                              <tbody>
                                @foreach($freelancers as $freelancer)
                                    @if(Auth::user()->email == $freelancer->p_email)
                                <tr>

                                  <td> {{ $freelancer->t_name }} </td>
                                  <td> {{ $freelancer->t_email }} </td>
                                  <td> {{ $freelancer->t_phone }} </td>
                                  <td>{{ $freelancer->class }} </td>
                                   <td> {{ $freelancer->subject }} </td>
                                  <td> {{ $freelancer->p_name }} </td>
                                   <td> {{ $freelancer->p_phone }} </td>
                                  <td> {{ $freelancer->p_email }} </td>
                                  
                               <td> {{ $freelancer->created_at->format('M j, Y') }} </td>
                                     @if($freelancer->t_status  == 'complete')
                                   <td><span class="label label-success">Complete</span> </td>
                                   @elseif($freelancer->t_status  == 'progress')
                                    <td><span class="label label-primary">Progress</span> </td>
                                     @elseif($freelancer->t_status  == 'request')
                                      <td><span class="label label-warning">Request</span> </td>
                                      @else
                                       <td><span class="label label-danger">Cancel</span> </td>
                                       @endif

                                        @if($freelancer->status  == '0')
                                   <td><span class="label label-warning">Request</span> </td>
                                   @elseif($freelancer->status  == '1')
                                    <td><span class="label label-primary">Progress</span> </td>
                            
                                       @endif
                                </tr>
                                @endif
                                @endforeach
                              </tbody>
                            </table>
                   </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
