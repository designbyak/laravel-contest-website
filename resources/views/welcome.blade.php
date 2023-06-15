@include('layouts.head')

    <!-- banner -->
    <section class="bannerhny w3pvt-banner" id="home">
        <div class="container">
            <div class="banner-info text-center mx-auto">
                <div class="w3pvt-logo align-self">
                    <span class="fa fa-camera" aria-hidden="true"></span>
                    <h3>We Create Indelible Experiences</h3>
                    <form action="{{ route('search') }}" method="get" class="">
                        <input type="search" name="search" placeholder="Search here..." required="">
                        <button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
                    </form>

                </div>
            </div>
        </div>
    </section>

<br>
    <div class="container">
<section class="about">
<h3 class="font-weight-bold header">
<span class="underline">AB</span>OUT US
</h3>
<p class="my-4 text-justify">
Yehuz World Entertainment is an innovative and complete goal-oriented company, which
is into event management services such as event ticketing, voting
contest management, trivia management system, event vendor
management system, event forms management system and travel &amp; tours
management services. We use through our website and short codes to
help customers achieve their goals.
</p>
<div>
<a href="https://elfrique.com/about" class="px-4 text-white btn btn-green">LEARN MORE</a>
</div>
</section>
<section class="why">
<h3 class="mb-3 font-weight-bold header">
<span class="underline">WHY</span> USE US
</h3>
<div class="mx-auto row">
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Excellent Support</h4>
<p>
You can view real-time report logs on all transactions i.e
you can monitor sales as they happen.
</p>
</div>
</div>
</div>
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Payment is 100% Safe</h4>
<p>
For any payment option you choose to complete a transaction,
your details are 100% secured &amp; safe. Our system does not
store user payment details.
</p>
</div>
</div>
</div>
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Fast Pay-Out</h4>
<p>Pay-Out is within 1-7 days once an event is ended.</p>
</div>
</div>
</div>
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Excellent Reporting</h4>
<p>
View real-time report logs on all transactions. Monitor
sales as it happens.
</p>
</div>
</div>
</div>
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Multiple Payment Option</h4>
<p>
You have a wide range of payment options locally &amp;
internationally. Payment is discrete with elfrique.
</p>
</div>
</div>
</div>
<div class="my-4 col-md-6">
<div class="each-container">
<img src="https://res.cloudinary.com/ademolamadelewi/image/upload/v1610470030/farmers/Group_29_hrcgwz.svg" alt="icon">
<div class="words">
<h4>Marketing Support</h4>
<p>
We support you with the free digital (or online) marketing
to drive &amp; boost sales revenue.
</p>
</div>
</div>
</div>
</div>
</section>
</div>


    <section class="w3-gallery py-5">
        <div class="container py-md-5">
        <h3 class="mb-md-5 mb-4 p-0 justify-content-center"><center>Contest</center></h3>
            <ul class="portfolio-area clearfix p-0 m-0">
            @foreach ($contest as $contests)
                <li class="portfolio-item2 content" data-id="id-1" data-type="{{$contests->id}}">
                    <span>
                        <a href="/contest/{{$contests->slug}}">
                            <div class="content-overlay"></div>
                            <img src="{{ url('public/Image/'.$contests->contest_thumb) }}" class="img-fluid w3layouts agileits" alt="{{$contests->contest_name}}">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">{{ Str::limit($contests->contest_name, 15) }}</h3>

                            </div>
                        </a>
                    </span>
                </li>
                @endforeach
            </ul>
            <!--end portfolio-area -->
        </div>
        <!-- //gallery container -->
    </section>
    <!-- //banner -->
    <!--/gallery -->

    <div class="w3l-contact-10 py-5" id="contact">
        <div class="form-41-mian pt-lg-4 pt-md-3 pb-4">
            <div class="container">
                <div class="heading text-center mx-auto">
                    <h5 class="title-subhny text-center mb-2">Contact With Us</h5>
                    <h3 class="hny-title mb-2">Get in Touch with Us </h3>
                    <p class="mb-5">If you have a question regarding our services, feel free
                        to contact us using the form below.</p>
                        @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                </div>
                <div class="row">

    
                    <div class="col-lg-4 contacts-5-grid-main section-gap mb-lg-0 mb-4 pr-lg-5">
                   
                        <div class="contacts-5-grid">
                            <div class="map-content-5">
                                <section class="tab-content">
                                    <div class="contact-type">
                                        <div class="address-grid mb-3">
                                            <span class="pos-icon">
                                                <span class="fa fa-map"></span>
                                            </span>
                                            <div class="ad-right">
                                            <h6>Address</h6>
                                            <p>#No 23 ashimolowo street ,ado /odo  Otta ogun state.</p>
                                            </div>
                                        </div>
                                        <div class="address-grid mb-3">
                                            <span class="pos-icon">
                                                <span class="fa fa-envelope">
    
                                                </span>
                                            </span>
                                            <div class="ad-right">
                                            <h6>Email</h6>
                                            <a href="mailto:ogunsehis00@gmail.com" class="link1">Ogunsehis00@gmail.com</a>
                                            </div>
                                        </div>
                                        <div class="address-grid">
                                            <span class="pos-icon">
                                                <span class="fa fa-headphones"></span>
                                            </span>
                                            <div class="ad-right">
                                                <h6>Phone</h6>
                                                <a href="tel:+2349031265435" class="link1">+234 903 126 5435</a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 form-inner-cont">
                        <form action="{{ route('store contact') }}" method="post" class="signin-form">
                        @csrf
                            <div class="form-grids">
                                <div class="form-input">
                                    <input type="text" name="w3lName" id="w3lName" placeholder="Enter your name *" required="">
                                </div>
                                <div class="form-input">
                                    <input type="text" name="w3lSubject" id="w3lSubject" placeholder="Enter subject " required="">
                                </div>
                                <div class="form-input">
                                    <input type="email" name="w3lSender" id="w3lSender" placeholder="Enter your email *" required="">
                                </div>
                                <div class="form-input">
                                    <input type="text" name="w3lPhone" id="w3lPhone" placeholder="Enter your Phone Number *" required="">
                                </div>
                            </div>
                            <div class="form-input">
                                <textarea name="w3lMessage" id="w3lMessage" placeholder="Type your query here" required=""></textarea>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-style btn-primary">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- //contacts-5-grid -->
        </div>
    </div>
    <!-- //gallery-->


    @include('layouts.footer')