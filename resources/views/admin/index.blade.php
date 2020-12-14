@extends('admin.layouts.master')
@section('title')

@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header" align="center">
                 <br />
                <h1>WELCOME TO OUR Online Tutor Management System</h1>

            </div>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p align="center">{{$message}}</p>
  </div>
  @endif
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
   
    </div>
 

    @endsection