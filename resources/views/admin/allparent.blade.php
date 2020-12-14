@extends('admin.layouts.userlist')

@section('title')
Parent Details Info
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
                 <th>Status</th>   
                </tr>
                </thead>
                              <tbody>
                                @foreach($parent as $teachers)
                                @if($teachers->role == 'parents')
                                <tr>
                                  <td> {{ $teachers->name }} </td>
                                  <td> {{ $teachers->email }} </td>
                                  <td> {{ $teachers->created_at->format('M j, Y') }} </td>
                                  @if($teachers->status  == '0')
                                   <td><span class="label label-success">Active</span> </td>
                                  
                                 @endif
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
