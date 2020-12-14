<html lang="zxx" >
<head >
    <!-- Required Meta Tags -->
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css" >
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/fonts/flaticon.css" >
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css" >
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css" >
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" >
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" >
    <!-- Nice Select Min CSS -->
    <link rel="stylesheet" href="assets/css/nice-select.min.css" >
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.css" >
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" >
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css" >
    <title >Search Tutor</title >
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png" >
</head >
<body >
<div class="navbar">
  <a  href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="{{ url('/teacherlist') }}"><i class="fa fa-fw fa-search"></i> Search Teacher</a> 
  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="{{ url('/login') }}"><i class="fa fa-fw fa-user"></i> Login</a>
</div>

<!-- Inner Banner -->
<div class="inner-banner " style="height: 140px !important" >
    <div class="container" >
        <div class="" style="position: absolute !important; top: 40px;left: 520px;  margin: auto;" >
           <div >
    <div class="container" >
        <div class="newsletter-area" >
            <h2 style="margin-top: -50px !important" >Find Your Teacher</h2 >
            <form   method="get" >
                <input type="text" class="form-control" placeholder="Enter your Subject Name" name="search" value="{{$search}}" required autocomplete="off" >
                
                <button class="subscribe-btn" type="submit" >
                    SEARCH
                </button >
                
                <div id="validator-newsletter" class="form-result" ></div >
            </form >


        </div >
    </div >
  
</div >
        </div >

    </div >
</div >


</div >
<!-- Subscribe Area End -->
<!-- Doctor Tab Area -->
<div class="doctor-tab-area " >
    <div class="container" >

         
        <div class="tab doctor-tab text-center" >
            <div class="tab_content current active pt-45" >
                <div class="tabs_item current" >
                    <div class="doctor-tab-item" >
                        <div class="row" >
                              @if(count($teacher) > 0)
           @foreach ($intcourse as $intcrs)
            @foreach ($teacher as $tchr)
           @if($intcrs->user_id == $tchr->user_id)
                                                      <div class="col-lg-4 col-md-6">
    <div class="doctors-item">
        <div class="doctors-img" title="Click to view details">
            <div class="card">
                <img src="{{ asset('uploads/teacher/' . $tchr->images) }}" alt="Images" style="width:100%">
            </div>

        </div>
        <div class="content">
            <h3><a href="" >{{$tchr->name}}</a ></h3 >
                                        <p style="font-size: 12" >Interest Course: {{$intcrs->course_name}}
                                            <br>Interest Class: {{$intcrs->class}}</p >
                                        <button type="submit" class="default-btn" onclick="location.href='{{ route('booking.edit', $tchr->id) }}'"
                                                style="padding-top: 2px;font-size: 13px;padding-bottom: 2px" >
                                            Book
                                        </button >
                                    </div >
                                </div >
                            </div >
                           
                             @endif
                             @endforeach
                              @endforeach

               @else
        <p align="text-center" style="position: absolute !important; top: 40px;left: 520px;  margin: auto;" >We don't have Find Any teachers</p>
       @endif
                     
                        </div >
                    </div >
                </div >
            </div >
        </div >
        
        
    </div >
    <!-- Doctor Tab Area End -->
    
    <!-- Footer Area -->

    <!-- Copy-Right Area End -->
    <!-- Jquery Min JS -->
    <script src="assets/js/jquery-3.5.1.slim.min.js" ></script >
    <!-- Popper Min JS -->
    <script src="assets/js/popper.min.js" ></script >
    <!-- Bootstrap Min JS -->
    <script src="assets/js/bootstrap.min.js" ></script >
    <!-- Magnific Popup Min JS -->
    <script src="assets/js/jquery.magnific-popup.min.js" ></script >
    <!-- Owl Carousel Min JS -->
    <script src="assets/js/owl.carousel.min.js" ></script >
    <!-- Nice Select Min JS -->
    <script src="assets/js/jquery.nice-select.min.js" ></script >
    <!-- Wow Min JS -->
    <script src="assets/js/wow.min.js" ></script >
    <!-- Meanmenu JS -->
    <script src="assets/js/meanmenu.js" ></script >
    <!-- Datepicker JS -->
    <script src="assets/js/datepicker.min.js" ></script >
    <!-- Ajaxchimp Min JS -->
    <script src="assets/js/jquery.ajaxchimp.min.js" ></script >
    <!-- Form Validator Min JS -->
    <script src="assets/js/form-validator.min.js" ></script >
    <!-- Contact Form JS -->
    <script src="assets/js/contact-form-script.js" ></script >
    <!-- Custom JS -->
    <script src="assets/js/custom.js" ></script >
</body >
</html >