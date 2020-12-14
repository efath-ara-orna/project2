@extends('admin.layouts.userlist')

@section('title')
Teacher Details Info
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
                 <th>Name</th>
                 <th>Email</th>
                 <th>Member Since</th>                                  
                 <th>Action</th>   
                </tr>
                </thead>
                              <tbody>
                                @foreach($freelancers as $freelancer)
                                @if($freelancer->role == 'teacher')
                                <tr>
                                  <td> {{ $freelancer->name }} </td>
                                  <td> {{ $freelancer->email }} </td>
                                  <td> {{ $freelancer->created_at->format('M j, Y') }} </td>
                                  <td><h4>
                                    @if($freelancer->status == '0')
                                     <button class="btn btn-success unbanFreelancer" data-id="{{$freelancer->id}}">Confirm</button>
                                    @elseif($freelancer->status == '1')
                                    <button class="btn btn-danger banUsers" data-id="{{$freelancer->id}}">Ban</button>
                                    @endif
                                  </h4></td>
                                </tr>
                               @endif
                                @endforeach
                              </tbody>
                            </table>
                            </table>
                                              </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
