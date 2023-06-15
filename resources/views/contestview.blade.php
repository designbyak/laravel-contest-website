
@include('layouts.head')
  <!-- /w3l-breadcrumb-->
  <section class="w3l-breadcrumb">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="/">Home</a></li>
        <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contest</li>
      </ul>
    </div>
  </section>
  <!-- //w3l-breadcrumb-->
  <section class="w3l-index3 bg-grey">
    <div class="midd-w3 py-5">
      <div class="container py-lg-5 py-md-3">
        <div class="row">
          <div class="col-lg-6 pr-lg-5">
            <img src="{{ url('public/Image/'.$contestview->contest_thumb) }}" alt="" width="400" class="img-fluid radius-image">
          </div>
          <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
            <h5 class="title-subhny">{{$contestview->contest_type}}</h5>
            <h3 class="hny-title">{{$contestview->contest_name}}</h3>
            <h5 class="title-subhny">₦{{$contestview->vote_price}}</h5>
            <h5 class="title-subhny">Starts: <b>{{$contestview->start_date}}</b></h5>
            <h5 class="title-subhny">Ends: <b>{{$contestview->end_date}}</b></h5>
            <p class="mt-3">{{$contestview->contest_decription}}</p>
            <b class="text-green" style="color:green">Countdown to {{$contestview->contest_name}} contest end time</b><br>
          <h1 id="counter" class="text-center mt-5 m-auto p-3 btn btn-style btn-primary mt-4"></h1>
               <!-- Script -->
    <?php 
           $dateTime = strtotime($contestview->end_date);
           $getDateTime = date("F d, Y H:i:s", $dateTime); 
        ?>
  <script>
        
        var countDownDate = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var x = setInterval(function() {
            var now = new Date().getTime();
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // Output the result in an element with id="counter"11
            document.getElementById("counter").innerHTML = days + "Days' : " + hours + "h " +
            minutes + "m " + seconds + "s ";
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("counter").innerHTML = "Contest Ended";
            }
        }, 1000);
    </script>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/team-->
  <section class="w3-gallery py-5">
        <div class="container py-md-5">
        <h3 class="mb-md-5 mb-4 p-0 justify-content-center"><center>Contestants</center></h3>
            <ul class="portfolio-area clearfix p-0 m-0">
                @if(count($contestant) == null)
                <center><p>No Contestant In this Contest</p></center>
                @else
                @foreach ($contestant as $contestants)
                <li class="portfolio-item2 content" data-id="id-1" data-type="cat-item-1">
                    <span class="image-block">
                    <a href="/contestant/{{$contestants->slug}}">
                            <div class="content-overlay"></div>
                            <img src="{{ url('public/contestants/'.$contestants->contestant_image) }}" class="img-fluid w3layouts agileits" alt="{{$contestants->contestant_image}}">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">{{ Str::limit($contestants->contestant_name, 20) }}</h3>
                            </div>
                        </a>
                    </span>
                </li>
                @endforeach 
                @endif
            </ul>
            <!--end portfolio-area -->
        </div>
        <!-- //gallery container -->
    </section>
  <!--//team-->

  @include('layouts.footer')