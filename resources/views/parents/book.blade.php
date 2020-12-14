<!DOCTYPE html>
<html>
<head>
	<title>Book Teacher</title>
  
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
text-align: center;
}



.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-left: 300px;
   margin-right: 300px;
}
</style>
</head>
<body>
  <div class="navbar">
  <a  href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="{{ url('/teacherlist') }}"><i class="fa fa-fw fa-search"></i> Search Teacher</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="{{ url('/login') }}"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
<marquee><h3>Contact Form</h3></marquee>

<div class="container">
  <form method="POST" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
    <label for="fname">Teacher Name</label>
    <input type="text" id="t_name" name="t_name" value="{{$teacher->name}}" readonly>

    <label for="lname">Teacher Phone</label>
    <input type="text" id="lname" name="t_phone" value="{{$teacher->phone}}" readonly>

 <label for="fname">Teacher Email</label>
    <input type="text" id="fname" name="t_email" value="{{$teacher->email}}" readonly>

    <label for="lname">Interest Class</label>
    <input type="text" id="lname" name="class" value="{{$intcourse->class}}" readonly>

    <label for="fname">Interest Subject</label>
    <input type="text" id="fname" name="subject" value="{{$intcourse->course_name}}" readonly>

    <label for="lname">Parents Name</label>
    <input type="text" id="lname" name="p_name" value="{{ Auth::user()->name }}">
    
 <label for="fname">Parents Phone</label>
    <input type="text" id="fname" name="p_phone" value="{{ Auth::user()->phone }}">

    <label for="lname">Parents Email</label>
    <input type="text" id="lname" name="p_email" value="{{ Auth::user()->email }}">

    <input type="hidden" name="t_status" value="request" readonly>

    <label for="subject">Address</label>
    <textarea id="subject" name="address" placeholder="Write Here Your Address" style="height:200px"></textarea>

    <input align="center" type="submit" value="Submit">
  </form>
</div>
</body>
</html>