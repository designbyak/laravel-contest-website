
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
            <img src="{{ url('public/Image/'.$contestantview->contest_thumb) }}" alt="" width="400" class="img-fluid radius-image">
          </div>
          <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
            <h5 class="title-subhny">{{$contestantview->contest_type}}</h5>
            <h3 class="hny-title">{{$contestantview->contest_name}}</h3>
            <h5 class="title-subhny">₦{{$contestantview->vote_price}}</h5>
            <h5 class="title-subhny">Starts: <b>{{$contestantview->start_date}}</b></h5>
            <h5 class="title-subhny">Ends: <b>{{$contestantview->end_date}}</b></h5>
            <p class="mt-3">{{$contestantview->contest_decription}}</p><br>
            <b class="text-green" style="color:green">Countdown to {{$contestantview->contest_name}} contest end time</b><br>
           <h1 id="counter" class="text-center mt-5 m-auto p-3 btn btn-style btn-primary mt-4"></h1>
               <!-- Script -->
    <?php 
           $dateTime = strtotime($contestantview->end_date);
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
  @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
        

  <section class="w3l-index3 bg-grey">
    <div class="midd-w3 py-5">
      <div class="container py-lg-5 py-md-3">
        <div class="row">
          <div class="col-lg-6 mt-5 about-right-faq align-self order2">
            <h3 class="hny-title">{{$contestvote->contestant_name}}</h3>
            <p class="mt-3">{{$contestvote->about_contestant}}</p>
            <h3 class="hny-title">Contestant Number</h3>
            <h5 class="title-subhny">{{str_pad($contestvote->id, 3, "0", STR_PAD_LEFT)}}</h5>
            <h3 class="hny-title">Voting Details</h3>
            <h5 class="title-subhny">No of votes: <b>{{$contestvote->vote_count}}</b></h5>
          </div>
          <div class="col-lg-6 mt-md-5 mt-4 pl-lg-5">
            

          <div class="card">
<div class="card-img-top">
<center><img src="{{ url('public/contestants/'.$contestvote->contestant_image) }}" alt="card-img" width="300"></center>
</div>
<div class="card-body">
<div class="card-text">
Ensure the contestant is who you actually want to vote.
There would be no refund or reversal of vote if you choose a
wrong contestant.
</div>
@if($contestantview->contest_type == 'Free' && $contestantview->vote_price == 0)

@if (Auth::check())
<p class="py-1">Ensure that the contestant is who you actually want to vote.</p>
<form action="{{ route('vote') }}" id="freeVoteForm" class="my-3" method="post" accept-charset="utf-8">
@csrf
<div class="form-row border-light border-bottom">
<div class="form-group col-12">
<p class="alert alert-info">Each user can only vote once here </p>
</div>
<div class="form-group col-12">
<input type="text" class="form-control" id="voters_name" name="voters_name" placeholder="Enter your full name" value="{{Auth::user()->name}}" readonly="" required="">
</div>
<div class="form-group col-12">
<input type="email" class="form-control" id="voters_email" name="voters_email" placeholder="Enter a valid Email for your receipt" value="{{Auth::user()->email}}" readonly="" required="">
</div>
<div class="form-group col-12">
<input type="text" class="form-control" id="phonee" name="phone" placeholder="Enter your phone Number" value="{{Auth::user()->phone}}" readonly="" >
</div>
<p class="text-center w-100 my-2"><span class="font-weight-bolder">Free </span></p>
</div>
<input type="hidden" class="form-control" name="contest_id" value="{{$contestantview->id}}">
<input type="hidden" class="form-control" name="contestant_id" value="{{$contestvote->id}}">
<input type="hidden" name="slug" id="slug" value="{{$contestvote->slug}}">
<button id="proceed" type="submit" class="btn w-100 btn-primary btn-block" onclick="return confirm('Once you vote, you will not be able to cancel the vote!')">Vote Contestant</button>
</form> </div>
@else
<a href="/login" class="btn btn-primary d-lg-block btn-style">Login</a>
@endif
@else
<form action="{{ url('/contestant/pay/'.$contestvote->slug) }}" id="votingForm" class="my-3" method="post" accept-charset="utf-8">
@csrf
<div class="form-group my-4">
<label for="numVotes">Total number of votes you want</label>
<input type="number" class="form-control" id="numVotes" placeholder="Enter the total number of votes you want to make" required="" min="1" name="numVotes">
</div>
<div class="form-group my-4">
<label for="voters_name">Full name</label>
<input type="text" class="form-control" id="voters_name" name="voters_name" placeholder="Enter your full name" required="">
</div>
<div class="form-group my-4">
<label for="voters_email">Email address</label>
<input type="email" class="form-control" id="voters_email" name="voters_email" placeholder="Enter a valid Email for your receipt" required="">
</div>
<div class="form-group my-4">
<label for="phone">Phone number</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone Number">
</div>
<div class="my-3">
<p class="text-center">
Each vote costs
<span class="font-weight-bold">
₦{{$contestantview->vote_price}}</span>
</p>
</div>
<input type="hidden" class="form-control" name="contest_id" value="{{$contestantview->id}}">
<input type="hidden" class="form-control" name="contestant_id" value="{{$contestvote->id}}">
<input type="hidden" name="amount" id="amount" value="{{$contestantview->vote_price}}">
<input type="hidden" name="slug" id="slug" value="{{$contestvote->slug}}">
<input type="hidden" name="voting_details_id" value="REF{{str_pad($contestvote->id, 3, '0', STR_PAD_LEFT)}}N">
<div class="text-center">
<button type="submit" class="btn btn-style btn-primary">
PROCEED TO MAKE PAYMENT
</button>
</div>
</form> 
@endif
</div>
</div>
</div>




          </div>
        </div>
      </div>
    </div>
  </section>


  @include('layouts.footer')