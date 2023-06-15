@include('layouts.head')
  <!-- /w3l-breadcrumb-->
  <section class="w3l-breadcrumb">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="#url">Home</a></li>
        <li class="active"><span class="fa fa-arrow-right mx-2" aria-hidden="true"></span> Search Result : {{$search}}</li>
      </ul>
    </div>
  </section>
  @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
  <!-- //middle -->
  <!--/team-->
  <section class="w3-gallery py-5">
        <div class="container py-md-5">
        <h3 class="mb-md-5 mb-4 p-0 justify-content-center"><center>Contest Search Result : {{$search}}</center></h3>
        @if($contest->isNotEmpty())
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
                @else 
    <div>
        <h2>No result found</h2>
    </div>
@endif
            </ul>
            <!--end portfolio-area -->
        </div>
        <!-- //gallery container -->
    </section>
  <!--//team-->

  @include('layouts.footer')