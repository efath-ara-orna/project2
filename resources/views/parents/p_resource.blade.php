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
              <h3 class="box-title">Resource Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>Parents Name</th>
                 <th>Parents Email</th>
                 <th>Topic</th> 
                 <th>Link</th>
                  <th>Comment</th> 
                 <th>Create Date</th>
                </tr>
                </thead>
                              <tbody>
                                @foreach($freelancers as $freelancer)
                                    @if(Auth::user()->email == $freelancer->p_email)
                                <tr>
                                  <td> {{ $freelancer->p_name }} </td>
                                  <td>{{ $freelancer->p_email }} </td>
                                   <td> {{ $freelancer->r_topic }} </td>
                                  <td><a href="{{$freelancer->r_link}}">{{$freelancer->r_link}}</a></td>
                                   <td> {{ $freelancer->comment }} </td>
                               <td> {{ $freelancer->created_at->format('M j, Y') }} </td>
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
