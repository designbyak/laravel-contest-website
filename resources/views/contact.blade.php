@include('layouts.head')
<section class="w3l-breadcrumb">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="#url">Home</a></li>
        <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Contact</li>
      </ul>
    </div>
  </section>
  <!-- //w3l-breadcrumb-->
    <!-- contact1 -->
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
                                            <span
                                                class="pos-icon">
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
                                            <span
                                                class="pos-icon">
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
                                    <input type="text" name="w3lName" placeholder="Enter your name *"
                                        required="" />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="w3lSubject" placeholder="Enter subject "
                                        required />
                                </div>
                                <div class="form-input">
                                    <input type="email" name="w3lSender" placeholder="Enter your email *"
                                        required />
                                </div>
                                <div class="form-input">
                                    <input type="text" name="w3lPhone" placeholder="Enter your Phone Number *"
                                        required />
                                </div>
                            </div>
                            <div class="form-input">
                                <textarea name="w3lMessage" placeholder="Type your query here"
                                    required=""></textarea>
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

    @include('layouts.footer')