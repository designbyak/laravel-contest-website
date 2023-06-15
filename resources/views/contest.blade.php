@include('layouts.head')
  <!-- /w3l-breadcrumb-->
  <section class="w3l-breadcrumb">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="#url">Home</a></li>
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
            <img src="assets/images/ab1.jpg" alt="" class="img-fluid radius-image">
          </div>
          <div class="col-lg-6 mt-lg-0 mt-md-5 mt-4 about-right-faq align-self">
            <h5 class="title-subhny">We are the best</h5>
            <h3 class="hny-title">Voting Management System.</h3>
            <p class="mt-3">We manage an efficient voting system</p>
            <a href="/about" class="btn btn-style btn-primary mt-4">Read More</a>
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
  <!-- middle -->
  <div class="middle py-5">
    <div class="container py-xl-5 py-lg-3">
      <div class="welcome-left text-center py-md-3">
        <h3 class="mb-4">Vote For The Next Big Star</h3>

        <p class="text-italic">Try it out now</p>
      </div>
    </div>
  </div>
  <!-- //middle -->
  <!--/team-->
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
  <!--//team-->

  @include('layouts.footer')