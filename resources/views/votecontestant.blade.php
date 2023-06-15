
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
            <p class="mt-3">{{$contestantview->contest_decription}}</p>
            <a href="about.html" class="btn btn-style btn-primary mt-4">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="middle py-5">
    <div class="container py-xl-5 py-lg-3">
      <div class="welcome-left text-center py-md-3">
        <h3 class="mb-4">Vote For The Next Big Star</h3>

        <p class="text-italic">Ensure the contestant is who you actually want to vote.</p>
      </div>
    </div>
  </div>

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
            

<div class="card" width="100%">
 <div class="card-img-top">
 <center><img src="{{ url('public/contestants/'.$contestvote->contestant_image) }}" alt="card-img" width="300"></center>
</div>
<div class="card-body">
<div class="card-text">
Ensure the contestant is who you actually want to vote.
There would be no refund or reversal of vote if you choose a
wrong contestant.
</div>

<figure class="figure">
<figcaption class="figcaption p-4">
<h6 class="strong">Summary of your order</h6>

<div class="">
<h6 style="font-weight:strong;"> Votes </h6>
<p>{{$data['numVotes']}}</p><br>
<h6>Amount </h6>
<p>₦{{$data['amount']}} </p><br>
<h5 style="font-weight:strong;">Voter's detail</h5>
<hr style="height:2px;border:none;color:#333;background-color:#333;">
<h6 style="font-weight:strong;">Email</h6>
<p>{{$data['voters_email']}}</p><br>
<h6 style="font-weight:strong;">Phone number</h6>
<p>{{$data['phone']}}</p><br>
<h6 style="font-weight:strong;">Reference number</h6>
<p>{{$data['reference']}}</p><br>
<h5 class="alert alert-info">Pay With Paystack (Secured Platform)</h5>
<img src="{{ url('public/logo/') }}/paystack-logo.svg" width="100" height="100"><br>
<form method="POST" action="{{ route('pay now') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
<button  type="submit" value="Pay Now!" type="button" class="btn btn-lg btn-success ">PAY(ONLINE) </button>
</div>



<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
<input type="hidden" name="orderID" value="{{$data['reference']}}">
<input type="hidden" name="metadata" value="{{ json_encode($meta) }}" >
<input type="hidden" name="email" value="{{$data['voters_email']}}">
<input type="hidden" name="amount" value="{{$data['totalamount']}}">
<input type="hidden" name="currency" value="NGN">
<input name="ip" type="hidden" id="ip" value="{{$data['clientIP']}}">
{{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
<input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
</form>

</figcaption>
</figure></form>
</div>
 </div> </div>
</div>
</div>




          </div>
        </div>
      </div>
    </div>
  </section>


  @include('layouts.footer')